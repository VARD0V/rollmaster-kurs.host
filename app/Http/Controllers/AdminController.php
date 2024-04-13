<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Categories;
use App\Models\Order;
use App\Models\Products;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function showAdminCapability()
    {
        return view('admin.admin');
    }
    public function products()
    {
        $products = Products::all();
        return view('admin.products', compact('products'));
    }

    public function categories()
    {
        $categories = Categories::all();
        return view('admin.categories', compact('categories'));
    }
}
