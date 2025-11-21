<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>Ürünler</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="margin-top:40px;">
    <div class="clearfix">
        <h2 class="pull-left">Ürün Listesi</h2>
        <a href="<?php echo site_url('products/create'); ?>" class="btn btn-success pull-right">Yeni Ürün</a>
    </div>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Ürün Başlığı</th>
            <th>SKU</th>
            <th>Fiyat (TL)</th>
            <th>Durum</th>
            <th>İşlem</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($products): ?>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product->id; ?></td>
                    <td><?php echo html_escape($product->title_tr); ?></td>
                    <td><?php echo html_escape($product->sku); ?></td>
                    <td><?php echo number_format((float)$product->price_tl, 2, ',', '.'); ?></td>
                    <td><?php echo $product->status ? 'Aktif' : 'Pasif'; ?></td>
                    <td>
                        <a href="<?php echo site_url('products/edit/' . $product->id); ?>" class="btn btn-xs btn-primary">Düzenle</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">Henüz ürün bulunmuyor.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>

