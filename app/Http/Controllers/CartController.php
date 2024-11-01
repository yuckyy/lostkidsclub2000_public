<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CartController extends Controller
{
    public function addToCart(Request $request): \Illuminate\Http\JsonResponse
    {
        $productId = $request->input('product_id');
        $product = Products::find($productId);

        $size = $request->input('size');

        if (!$size) {
            return response()->json(['success' => false, 'message' => 'Size Error.']);
        }

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            session()->put('cart', []);
        }
        $cartItemKey = $productId . '_' . $size;

        if (array_key_exists($cartItemKey, $cart)) {

            $cart[$cartItemKey]['quantity'] += 1;
        } else {
            if (!empty($product->sale_off)) {
                $cart[$cartItemKey] = [
                    'name' => $product->name,
                    'id' => $product->id,
                    'price' => ceil($product->price - ($product->price * $product->sale_off / 100)),
                    'image' => $product->image,
                    'quantity' => 1,
                    'size' => $size,
                ];
            } else {
                $cart[$cartItemKey] = [
                    'name' => $product->name,
                    'id' => $product->id,
                    'price' => $product->price,
                    'image' => $product->image,
                    'quantity' => 1,
                    'size' => $size,
                ];
            };

        }

        session()->put('cart', $cart);

        return response()->json(['success' => true, 'message' => 'Added To Cart.']);
    }


    public function removeProduct(Request $request): \Illuminate\Http\JsonResponse
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            session()->put('cart', []);
        }
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] -= 1;

            if ($cart[$productId]['quantity'] <= 0) {
                unset($cart[$productId]);
            }

            if (empty($cart)) {
                session()->forget('cart');
            } else {
                session()->put('cart', $cart);
            }

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Error.']);
    }

    public function removeAll()
    {
        session()->forget('cart');
        return response()->json(['success' => true]);
    }

    public function showCart(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
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

        return view('partials.cart.cart-partial', compact('cartItemsData', 'cartTotal'));
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
