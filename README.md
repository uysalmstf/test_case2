### Kurulum

- git clone ile proje çekilir
- composer install proje dizininde çalıştırılır
- .env dosyası, env_example içeriği ile oluşturulur ve bu dosyada db değişiklikleirni yapılır
- php artisan migrate proje dizininde çalıştırılır
- eğer users already exists hatası verirse, <b>php artisan migrate --path=/database/migrations/2024_06_20_001302_create_integration_table.php</b> komutu çalıştırılabilir
- env dosyasına DB_DATABASE_TEST değişkenini test edilecek db olarak eklenir
- php artisan passport:keys çalıştırılır
- php artisan key:generate çalıştırılır
