<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Support\Facades\Response;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function product($product_id)
    {
        $product = $this->productService->product($product_id);
        $productImages = $this->productService->productImages($product_id);
        $AddedProduct = $this->productService->AddedProduct($product_id, $product->cat_id);
        $AllProductsIds = Products::all('id');

        return view('product', [
            'AllProductsIds' => $AllProductsIds,
            'image' => $product->image,
            'drop' => $product->drop,
            'additional_text' => $product->additional_text,
            'description' => $product->description,
            'description_ua' => $product->description_ua,
            'size_guide' => $product->size_guide,
            'name' => $product->name,
            'made_in' => $product->made_in,
            'price' => $product->price,
            'sale_off' => $product->sale_off,
            'additional_price' => ceil($product->price - ($product->price * $product->sale_off / 100)),
            'id' => $product->id,
            'xs' => $product->xs,
            's' => $product->s,
            'm' => $product->m,
            'l' => $product->l,
            'xl' => $product->xl,
            'productImages' => $productImages,
            'AddedProduct' => $AddedProduct

        ]);
    }

    public function exportToXML()
    {
        $formattedXml = $this->productService->exportToXML();
        return Response::make($formattedXml, 200, [
            'Content-Type' => 'text/xml',
        ]);
    }

}
