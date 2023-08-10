# Scrapper de Productos en Ebay

Scrapper hecho en php para la obtencion de productos en ebay. El scrapper funciona indicando la palabra clave
de los productos que estes buscando. El realiza la consulta a la pagina y crea un archivo csv con los datos 
obtenidos de los productos y genera un archivo csv.

## Requeriemientos

- PHP 7.4 o superior
- Composer

## Instalacacion
Descarga el repositorio o clonalo con el siguente comando

```shell
git clone https://github.com/diegoalbert27/search-products.git
```

Instalacion de las dependencias

```shell
composer install
```

Generar Busqueda
```shell
php /src/app.php
```

## Personalizar busqueda

Por defecto busca laptops en ebay pero este parametro se puede cambiar en el siguente archivo

```path
/src/config/globals.php
```

Cambie el valor de la constante por los productos que desee buscar

```php
define('SEARCH_PRODUCTS', 'Custom search products');
```

MIT License.
