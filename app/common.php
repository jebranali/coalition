<?php
/**
 * Created by PhpStorm.
 * User: jebram
 * Date: 6/22/2019
 * Time: 1:08 AM
 */
use \Illuminate\Support\Facades\Storage as Storage;
use Carbon\Carbon as Carbon;

function add_products($request)
{
    $products = get_existing_products();

    $data = $request->only(['product_name', 'quantity', 'price']);

    $data['created_at'] = Carbon::now();

    array_push($products, $data);

    return save_products($products);
}

/**
 * @return array|mixed
 * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
 */
function get_existing_products()
{
    return Storage::disk('local')->exists('products.json')
        ? json_decode(Storage::disk('local')->get('products.json')) : [];
}

/**
 * @param $products
 * @return mixed
 */
function save_products($products)
{
    Storage::disk('local')->put('products.json', json_encode($products, JSON_PRETTY_PRINT));

    return 'ok';
}