<?php

namespace App\Services;

use App\Models\Products;

class HomeProductService
{
    public function getProducts($cat_id)
    {
        if (!empty($cat_id)) {
            $query = Products::leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->whereRaw('product_images.id = (SELECT MIN(id) FROM product_images WHERE product_id = products.id)');
            });

            if ($cat_id == 'lastdrop') {
                $query->where('products.lastdrop', '=', '1');
            } else if ($cat_id > 0 && $cat_id < 8) {
                $query->where('products.cat_id', $cat_id);
            }
            $query = $query->orderBy('products.order', 'desc')
                ->where('products.price', '!=', 'SOLD OUT')
                ->paginate(20, ['products.*', 'product_images.image as additional_image']);
        } else {
            $query = Products::leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->whereRaw('product_images.id = (SELECT MIN(id) FROM product_images WHERE product_id = products.id)');
            })
                ->orderBy('products.order', 'desc')
                ->where('products.price', '!=', 'SOLD OUT')
                ->paginate(6, ['products.*', 'product_images.image as additional_image']);
        }

        return $query;
    }
}
