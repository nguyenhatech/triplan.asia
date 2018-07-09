## Triplan - Web
## Tài liệu liên quan
- [laravel](https://laravel.com/docs/5.4)
- [vue](https://vuejs.org/)
- [axios](https://github.com/mzabriskie/axios)
- [lodash](https://lodash.com/)
- [generator-repository](https://packagist.org/packages/kingdarkness/k-repository)
- [hashids](https://github.com/ivanakimov/hashids.php)

## Cài đặt project
```bash
    $ composer install
    $ php artisan passport:install --force

    $ mkdir storage/app/public/images/avatars
    $ mkdir storage/app/public/images/blogs
```
## Tài khoản đăng nhập Admin
```bash
    superadmin@gmail.com|123456
    admin@gmail.com|123456
```
## Khóa Package lần 1:
```bash
    Nguyên Bản
    "require": {
        "php": ">=7.0.0",
        "barryvdh/laravel-cors": "^0.11.0",
        "fideloper/proxy": "~3.3",
        "intervention/image": "^2.4",
        "kingdarkness/k-repository": "1.0.2",
        "laravel/framework": "5.5.*",
        "laravel/passport": "~4.0",
        "laravel/socialite": "^3.0",
        "laravel/tinker": "~1.0",
        "rap2hpoutre/laravel-log-viewer": "^0.11.0",
        "spatie/laravel-activitylog": "^2.3",
        "spatie/laravel-fractal": "^5.3",
        "zizaco/entrust": "5.2.x-dev"
    }

    "require-dev": {
        "barryvdh/laravel-debugbar": "^3.1",
        "filp/whoops": "~2.0",
        "fzaninotto/faker": "~1.4",
        "mockery/mockery": "~1.0",
        "phpunit/phpunit": "~6.0"
    },

    Sau khi bị khóa
    "require": {
        "php": ">=7.0.0",
        "barryvdh/laravel-cors": "0.11.0",
        "fideloper/proxy": "3.3.4",
        "intervention/image": "2.4.1",
        "kingdarkness/k-repository": "1.0.2",
        "laravel/framework": "5.5.28",
        "laravel/passport": "4.0.3",
        "laravel/tinker": "1.0.3",
        "rap2hpoutre/laravel-log-viewer": "0.11.0",
        "spatie/laravel-activitylog": "^2.3",
        "spatie/laravel-fractal": "5.3.1",
        "zizaco/entrust": "5.2.x-dev"
    }

    "require-dev": {
        "barryvdh/laravel-debugbar": "3.1.4",
        "filp/whoops": "2.1.14",
        "fzaninotto/faker": "1.7.1",
        "mockery/mockery": "1.0",
        "phpunit/phpunit": "6.5.8"
    },
```


