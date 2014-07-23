## About

Here you can see AdminLTE theme preview: http://almsaeedstudio.com/preview/

### Installation

###### Install new Laravel4 project using composer:
```
composer create-project laravel/laravel project_name 
```
###### Update your composer.json require file with:

```json
"jakubsacha/adminlte": "dev-master"
```

and change minimum stability from stable to:
```json
"minimum-stability": "dev"
```

######  Hit `composer update`

###### Configure your database
In app/config/database.php

###### Add ServiceProviders
You have to add
```php
'Cartalyst\Sentry\SentryServiceProvider',
'Mrjuliuss\Syntara\SyntaraServiceProvider',
"Jakubsacha\Adminlte\AdminlteServiceProvider"
```

into app/config/app.php service providers array and
```php
'Sentry' => 'Cartalyst\Sentry\Facades\Laravel\Sentry'
```
into aliases (on the bottom)

###### Install Syntara
```php
php artisan syntara:install
php artisan create:user user email password Admin
```
###### Publish assets
```php
php artisan asset:publish
```

###### Done!




                
