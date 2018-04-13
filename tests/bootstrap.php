<?php

/**
 * Use composer to autoload dependencies
 */
require_once 'vendor/autoload.php';

/**
 * Include helpers
 */
require_once 'helpers.php';

/**
 * Autoload Annotations
 * This is used to deserialize a JSON string intro an object
 */
\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');