<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;

//Регистрация
Route::post('/register' , [AuthController::class, 'register' ]);
//Авторизация
Route::post('/login' , [AuthController::class, 'login' ]);
//Выход
Route::middleware('auth:api')->get('/logout', [AuthController::class, 'logout']);

//Просмотр всех товаров
Route::get('/products',[ProductController::class, 'index']);
//Просмотр конкретного товара
Route::get('/products/{id}' , [ProductController::class, 'show']);
//Просмотр категорий
Route::get('/categories',[CategoryController::class, 'index']);
//Просмотр товаров определенной категории
Route::get('/categories/{id}',[CategoryController::class, 'show']);

Route::middleware(['auth:api','role:admin'])->group(function () {
    //Создание продукта
    Route::post('/products/create',[ProductController::class, 'create']);
    //Редактирование продукта
    Route::post('/products/update/{id}',[ProductController::class, 'update']);
    //Удаление продукта
    Route::delete('/products/delete/{id}',[ProductController::class, 'destroy']);
    //Создание категории
    Route::post('/categories/create',[CategoryController::class, 'create']);
    //Редактирование категории
    Route::patch('/categories/{id}',[CategoryController::class, 'update']);
    //Удаление категории
    Route::delete('/categories/destroy/{id}',[CategoryController::class, 'destroy']);
});

Route::middleware(['auth:api','role:user|admin'])->group(function (){
    //Добавление товара в корзину
    Route::middleware('auth:api')->post('/products/{id}', [CartController::class, 'addItem']);
    //Просмотр корзины
    Route::middleware('auth:api')->get('/cart', [CartController::class, 'viewCart']);
    //Редактирование корзины
    Route::middleware('auth:api')->patch('/cart', [CartController::class, 'update']);
    //Удаление товара из корзины
    Route::middleware('auth:api')->delete('/cart/product/{id}', [CartController::class, 'delete']);
    //Оформление заказа
    Route::middleware('auth:api')->post('/checkout', [OrderController::class, 'checkout']);
    //Просмотр заказов
    Route::middleware('auth:api')->get('/orders', [OrderController::class, 'show']);
});





















