<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Categories;
use App\Models\Products;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return response(['data' => $categories,]);
    }

    public function show($id){
        $products = Products::where('category_id', $id)->get();
        return response(['data' => $products]);
    }

    public function create(CategoryCreateRequest $request)
    {
        $existingCategory = Categories::where('name', $request->input('name'))->first();
        if ($existingCategory) {
            throw new ApiException(422, 'Категория с таким именем уже существует');
        }
        // Создаем новую категорию
        $category = new Categories([
            'name' => $request->input('name'),
        ]);
        $category->save();
        return response()->json(['message' => 'Категория успешно создана'], 201);
    }

    public function destroy($id){
        $categories = Categories::find($id);
        if (!$categories) {
            throw new ApiException(404, 'Категория не найдена');
        }
        $categories->delete();
        return response()->json(['message' => 'Категория успешно удалена'], 200);

    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        // Поиск категории по id
        $categories = Categories::find($id);
        if (!$categories) {
            throw new ApiException(404, 'Категория не найдена');
        }

        // Проверяем, есть ли категория с таким именем уже в базе данных
        $existingProduct = Categories::where('name', $request->input('name'))->first();
        if ($existingProduct) {
            throw new ApiException(422, 'Категория с таким именем уже существует');
        }

        // Обновление атрибутов категории
        $categories->name = $request->input('name');

        // Сохранение изменений в базе данных
        $categories->save();

        // Возврат успешного ответа
        return response()->json(['message' => 'Категория успешно обновлена'], 200);
    }
}
