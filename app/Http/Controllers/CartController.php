<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function viewCart()
    {
        $user_id = auth()->id(); // Assuming you have authentication set up
        $cartItems = Carts::where('user_id', $user_id)->get();

        return view('cart/cart', ['cartItems' => $cartItems]);
    }
    public function addItem(Request $request, $id)
    {
        // Получаем данные из запроса
        $quantity = $request->input('quantity');

        // Получаем информацию о товаре
        $product = Products::findOrFail($id);


        // Вычисляем стоимость за один товар
        $itemPrice = $product->price;

        // Получаем идентификатор текущего пользователя
        $userId = Auth::id();

        // Создаем новую запись в таблице carts
        $cartItem = new Carts();
        $cartItem->user_id = $userId; // Устанавливаем user_id
        $cartItem->product_id = $id;
        $cartItem->quantity = $quantity;

        // Сохраняем запись
        $cartItem->save();

        // Возвращаем ответ в виде JSON
        return response()->json(['message' => 'Item added to cart successfully', 'total_price' => $cartItem->price]);
    }
    public function update(Request $request)
    {
        // Проверяем, чтобы количество было больше 0
        $request->validate([
            'product_id' => 'required|integer|exists:products,id', // Проверяем, что товар существует
            'quantity' => 'required|integer|min:1', // Проверяем, что количество больше 0
        ]);

        // Получаем данные из запроса
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Получаем текущую корзину из сессии
        $cart = session()->get('cart', []);

        // Проверяем, что товар есть в корзине
        if (isset($cart[$productId])) {
            // Обновляем количество товара
            $cart[$productId]['quantity'] = $quantity;
            // Обновляем корзину в сессии
            session()->put('cart', $cart);
        }

        // Возвращаем ответ
        return response()->json(['message' => 'Количество товара обновлено']);
    }
    public function delete(Request $request, $productId)
    {
        // Получаем текущую корзину из сессии или создаем новую
        $cart = Carts::find($request->session()->get('cart_id'));

        if (!$cart) {
            $cart = new Carts();
            $cart->save();
            $request->session()->put('cart_id', $cart->id);
        }

        // Удаляем товар из корзины
        $product = Products::find($productId);
        if ($product) {
            $cart->products()->detach($product);
        }

        // Возвращаем ответ
        return response()->json(['message' => 'Товар удален из корзины']);
    }
}
