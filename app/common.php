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

    $data['created_at'] = Carbon::now()->toDateString();

    array_push($products, $data);

    return save_products($products);
}

/**
 * @param bool $collection
 * @return array|\Illuminate\Support\Collection|mixed
 * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
 */
function get_existing_products($collection = false)
{
    $products = Storage::disk('local')->exists('products.json')
        ? json_decode(Storage::disk('local')->get('products.json')) : [];

    if($collection){
        return collect($products)->sortByDesc(function ($obj, $key) {
            return Carbon::parse($obj->created_at)->timestamp;
        });
    }

    return $products;
}

/**
 * @param $products
 * @return mixed
 */
function save_products($products)
{
    Storage::disk('local')->put('products.json', json_encode($products, JSON_PRETTY_PRINT));

    return get_existing_products(true);
}