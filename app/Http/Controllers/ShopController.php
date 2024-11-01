<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Services\ShopProductService;

class ShopController extends Controller
{
    protected ShopProductService $productService;

    public function __construct(ShopProductService $productService)
    {
        $this->productService = $productService;
    }

    public function shop($cat_id = null)
    {

        $pageTitle = "Shop";
        $products = $this->productService->getProducts($cat_id);

//        $AllProductsIds = Products::all('id');

        return view('homme', compact('products', 'pageTitle', 'cat_id'));
    }

    public function loadMoreProducts(Request $request)
    {
        $products = $this->productService->loadMoreProducts($request);
        return view('partials.products', compact('products'))->render();
    }

}

