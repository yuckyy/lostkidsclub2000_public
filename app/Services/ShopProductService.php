<?php

namespace App\Services;

use App\Models\Products;

class ShopProductService
{
    public function getProducts($cat_id)
    {
        $products = Products::leftJoin('product_images', function ($join) {
            $join->on('products.id', '=', 'product_images.product_id')
                ->whereRaw('product_images.id = (
                SELECT MIN(id) FROM product_images WHERE product_id = products.id)');
        });
        if (!empty($cat_id)) {

            if ($cat_id == 'lastdrop') {
                $products->where('products.lastdrop', '=', '1');
            } else if ($cat_id == 'sale') {
                $products->where('products.sale_off', '<>', 'null');
            } else if ($cat_id > 0) {
                $products->where('products.cat_id', $cat_id);
            }

        }
        $products = $products->orderBy('products.order', 'desc')
            ->where('products.price', '!=', 'SOLD OUT')
            ->where('products.show', '=', '1')
            ->paginate(6, ['products.*', 'product_images.image as additional_image']);
        $products->each(function ($product) {
            $product->additional_price = ceil($product->price - ($product->price * $product->sale_off / 100));
        });

        return $products;
    }

    public function loadMoreProducts($request)
    {
        $page = $request->query('page');

        $cat_id = $request->query('cat_id');

        $query = Products::leftJoin('product_images', function ($join) {
            $join->on('products.id', '=', 'product_images.product_id')
                ->whereRaw('product_images.id = (
                SELECT MIN(id) FROM product_images WHERE product_id = products.id
            )');
        });

        if ($cat_id > 0 && $cat_id < 9) {
            $query->where('products.cat_id', $cat_id);
        } else if ($cat_id == 'sale') {
            $query->where('products.sale_off', '<>', 'null');
        } else if ($cat_id == 'lastdrop') {

            $query->where('products.lastdrop', 1);
        }

        $query = $query->where('products.price', '!=', 'SOLD OUT')->where('products.show', '=', '1');

        $products = $query->orderBy('products.order', 'desc')
            ->paginate(6, ['products.*', 'product_images.image as additional_image'], 'page', $page);
        $products->each(function ($product) {
            $product->additional_price = ceil($product->price - ($product->price * $product->sale_off / 100));
        });

        return $products;
    }
}
