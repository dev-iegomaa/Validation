# 🍗 PHPValidation 🍗

PHPValidation is a php class handle validation inputs.

## installation

install once with composer:

```
composer require dev-iegomaa/php_validation
```

## usage

```php

/* first make instance */
use DevIegomaa\PhpValidation\Validation;
$validation = new Validation();

/** 
 * If any validation return NULL it means data not valid. 
 * to make validation send data by using setter functions.
 * to fetch data or result using getter functions.
 */
$name = '';
$validation->setName($name);
$validation->getName();

$email = '';
$validation->setEmail($email);
$validation->getEmail();

$password = '';
$validation->setPassword($password);
$validation->getPassword();

$message = '';
$validation->setMessage($message);
$validation->getMessage();

$phone = '';
$validation->setPhone($phone);
$validation->getPhone();

```

