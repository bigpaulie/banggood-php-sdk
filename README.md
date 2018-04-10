# banggood-php-sdk [![Build Status](https://travis-ci.org/bigpaulie/banggood-php-sdk.svg?branch=master)](https://travis-ci.org/bigpaulie/banggood-php-sdk)

**This is an unofficial PHP SDK for Banggood API**

The official documentation can be found [here](https://api.banggood.com/index.php?com=document&article_id=2)

### Installation
Install the package via composer using :

```
composer require bipaulie/banggood-php-sdk
```

Make sure you autoload the annotations before you use the SDK by including the following line of code before instantiating the SDK
```php 
/**
 * Autoload Annotations
 * This is used to deserialize a JSON string intro an object
 */
\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');
```