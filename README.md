# Laravel Insee

This package is a Laravel wrapper allowing you to lookup SIREN and SIRET numbers of French businesses and nonprofit associations, attributed by [Insee](https://insee.fr/en/accueil) (Institut national de la statistique et des études économiques).

Laravel Insee uses the [Sirene V3](https://api.insee.fr/catalogue/site/themes/wso2/subthemes/insee/pages/item-info.jag?name=Sirene&version=V3&provider=insee) API.

## Installation

You can install this package via Composer:

``` bash
composer require nspehler/laravel-insee
```

If you are using Laravel 5.5 or later, the service provider and facade will be discovered automatically.

On earlier versions, you need to do that manually. You must install the service provider:

``` php
// config/app.php
'providers' => [
    ...
    NSpehler\LaravelInsee\InseeServiceProvider::class,
];
```

And register an alias for the Insee facade:

``` php
// config/app.php
'aliases' => [
    ...
    'Insee' => NSpehler\LaravelInsee\Facades\Insee::class,
];
```

## Configuration

To get started, sign up on [https://api.insee.fr](https://api.insee.fr) and create a new application. From the "Production Keys" tab, you'll be able to generate your Consumer Key and Consumer Secret.

Make sure to subscribe your new app to the Sirene V3 API to grant it access.

Then, you can add your production keys as environment variables in your `.env` file:
```
INSEE_CONSUMER_KEY=
INSEE_CONSUMER_SECRET=
```

Optionally, you can edit the name of these variables by publishing the configuration file:
```
php artisan vendor:publish --provider="NSpehler\LaravelInsee\InseeServiceProvider" --tag="config"
```

## Usage

Use the `Insee` facade to lookup a SIREN or SIRET number:

``` php
Insee::siren('840 745 111');
Insee::siret('840 745 111 00012');
```

## Credits

- [Nicolas Spehler](https://nspehler.com)
- [Moon](https://moon.xyz)

## Testing
<img src="https://dev.ls.agency/img/BrowserStack-Logo.svg" width="250" height="54">  

This project uses [BrowserStack](https://browserstack.com) for cross browser testing. We're grateful for their contribution to the open source community.

## License
The MIT License (MIT). Please see [License File](LICENSE) for more information.
