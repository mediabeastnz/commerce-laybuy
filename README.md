<p align="center"><img src="./src/icon.svg" width="100" height="100" alt="Laybuy for Craft Commerce icon"></p>

<h1 align="center">Laybuy for Craft Commerce 2</h1>

This plugin provides an [Laybuy](https://www.laybuy.com) integration for [Craft Commerce](https://craftcms.com/commerce).

## Requirements

This plugin requires Craft Commerce 2.0.0 or later.

## Setup

In order for this gateway to work, the Craft config setting `tokenParam` must be changed to something other than the word 'token'. Craft looks for this querystring internally and it just so happens Laybuy returns the same word when returning to the merchant site. Simply add this (or whatever word you prefer) to your `general.php`.

```php
'*' => [
    // Token querystring
    'tokenParam' => 'crafttoken'
]
```

To add Laybuy as a gateway, go to Commerce → Settings → Gateways, create a new gateway, and set the gateway type to "Laybuy".
You can either choose to set the gateway configuration in the CMS or use a config file instead. Learn more about that [here](https://docs.craftcms.com/commerce/v2/gateway-config.html#gateway-configuration)

## Installation

You can install this plugin from the Plugin Store or with Composer.

#### From the Plugin Store

Go to the Plugin Store in your project’s Control Panel and search for "Laybuy". Then click on the "Install" button in its modal window.

#### With Composer

Open your terminal and run the following commands:

```bash
# go to the project directory
cd /path/to/my-project.test

# tell Composer to load the plugin
composer require mediabeastnz/commerce-laybuy

# tell Craft to install the plugin
./craft install/plugin commerce-laybuy
```