# Scrapper de Productos en Ebay

Scrapper hecho en php para la obtención de productos en ebay. 
El scrapper funciona indicando la palabra clave de los productos que estés buscando. 
Él realiza la consulta a la página y crea un archivo CSV con los datos obtenidos de los productos.

## Requeriemientos

- PHP 7.4 o superior
- Composer

## Instalacacion
Descargar el repositorio o clónalo con el siguiente comando

```shell
git clone https://github.com/diegoalbert27/search-products.git
```

Instalación de las dependencias

```shell
composer install
```

Generar Búsqueda
```shell
php /src/app.php
```

## Personalizar búsqueda

Por defecto busca laptops en ebay, pero este parámetro puede ser cambiado en el siguiente archivo

```path
/src/config/globals.php
```

Cambie el valor de la constante por los productos que desee buscar

```php
define('SEARCH_PRODUCTS', 'Custom search products');
```

MIT License.
