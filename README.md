yii2-rest-doc
====
Yii2 rest api document generator. This extension use yii console to build rest api documentation using [php-apidoc](https://github.com/calinrada/php-apidoc).

# Installation

Installation is recommended to be done via composer by running:

	composer require luckynvic/yii2-rest-doc "*"

Alternatively you can add the following to the `require` section in your `composer.json` manually:

```json
"luckynvic/yii2-rest-doc": "*"
```

Run `composer update` afterwards.


# Setup

Add to your console config
```
    'controllerMap' => [
        'build-rest-doc' => [
            'class' => '\lucynvic\restdoc\BuilderController',
            'sourceDirs' => [
                '@api/controllers', // api controller path
            ],
            'outputDir' => 'docs/rest',
            'outputFile' => 'index.html',
            //optional
            'templatePath' => dirname(__DIR__).'/../docs/rest/template/index.html', 
        ],
    ],
 ```