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

<img width="591" height="671" alt="Ekran Resmi 2025-11-21 15 37 55" src="https://github.com/user-attachments/assets/db455422-e985-4c4e-a454-7cc0423e4967" />
<img width="394" height="594" alt="Ekran Resmi 2025-11-21 15 38 19" src="https://github.com/user-attachments/assets/69f249b7-e39a-4e75-ab13-638844674985" />
<img width="391" height="122" alt="Ekran Resmi 2025-11-21 15 38 33" src="https://github.com/user-attachments/assets/9cdff394-3ad5-4c9c-b673-709fa8bd4d4a" />
<img width="387" height="171" alt="Ekran Resmi 2025-11-21 15 40 59" src="https://github.com/user-attachments/assets/261eecf9-2d1f-4799-83f0-e41b90c18d9f" />
<img width="398" height="67" alt="Ekran Resmi 2025-11-21 15 41 16" src="https://github.com/user-attachments/assets/6afbffeb-a0db-4d24-b571-1662673ad7d5" />
