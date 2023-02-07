Langkah - langkah simulasi :
1.	Clone repository
2.	copy .env.example
3.	lalu rename menjadi .env
4.	Bikin DB sesuai nama di .env
5.  Jalanin command di root directory 'composer install'
6.  Jalanin command di root directory 'php artisan key:generate'
7.	Jalanin command di root directory 'php artisan migrate:fresh --seed'
8.	Jalanin command di root directory 'php artisan storage:link'
9.	Jalanin command di root directory 'php artisan serve'
10.	Ke localhost:8000, credential user dapat dilihat di .\database\seeders\AccountSeeder.php, bisa di cek untuk akun testing admin dan testing user
