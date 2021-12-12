## Modules
-   login
-   logout
-   thanas
-   users
-   roles
-   faq
-   slides
-   registration report
-   admin dashboard
    -   approve 
        -   total registration approval count
    -   pending 
        -   total registration pending count
    -   web 
        -   total registration count
    -   whatsapp
        -   total registration count
    -   web
    -   last 15 days summary daywise

- report
  - select division, district, thana
    - download all image in that folder
- mobile number validation same number 2 bar kora jabena
  - with 880/88/+88 only take last 11 digit


```
  git clone repo

    composer install
    or
    composer install  --ignore-platform-reqs
    or
    composer install --no-cache --ignore-platform-reqs
    or
    composer install --optimize-autoloader --dev

    cp .\.env.example .env   
    change content of .env file

    import db file from
    *. public\doc\db.sql

============passport==========
    php artisan key:generate  
    or
    php artisan passport:keys 
============passport==========

    php artisan serve 
    or
    php artisan serve --port=8001


    composer dump-autoload

    ==========Cache clear===============
    php artisan cache:clear
    php artisan route:cache
    php artisan config:cache
    php artisan view:clear
    php artisan optimize
    php artisan config:clear
    php artisan route:clear
    php artisan optimize:clear

    composer dump-autoload

     php artisan serve
     
    ==========Cache clear===============

    delete composer.lock 
    if needed

```



locale check
Lang::locale()
