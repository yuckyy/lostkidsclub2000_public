<?php

namespace App\Services;

use App\Models\Products;
use Illuminate\Support\Facades\Storage;

class AdminProductService
{

    public function getProducts()
    {

        if (!empty($cat_id)) {
            $products = Products::leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->whereRaw('product_images.id = (
                SELECT MIN(id) FROM product_images WHERE product_id = products.id)');
            });

            if ($cat_id == 'lastdrop') {
                $products->where('products.lastdrop', '=', '1');
            } else if ($cat_id == 'sale') {
                $products->where('products.sale_off', '<>', 'null');
            } else if ($cat_id > 0) {
                $products->where('products.cat_id', $cat_id);
            }

            $products = $products->orderBy('products.order', 'desc')
                ->paginate(10000, ['products.*', 'product_images.image as additional_image']);
        } else {
            $products = Products::leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->whereRaw('product_images.id = (
            SELECT MIN(id) FROM product_images WHERE product_id = products.id
        )');
            })
                ->orderBy('products.order', 'desc')
                ->paginate(500, ['products.*', 'product_images.image as additional_image']);
        }
        if (isset($product->sale_off)){
            $products->each(function ($product) {
                $product->additional_price = ceil($product->price - ($product->price * $product->sale_off / 100));
            });
        }
        return $products;
    }
    public function store($request, $product)
    {

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->description_ua = $request->input('description_ua');
        $product->price = $request->input('price');
        $product->xs = $request->input('xs');
        $product->s = $request->input('s');
        $product->m = $request->input('m');
        $product->l = $request->input('l');
        $product->xl = $request->input('xl');
        $product->cat_id = $request->input('category');

        if ($request->input('show') == 'on'){
            $product->show = 1;
        }else{
            $product->show = 0;
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('', 'public_product');
            $product->image = $imagePath;
        }

        if ($request->hasFile('imageNew')) {

            Storage::disk('public_product')->delete($product->image);

            $imagePath = $request->file('imageNew')->store('', 'public_product');

            $product->image = $imagePath;
        }

        if ($request->hasFile('imagesNew')) {
            $productImages = [];

            foreach ($request->file('imagesNew') as $imageFile) {
                $imagePath = $imageFile->store('', 'public_product');

                $productImages[] = [
                    'product_id' => $product->id,
                    'image' => $imagePath,
                ];
            }

            DB::table('product_images')->insert($productImages);
        }

        return $product;
    }
}
