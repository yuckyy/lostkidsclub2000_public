<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class MailController extends Controller
{
    public function mail(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $cart = session()->get('cart', []);

        $cartItemsData = [];
        $cartTotal = 0;

        foreach ($cart as $cartItemKey => $item) {
            $productData = explode('_', $cartItemKey);

            $productId = $productData[0];
            $size = $productData[1];

            $product = Products::find($productId);

            if ($product) {
                $item['product_id'] = $productId;
                $item['image'] = $product->image;
                $item['size'] = $size;
                $cartItemsData[] = $item;
                $cartTotal += intval($item['price']) * $item['quantity'];
            }
        }

        return view('emails.orders.shipped', compact('cartItemsData', 'cartTotal'));
    }

    /**
     * @return JsonResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getCartCount(): \Illuminate\Http\JsonResponse
    {
        $cart = session()->get('cart', []);
        $cartCount = 0;

        foreach ($cart as $item) {
            $cartCount += $item['quantity'];
        }

        return response()->json(['count' => $cartCount]);
    }


}
