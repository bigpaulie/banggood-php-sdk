# banggood-php-sdk [![Build Status](https://travis-ci.org/bigpaulie/banggood-php-sdk.svg?branch=master)](https://travis-ci.org/bigpaulie/banggood-php-sdk)

**This is an unofficial PHP SDK for Banggood API**

The official documentation can be found [here](https://api.banggood.com/index.php?com=document&article_id=2)

If you have any issues with the API and not necessarily with the SDK please address to Banggood support team rather than opening a issue here.

### Installation
Install the package via composer using :

```
composer require bigpaulie/banggood-php-sdk
```

### Usage

Make sure you autoload the annotations before you use the SDK by including the following line of code before instantiating the SDK
```php 
/**
 * Autoload Annotations
 * This is used to deserialize a JSON string intro an object
 */
\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');
```

#### Using a builder
You can create an instance of BanggoodClient using a builder.

```php
$credentials = new Credentials('appid', 'appsecret');
$client = (new BanggoodClientBuilder())
            ->credentials($credentials)
            ->environment(BanggoodClientFactory::TYPE_PRODUCTION)
            ->build();
```

### Contributions
There are many ways you can contribute to the project.
If you found a bug please report it as an issue, or create a fork fix the bug and submit a pull-request.

***Please maintain the coding style and testing pattern !***