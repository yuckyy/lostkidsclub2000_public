<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Lang;
use App\Models\Products;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Services\AdminProductService;


class AdminController extends Controller
{

    protected AdminProductService $productService;

    public function __construct(AdminProductService $productService)
    {
        $this->productService = $productService;
    }

    public function dashboard(Request $request)
    {
        if ($request->input('logout')) {

            Auth::logout();

            return redirect('/')->with('success', 'Log Out : sueccess');

        }
        return view('admin.dashboard');

    }
    public function products($cat_id = null)
    {

        $pageTitle = "Home";

        $products = $this->productService->getProducts();

        $AllProductsIds = Products::all('id');
        $AllCategiries = Categories::all();
        $AllLangs = Lang::all();

        return view('admin.product', compact('products', 'pageTitle', 'cat_id', 'AllProductsIds', 'AllCategiries', 'AllLangs'));
    }


    public function store(Request $request)
    {
        $product = new Products();

        $product = $this->productService->store($request , $product);

        $product->save();

        return redirect()->route('admin.product')->with('success', 'Product added successfully.');
    }

    public function update(Request $request, $id)
    {

        $product = Products::findOrFail($id);

        $product = $this->productService->store($request , $product);

        $product->save();

        return redirect()->route('admin.product')->with('success', 'Product updated successfully.');
    }
    public function destroy($id)
    {
        $product = Products::findOrFail($id);

        Storage::disk('public_product')->delete($product->image);

        $product->delete();

        return redirect()->route('admin.product')->with('success', 'Product deleted successfully.');
    }

}
