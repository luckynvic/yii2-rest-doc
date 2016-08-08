yii2-rest-doc
====
Yii2 rest api document generator. This extension use yii console to build rest api documentation using [php-apidoc](https://github.com/calinrada/php-apidoc)

# Setup
Add to your console config
```
    'controllerMap' => [
        'build-rest-doc' => [
            'class' => '\lucynvic\restdoc\controllers\BuilderController',
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