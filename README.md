Langkah - langkah simulasi :
1.	Clone repository
2.	Bikin DB sesuai nama di .env
3.  Jalanin command di root directory ' composer install'
4.  Jalanin command di root directory 'php artisan key:generate'
5.	Jalanin command di root directory 'php artisan migrate:fresh --seed'
6.	Jalanin command di root directory 'php artisan storage:link'
7.	Jalanin command di root directory 'php artisan serve'
8.	Ke localhost:8000, credential user dapat dilihat di .\database\seeders\AccountSeeder.php, bisa di cek untuk akun testing admin dan testing user
