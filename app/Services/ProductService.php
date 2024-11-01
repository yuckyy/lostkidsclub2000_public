<?php

namespace App\Services;

use App\Models\ProductImages;
use App\Models\Products;

class ProductService
{
    public function product($product_id) : object
    {
        return Products::where('id', $product_id)->first();
    }

    public function productImages($product_id) : object
    {
        $images = ProductImages::where('product_id', $product_id)->get();
        $images = $images->sortBy('order');
        return $images;
    }

    public function AddedProduct($product_id, $cat_id) : object
    {
        $AddedProduct = Products::leftJoin('product_images', function ($join) {
            $join->on('products.id', '=', 'product_images.product_id')
                ->whereRaw('product_images.id = (
                SELECT MIN(id) FROM product_images WHERE product_id = products.id)');
        });
        $AddedProduct = $AddedProduct->orderBy('products.order', 'desc')
            ->where('products.price', '!=', 'SOLD OUT')
            ->where('products.id', '!=', $product_id)
            ->where('cat_id', $cat_id)
            ->paginate(6, ['products.*', 'product_images.image as additional_image']);

        $AddedProduct->where('products.cat_id', $cat_id);

        return $AddedProduct;
    }

}
