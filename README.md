<p align="center">
    <a href="http://www.yiiframework.com/" target="_blank">
        <img src="http://static.yiiframework.com/files/logo/yii.png" width="400" alt="Yii Framework" />
    </a>
</p>

[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=contact@inquid.co&item_name=Yii2+extensions+support&item_number=22+Campaign&amount=5%2e00&currency_code=USD)

yii-pagaris
=====================

Librería para usar el API de https://doc.pagaris.com/



## Instalación

La forma preferida para instalar esta extensión es a través de [composer](http://getcomposer.org/download/).

Para instalar, ejecutar

```
$ php composer.phar require inquid/yii-pagaris
```

or agregar

```
"inquid/yii-pagaris": "*"
```
en la sección "require" de tu composer.json.

## Configuración

Configurar como componente
```php
$config = [
     // ...
    'components' => [
        'pagaris' => [
            'class' => 'inquid\pagaris\Pagaris',
            'token' => 'API_KEY...',
            'isSandbox' => true
        ],
```

## Uso

```php
// Lista de Clientes
$response = Yii::$app->pagaris->getCharges();
```

Ver la documentación del api en: https://doc.pagaris.com/

Iniciativa Programa México: 
![Iniciativa Programa México](https://lh5.googleusercontent.com/k6u-DepqdgZzTk15Kxx6UPuZJ0ldiv6EPuhhJYRp8QfB89kLxU-D1D7YdYST-gGXnSxl9LFixzn5sYg=w1920-h990)

SUPPORT
-----
[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=contact@inquid.co&item_name=Yii2+extensions+support&item_number=22+Campaign&amount=5%2e00&currency_code=USD)
