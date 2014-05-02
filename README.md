### Installation

Install new Laravel4 project using composer:
```
composer create-project laravel/laravel --prefer-dist
```
then update your composer.json require file with:

```
"jakubsacha/adminlte": "dev-master"
```

and hit `composer update`

next step is doing typical synatra installation process:

http://mrjuliuss.github.io/syntara/docs/installation.html

add service provider in your app.php config file

```
"Jakubsacha\Adminlte\AdminlteServiceProvider"
```
