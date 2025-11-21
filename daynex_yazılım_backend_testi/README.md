# Product Form (CodeIgniter 3)

Bu demo uygulama, CodeIgniter 3 ve PHP 7+ üzerinde çalışan 4 tablı ürün ekleme/düzenleme/listeleme akışını içerir.

## Gereksinimler
- PHP 7.0 veya üzeri (PHP 8.x ile test edildi)
- SQLite3 desteği

## Kurulum
1. Depoyu indirdikten sonra proje dizinine geçin:
   ```bash
   cd product_form_ci3
   ```
2. SQLite dosyasını oluşturmak isterseniz:
   ```bash
   sqlite3 database.sqlite < database.sql
   ```
3. Upload klasörünün yazılabilir olduğundan emin olun:
   ```bash
   chmod -R 775 uploads/products
   ```

## Çalıştırma
Yerleşik PHP sunucusunu kullanarak uygulamayı çalıştırabilirsiniz:
```bash
php -S 127.0.0.1:8081
```
Ardından tarayıcıda `http://127.0.0.1:8081` adresine gidin.

## Özellikler
- Ürün listesi (listeleme)
- Dört sekmeli ürün formu (Genel, Detaylar, Resimler, İndirim)
- Ürün ekleme ve düzenleme akışı
- Ana resim yükleme, indirim satırları, CKEditor ile açıklama alanı

## Notlar
- Çoklu resim galerisi demo amaçlıdır; `Resim Ekle` butonu pasif bırakılmıştır.
- Veritabanı bağlantısı `application/config/database.php` içinde `database.sqlite` dosyasını kullanacak şekilde ayarlanmıştır.

