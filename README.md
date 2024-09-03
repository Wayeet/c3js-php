# c3js-php
PHP Wrapper für C3js based on D3. Was written some years ago and I have now decided import it to GH and make it public for anyone to use.
Absolutely WIP but the most important charts are implemented.


# Get started using c3js-php

1. Install the package using composer
```bash
composer require wayeet/c3js-php:dev-main
```
When the package is finished in some time you can stop using :dev-main as the it will enter stable...

2. Import the autoload-File (if this is the first composer package in your project) at the top of the php file
```php
require_once __DIR__ . "/vendor/autoload.php";
```

3. Import the css and js dependencies by calling the "Includer". The includeALL methods injects all the needed Code directly into the head tag 
```php
<head>
    <?php>
    $includer = new Util\Includer();
    $includer->includeALL();
    ?>
</head>
```

4. Start using the charts. For e.g. the BarChart Class
```php
<?php
$demoData = [
    ['data1', 30, 200, 100, 400, 150, 250],
    ['data2', 130, 100, 140, 200, 150, 50]
];
$chart = new C3Charts\BarChart("test", $demoData, true);
$chart->preRender();
$chart->render();
?>
```


# Docs
tdb