<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Products Controller
 *
 * Ürün ekleme/düzenleme/listeleme işlemleri için hazırlanmıştır.
 * PHP 7+ ve CodeIgniter 3 ile uyumludur.
 */
class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library(['form_validation', 'session']);
        $this->load->model('Product_model', 'products');
    }

    public function index()
    {
        $data['products'] = $this->products->all();
        $this->load->view('products/index', $data);
    }

    public function create()
    {
        $data['title']   = 'Yeni Ürün';
        $data['product'] = $this->products->emptyObject();
        $data['customer_groups'] = $this->products->customerGroups();

        $this->load->view('products/form', $data);
    }

    public function edit($id)
    {
        $product = $this->products->find($id);

        if (!$product) {
            show_404();
        }

        $data['title']   = 'Ürün Düzenle';
        $data['product'] = $product;
        $data['customer_groups'] = $this->products->customerGroups();

        $this->load->view('products/form', $data);
    }

    public function store()
    {
        $this->_runValidation();

        if ($this->form_validation->run() === FALSE) {
            return $this->create();
        }

        $id = $this->products->createFromRequest($this->input->post(NULL, TRUE), $_FILES);

        $this->session->set_flashdata('success', 'Ürün başarıyla eklendi.');
        redirect('products/edit/' . $id);
    }

    public function update($id)
    {
        $product = $this->products->find($id);

        if (!$product) {
            show_404();
        }

        $this->_runValidation($id);

        if ($this->form_validation->run() === FALSE) {
            return $this->edit($id);
        }

        $this->products->updateFromRequest($id, $this->input->post(NULL, TRUE), $_FILES);

        $this->session->set_flashdata('success', 'Ürün güncellendi.');
        redirect('products/edit/' . $id);
    }

    private function _runValidation($id = NULL)
    {
        $this->form_validation->set_error_delimiters('<div class="text-danger small">', '</div>');

        $this->form_validation->set_rules('title_tr', 'Türkçe Ürün Başlık', 'required|min_length[3]|max_length[255]');
        $this->form_validation->set_rules('sku', 'Ürün Kodu', 'required|min_length[3]|max_length[80]|callback__uniqueSku[' . (int)$id . ']');
        $this->form_validation->set_rules('quantity', 'Miktar', 'required|integer');
        $this->form_validation->set_rules('price_tl', 'Satış Fiyatı (TL)', 'required|numeric');
        $this->form_validation->set_rules('tax_rate', 'Vergi Oranı', 'required|numeric');
        $this->form_validation->set_rules('second_price_tl', '2. Satış Fiyatı', 'required|numeric');
    }

    public function _uniqueSku($sku, $id)
    {
        if ($this->products->skuExists($sku, (int)$id)) {
            $this->form_validation->set_message('_uniqueSku', 'Ürün kodu başka bir kayıt tarafından kullanılıyor.');
            return FALSE;
        }

        return TRUE;
    }
}

