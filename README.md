# Multiple Auth
Ini merupakan modul untuk membuat middleware yang dapat spesifik menentukan role user yang sedang login. Penerapannya di setiap route diberikan spesifik role apa saja yang bisa mengakses route tersebut.

### Instalasi
```
composer require barradev/multipleauth
```

Setelah itu, jalankan perintah di bawah ini
```
php artisan multipleauth:publish
```

Jika sudah selesai, jangan lupa tambahkan baris kode ini di `kernel.php` bagian routeMiddleware
```php
'multipleAuth'  => \App\Http\Middleware\MultipleAuth::class,
```

### Penggunaan
Di dalam route web.php, tambahkan middleware ini, contoh
```php
Route::middleware(['auth', 'multipleAuth:admin,teacher'])->group(function () {
    // isi route
}
```

Maka route di atas hanya bisa diakses oleh user dengan role `admin` dan juga `teacher` saja
