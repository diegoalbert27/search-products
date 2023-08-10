<?php

use Gt\Dom\HTMLDocument;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . './config/globals.php';

$html_home_site = file_get_contents(URL_SITE);
$home_document = new HTMLDocument($html_home_site);

$url_action_search = $home_document->querySelector('#gh-f')->action;

$_from = $home_document->querySelector('#gh-f input[name=_from]')->value;
$_trksid = $home_document->querySelector('#gh-f input[name=_trksid]')->value;
$_nkw = SEARCH_PRODUCTS;

$request_get = ['_from' => $_from, '_trksid' => $_trksid, '_nkw' => $_nkw];
$get_url_encode = http_build_query($request_get);

$html_products_finded = file_get_contents("{$url_action_search}?{$get_url_encode}");
$products_document = new HTMLDocument($html_products_finded);

$results_products = $products_document->querySelectorAll('.srp-results > .s-item.s-item__pl-on-bottom');

$products = [];

$results_products->forEach(function ($product) {
  global $products;

  $product_info = $product->firstElementChild->lastElementChild;
  $product_link = $product_info->firstElementChild->href;

  $product_title = $product_info->firstElementChild->innerText;
  $product_title = str_replace('Opens in a new window or tab', '', $product_info->firstElementChild->innerText);

  $product_subtitle = $product_info->children[1]->innerText;

  $product_details = $product_info->lastElementChild;

  $product_price = $product_details->children[0]->firstElementChild->innerText;
  $transfer_product = $product_details->children[3]->firstElementChild->innerText;
  $country_product = $product_details->children[4]->firstElementChild->innerText;

  $products[] = [
    'link' => $product_link,
    'title' => $product_title,
    'subtitle' => $product_subtitle,
    'price' => $product_price,
    'transfer' => $transfer_product,
    'country' => $country_product
  ];
});

$content = "link;title;subtitle;price;transfer;country;\n";
foreach($products as $product) {
  $product_raw = implode(';', $product);
  $content .= "{$product_raw}\n";
}

$output_dir = __DIR__ . '/../output';

if (!is_dir($output_dir)) {
  mkdir($output_dir);
}

if (file_put_contents($output_dir . '/products.csv', $content)) {
  echo 'Ready File';
}
