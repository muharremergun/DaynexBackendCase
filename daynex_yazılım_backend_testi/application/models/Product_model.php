<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Product Model
 *
 * Veritabanı etkileşimleri burada tutulur.
 */
class Product_model extends CI_Model
{
    private $table = 'products';

    public function all()
    {
        return $this->db->order_by('created_at', 'DESC')->get($this->table)->result();
    }

    public function find($id)
    {
        $product = $this->db->where('id', $id)->get($this->table)->row();

        if ($product) {
            $product->images    = $this->db->where('product_id', $id)->get('product_images')->result();
            $product->discounts = $this->db->where('product_id', $id)->get('product_discounts')->result();
        }

        return $product;
    }

    public function skuExists($sku, $exceptId = 0)
    {
        $this->db->where('sku', $sku);

        if ($exceptId) {
            $this->db->where('id !=', $exceptId);
        }

        return (bool) $this->db->get($this->table)->row();
    }

    public function emptyObject()
    {
        return (object) [
            'id'                => NULL,
            'title_tr'          => '',
            'title_tr_alt'      => '',
            'info_tr'           => '',
            'description_tr'    => '',
            'seo_slug_tr'       => '',
            'meta_title_tr'     => '',
            'meta_keywords_tr'  => '',
            'meta_desc_tr'      => '',
            'video_embed'       => '',
            'sku'               => strtoupper(substr(md5(uniqid('', TRUE)), 0, 10)),
            'quantity'          => 0,
            'extra_discount'    => 0,
            'tax_rate'          => 18,
            'price_tl'          => '',
            'price_usd'         => '',
            'price_eur'         => '',
            'second_price_tl'   => '',
            'stock_deduction'   => 1,
            'status'            => 1,
            'feature_block'     => 1,
            'new_until'         => '',
            'order'             => 0,
            'home_display'      => 0,
            'is_new'            => 0,
            'installment'       => 0,
            'warranty'          => '',
            'images'            => [],
            'discounts'         => []
        ];
    }

    public function createFromRequest($input, $files)
    {
        $this->db->trans_start();

        $id = $this->_saveProduct(NULL, $input);
        $this->_saveMainImage($id, $files);
        $this->_saveDiscounts($id, $input);

        $this->db->trans_complete();

        return $id;
    }

    public function updateFromRequest($id, $input, $files)
    {
        $this->db->trans_start();

        $this->_saveProduct($id, $input);
        $this->_saveMainImage($id, $files);
        $this->_saveDiscounts($id, $input, TRUE);

        $this->db->trans_complete();
    }

    private function _saveProduct($id, $input)
    {
        $data = [
            'title_tr'         => $input['title_tr'],
            'title_tr_alt'     => $input['title_tr_alt'],
            'info_tr'          => $input['info_tr'],
            'description_tr'   => $input['description_tr'],
            'seo_slug_tr'      => $input['seo_slug_tr'],
            'meta_title_tr'    => $input['meta_title_tr'],
            'meta_keywords_tr' => $input['meta_keywords_tr'],
            'meta_desc_tr'     => $input['meta_desc_tr'],
            'video_embed'      => $input['video_embed'],
            'sku'              => $input['sku'],
            'quantity'         => (int) $input['quantity'],
            'extra_discount'   => (float) $input['extra_discount'],
            'tax_rate'         => (float) $input['tax_rate'],
            'price_tl'         => (float) $input['price_tl'],
            'price_usd'        => $input['price_usd'],
            'price_eur'        => $input['price_eur'],
            'second_price_tl'  => (float) $input['second_price_tl'],
            'stock_deduction'  => (int) $input['stock_deduction'],
            'status'           => (int) $input['status'],
            'feature_block'    => (int) $input['feature_block'],
            'new_until'        => $input['new_until'],
            'order'            => (int) $input['order'],
            'home_display'     => (int) $input['home_display'],
            'is_new'           => (int) $input['is_new'],
            'installment'      => (int) $input['installment'],
            'warranty'         => $input['warranty'],
            'updated_at'       => date('Y-m-d H:i:s'),
        ];

        if ($id) {
            $this->db->where('id', $id)->update($this->table, $data);
            return $id;
        }

        $data['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    private function _saveMainImage($productId, $files)
    {
        if (empty($files['main_image']['name'])) {
            return;
        }

        $config = [
            'upload_path'   => FCPATH . 'uploads/products/',
            'allowed_types' => 'gif|jpg|jpeg|png',
            'max_size'      => 1024,
            'max_width'     => 1024,
            'max_height'    => 1024,
            'encrypt_name'  => TRUE,
        ];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('main_image')) {
            throw new RuntimeException($this->upload->display_errors('', ''));
        }

        $fileData = $this->upload->data();

        $record = [
            'product_id' => $productId,
            'path'       => 'uploads/products/' . $fileData['file_name'],
            'is_main'    => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $existing = $this->db->where(['product_id' => $productId, 'is_main' => 1])->get('product_images')->row();

        if ($existing) {
            $this->db->where('id', $existing->id)->update('product_images', $record);
        } else {
            $this->db->insert('product_images', $record);
        }
    }

    private function _saveDiscounts($productId, $input, $reset = FALSE)
    {
        if ($reset) {
            $this->db->where('product_id', $productId)->delete('product_discounts');
        }

        if (empty($input['discount'])) {
            return;
        }

        foreach ($input['discount'] as $row) {
            if (empty($row['amount'])) {
                continue;
            }

            $this->db->insert('product_discounts', [
                'product_id'    => $productId,
                'customer_group'=> $row['group'],
                'priority'      => $row['priority'],
                'discount_type' => $row['type'],
                'amount'        => $row['amount'],
                'currency'      => $row['currency'],
                'date_start'    => $row['date_start'],
                'date_end'      => $row['date_end'],
                'created_at'    => date('Y-m-d H:i:s'),
            ]);
        }
    }

    public function customerGroups()
    {
        return [
            ['id' => 'musteri', 'title' => 'Müşteri'],
            ['id' => 'bayi',    'title' => 'Bayi'],
            ['id' => 'vip',     'title' => 'VIP'],
        ];
    }
}

