<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title><?php echo isset($title) ? $title : 'Ürün Formu'; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css">
    <style>
        .tab-pane{margin-top:20px;}
        .form-actions{text-align:right;margin-top:20px;}
        .language-card,
        .section-card{border:1px solid #e0e0e0;border-radius:4px;padding:0 0 25px;margin-bottom:20px;background:#fff;}
        .language-card__header,
        .section-card__header{padding:15px 25px;border-bottom:1px solid #e0e0e0;background:#f8f9fb;font-weight:600;display:flex;align-items:center;gap:10px;}
        .language-card__body,
        .section-card__body{padding:0 25px;}
        .form-row{display:flex;flex-wrap:wrap;padding:18px 0;border-bottom:1px solid #f1f1f1;}
        .form-row:last-child{border-bottom:none;}
        .label-col{flex:0 0 260px;max-width:100%;font-weight:600;color:#333;padding-right:25px;}
        .label-col span.required{color:#e74c3c;margin-right:5px;}
        .label-col small{display:block;font-weight:400;color:#8a8a8a;margin-top:8px;line-height:1.4;}
        .input-col{flex:1 1 auto;}
        .input-col input,
        .input-col textarea{width:100%;}
        .help-text,
        .info-text{font-size:12px;color:#888;margin-top:6px;line-height:1.6;}
        @media(max-width:768px){
            .form-row{flex-direction:column;}
            .label-col{margin-bottom:10px;}
        }
    </style>
</head>
<body>
<div class="container" style="margin-top:40px;">
    <div class="clearfix">
        <h2 class="pull-left"><?php echo isset($title) ? $title : 'Ürün Formu'; ?></h2>
        <a href="<?php echo site_url('products'); ?>" class="btn btn-default pull-right">Listeye Dön</a>
    </div>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <?php
    $action = $product->id ? site_url('products/update/' . $product->id) : site_url('products/store');
    echo form_open_multipart($action);
    ?>

    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#genel" role="tab" data-toggle="tab">Genel</a></li>
        <li><a href="#detaylar" role="tab" data-toggle="tab">Detaylar</a></li>
        <li><a href="#resimler" role="tab" data-toggle="tab">Resimler</a></li>
        <li><a href="#indirim" role="tab" data-toggle="tab">İndirim</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="genel">
            <div class="language-card">
                <div class="language-card__header">
                    <img src="https://cdn.jsdelivr.net/gh/lipis/flag-icons/flags/4x3/tr.svg" alt="TR" width="22" height="16">
                    <span>Türkçe</span>
                </div>
                <div class="language-card__body">
                    <div class="form-row">
                        <div class="label-col">
                            <label><span class="required">*</span>Türkçe Ürün Başlık</label>
                        </div>
                        <div class="input-col">
                            <input type="text" name="title_tr" class="form-control" value="<?php echo set_value('title_tr', $product->title_tr); ?>">
                            <?php echo form_error('title_tr'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label>Türkçe Ürün Ek Bilgi Başlığı</label>
                        </div>
                        <div class="input-col">
                            <input type="text" name="title_tr_alt" class="form-control" value="<?php echo set_value('title_tr_alt', $product->title_tr_alt); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label>Türkçe Ürün Ek Bilgi Açıklaması</label>
                        </div>
                        <div class="input-col">
                            <input type="text" name="info_tr" class="form-control" value="<?php echo set_value('info_tr', $product->info_tr); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label>Türkçe Meta Title</label>
                        </div>
                        <div class="input-col">
                            <input type="text" name="meta_title_tr" class="form-control" value="<?php echo set_value('meta_title_tr', $product->meta_title_tr); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label>Türkçe Meta Keywords</label>
                        </div>
                        <div class="input-col">
                            <input type="text" name="meta_keywords_tr" class="form-control" value="<?php echo set_value('meta_keywords_tr', $product->meta_keywords_tr); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label>Türkçe Meta Description</label>
                        </div>
                        <div class="input-col">
                            <textarea name="meta_desc_tr" class="form-control" rows="2"><?php echo set_value('meta_desc_tr', $product->meta_desc_tr); ?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label>Türkçe Seo Adresi</label>
                            <small>Site adresi girilmesi zorunlu değildir, girilen seo adresi geçerli olur. Girilmez ise otomatik olarak Başlık kısmının referans alınarak oluşturulur.</small>
                        </div>
                        <div class="input-col">
                            <input type="text" name="seo_slug_tr" class="form-control" value="<?php echo set_value('seo_slug_tr', $product->seo_slug_tr); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label>Türkçe Ürün Açıklama</label>
                        </div>
                        <div class="input-col">
                            <textarea name="description_tr" id="description_tr" rows="8" class="form-control"><?php echo set_value('description_tr', $product->description_tr); ?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label>Türkçe Video Embed Kodu</label>
                            <small>Vimeo - Google Video - Youtube tarzı video sitelerinin embed kodu.</small>
                        </div>
                        <div class="input-col">
                            <textarea name="video_embed" class="form-control" rows="3"><?php echo set_value('video_embed', $product->video_embed); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="detaylar">
            <div class="section-card">
                <div class="section-card__header">Envanter Bilgileri</div>
                <div class="section-card__body">
                    <div class="form-row">
                        <div class="label-col">
                            <label><span class="required">*</span>Ürün Kodu</label>
                        </div>
                        <div class="input-col">
                            <input type="text" name="sku" class="form-control" value="<?php echo set_value('sku', $product->sku); ?>">
                            <?php echo form_error('sku'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label><span class="required">*</span>Miktar</label>
                            <small>Girdiğiniz stok değeri; sepette “stok yeterli” kontrolleri yapılırken esas alınır.</small>
                        </div>
                        <div class="input-col">
                            <input type="number" name="quantity" class="form-control" value="<?php echo set_value('quantity', $product->quantity); ?>">
                            <?php echo form_error('quantity'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label>Sepet Ekstra İndirim %</label>
                            <small>Sepete özel kampanyalar için ekstra indirim oranı tanımlayabilirsiniz.</small>
                        </div>
                        <div class="input-col">
                            <input type="number" step="0.01" name="extra_discount" class="form-control" value="<?php echo set_value('extra_discount', $product->extra_discount); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label><span class="required">*</span>Vergi Oranı %</label>
                        </div>
                        <div class="input-col">
                            <input type="number" step="0.01" name="tax_rate" class="form-control" value="<?php echo set_value('tax_rate', $product->tax_rate); ?>">
                            <?php echo form_error('tax_rate'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-card">
                <div class="section-card__header">Fiyatlandırma</div>
                <div class="section-card__body">
                    <div class="form-row">
                        <div class="label-col">
                            <label><span class="required">*</span>Satış Fiyatı (TL)</label>
                        </div>
                        <div class="input-col">
                            <input type="number" step="0.01" name="price_tl" class="form-control" value="<?php echo set_value('price_tl', $product->price_tl); ?>">
                            <?php echo form_error('price_tl'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label>Satış Fiyatı ($)</label>
                        </div>
                        <div class="input-col">
                            <input type="number" step="0.01" name="price_usd" class="form-control" value="<?php echo set_value('price_usd', $product->price_usd); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label>Satış Fiyatı (€)</label>
                        </div>
                        <div class="input-col">
                            <input type="number" step="0.01" name="price_eur" class="form-control" value="<?php echo set_value('price_eur', $product->price_eur); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label><span class="required">*</span>2. Satış Fiyatı (TL)</label>
                        </div>
                        <div class="input-col">
                            <input type="number" step="0.01" name="second_price_tl" class="form-control" value="<?php echo set_value('second_price_tl', $product->second_price_tl); ?>">
                            <?php echo form_error('second_price_tl'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-card">
                <div class="section-card__header">Yayın & Görünürlük</div>
                <div class="section-card__body">
                    <div class="form-row">
                        <div class="label-col">
                            <label>Stoktan Düş</label>
                        </div>
                        <div class="input-col">
                            <select name="stock_deduction" class="form-control">
                                <option value="1" <?php echo set_select('stock_deduction', 1, $product->stock_deduction == 1); ?>>Evet</option>
                                <option value="0" <?php echo set_select('stock_deduction', 0, $product->stock_deduction == 0); ?>>Hayır</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label>Durum</label>
                        </div>
                        <div class="input-col">
                            <select name="status" class="form-control">
                                <option value="1" <?php echo set_select('status', 1, $product->status == 1); ?>>Açık</option>
                                <option value="0" <?php echo set_select('status', 0, $product->status == 0); ?>>Kapalı</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label>Özellik Bölümü</label>
                        </div>
                        <div class="input-col">
                            <select name="feature_block" class="form-control">
                                <option value="1" <?php echo set_select('feature_block', 1, $product->feature_block == 1); ?>>Göster</option>
                                <option value="0" <?php echo set_select('feature_block', 0, $product->feature_block == 0); ?>>Gizle</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label>Yeni Ürün Geçerlilik Süresi</label>
                        </div>
                        <div class="input-col">
                            <input type="date" name="new_until" class="form-control" value="<?php echo set_value('new_until', $product->new_until); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label>Sıralama</label>
                        </div>
                        <div class="input-col">
                            <input type="number" name="order" class="form-control" value="<?php echo set_value('order', $product->order); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label>Ana Sayfada Göster</label>
                        </div>
                        <div class="input-col">
                            <select name="home_display" class="form-control">
                                <option value="1" <?php echo set_select('home_display', 1, $product->home_display == 1); ?>>Evet</option>
                                <option value="0" <?php echo set_select('home_display', 0, $product->home_display == 0); ?>>Hayır</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label>Yeni Ürün</label>
                        </div>
                        <div class="input-col">
                            <select name="is_new" class="form-control">
                                <option value="1" <?php echo set_select('is_new', 1, $product->is_new == 1); ?>>Evet</option>
                                <option value="0" <?php echo set_select('is_new', 0, $product->is_new == 0); ?>>Hayır</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label>Taksit</label>
                        </div>
                        <div class="input-col">
                            <select name="installment" class="form-control">
                                <option value="1" <?php echo set_select('installment', 1, $product->installment == 1); ?>>Evet</option>
                                <option value="0" <?php echo set_select('installment', 0, $product->installment == 0); ?>>Hayır</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="label-col">
                            <label>Garanti Süresi</label>
                        </div>
                        <div class="input-col">
                            <input type="text" name="warranty" class="form-control" value="<?php echo set_value('warranty', $product->warranty); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="resimler">
            <div class="form-group">
                <label>Ürün Ana Resmi</label>
                <input type="file" name="main_image" accept="image/*">
                <p class="help-block">Önerilen boyut 800x800 piksel, maksimum 1 MB.</p>
                <?php if (!empty($product->images)): ?>
                    <div>
                        <img src="<?php echo base_url($product->images[0]->path); ?>" alt="" style="max-width:160px;">
                    </div>
                <?php endif; ?>
            </div>
            <div id="gallery-wrapper"></div>
            <button type="button" class="btn btn-default" id="btn-add-image" disabled>Resim Ekle (Demo)</button>
        </div>

        <div class="tab-pane" id="indirim">
            <table class="table table-bordered" id="discount-table">
                <thead>
                <tr>
                    <th>Müşteri Grubu</th>
                    <th>Öncelik</th>
                    <th>İndirim / Fiyat</th>
                    <th>Tür</th>
                    <th>Para Birimi</th>
                    <th>Başlangıç</th>
                    <th>Bitiş</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($product->discounts)): ?>
                    <?php foreach ($product->discounts as $index => $row): ?>
                        <tr>
                            <td>
                                <select name="discount[<?php echo $index; ?>][group]" class="form-control">
                                    <?php foreach ($customer_groups as $group): ?>
                                        <option value="<?php echo $group['id']; ?>" <?php echo $group['id'] === $row->customer_group ? 'selected' : ''; ?>>
                                            <?php echo $group['title']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td><input type="number" name="discount[<?php echo $index; ?>][priority]" class="form-control" value="<?php echo $row->priority; ?>"></td>
                            <td><input type="number" step="0.01" name="discount[<?php echo $index; ?>][amount]" class="form-control" value="<?php echo $row->amount; ?>"></td>
                            <td>
                                <select name="discount[<?php echo $index; ?>][type]" class="form-control">
                                    <option value="percent" <?php echo $row->discount_type === 'percent' ? 'selected' : ''; ?>>%</option>
                                    <option value="amount" <?php echo $row->discount_type === 'amount' ? 'selected' : ''; ?>>Fiyat</option>
                                </select>
                            </td>
                            <td>
                                <select name="discount[<?php echo $index; ?>][currency]" class="form-control">
                                    <option value="TRY" <?php echo $row->currency === 'TRY' ? 'selected' : ''; ?>>TL</option>
                                    <option value="USD" <?php echo $row->currency === 'USD' ? 'selected' : ''; ?>>$</option>
                                    <option value="EUR" <?php echo $row->currency === 'EUR' ? 'selected' : ''; ?>>€</option>
                                </select>
                            </td>
                            <td><input type="date" name="discount[<?php echo $index; ?>][date_start]" class="form-control" value="<?php echo $row->date_start; ?>"></td>
                            <td><input type="date" name="discount[<?php echo $index; ?>][date_end]" class="form-control" value="<?php echo $row->date_end; ?>"></td>
                            <td><button type="button" class="btn btn-danger btn-xs btn-remove-row">Kaldır</button></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-success" id="btn-add-discount">İndirim Ekle</button>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Kaydet</button>
        <a href="<?php echo site_url('products'); ?>" class="btn btn-default">İptal</a>
    </div>

    <?php echo form_close(); ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
var discountIndex = <?php echo !empty($product->discounts) ? count($product->discounts) : 0; ?>;
CKEDITOR.replace('description_tr');

$('#btn-add-discount').on('click', function () {
    var currentIndex = discountIndex++;
    var template =
        '<tr>' +
        '<td><select name="discount[' + currentIndex + '][group]" class="form-control"><?php foreach ($customer_groups as $group): ?><option value="<?php echo $group['id']; ?>"><?php echo $group['title']; ?></option><?php endforeach; ?></select></td>' +
        '<td><input type="number" name="discount[' + currentIndex + '][priority]" class="form-control" value="0"></td>' +
        '<td><input type="number" step="0.01" name="discount[' + currentIndex + '][amount]" class="form-control"></td>' +
        '<td><select name="discount[' + currentIndex + '][type]" class="form-control"><option value="percent">%</option><option value="amount">Fiyat</option></select></td>' +
        '<td><select name="discount[' + currentIndex + '][currency]" class="form-control"><option value="TRY">TL</option><option value="USD">$</option><option value="EUR">€</option></select></td>' +
        '<td><input type="date" name="discount[' + currentIndex + '][date_start]" class="form-control"></td>' +
        '<td><input type="date" name="discount[' + currentIndex + '][date_end]" class="form-control"></td>' +
        '<td><button type="button" class="btn btn-danger btn-xs btn-remove-row">Kaldır</button></td>' +
        '</tr>';
    $('#discount-table tbody').append(template);
});

$(document).on('click', '.btn-remove-row', function () {
    $(this).closest('tr').remove();
});
</script>
</body>
</html>

