### Kurulum

- git clone ile proje çekilir
- composer install proje dizininde çalıştırılır
- .env dosyası, env_example içeriği ile oluşturulur ve bu dosyada db değişiklikleirni yapılır
- php artisan migrate proje dizininde çalıştırılır
- eğer users already exists hatası verirse, <b>php artisan migrate --path=/database/migrations/2024_06_20_001302_create_integration_table.php</b> komutu çalıştırılabilir
- env dosyasına DB_DATABASE_TEST değişkenini test edilecek db olarak eklenir
- php artisan passport:keys çalıştırılır
- php artisan key:generate çalıştırılır
- chmod 777 -R storage/ ile proje dizininde izin verlir.
- .env dosyanızda SESSION_DRIVER alanını file olarak değiştirin


<hr>

Not: Github repoma collection u json olarak ekliyorum

github da api olarak paylaşacaktım ancak secret olarak gördü o yüzden paylaştırtmadı. ben de repoya json collection ekledim.
<hr>

### Komutlar

php artisan app:integration-command {type} {integration} {username} {password} {id}


- Ekleme
\`\`\`bash
php artisan app:integration-command add hepsiburada null null null
\`\`\`
- Düzeneleme
\`\`\`bash
php artisan app:integration-command update getir null null 2
\`\`\`
- Silme
\`\`\`bash
php artisan app:integration-command delete null null null 2
\`\`\`

<hr> 