<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::query()->paginate();

        return view('admin.category_index', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $model = new Category();

        if ($request->isMethod('post')) {
            $attr = $request->only(['name']);

            if ($model->fill($attr)->save()) {
                session()->flash('message', 'Category was created!');
            }
        }

        return view('admin.category_edit', ['model' => $model]);
    }

    public function update(Request $request, $id)
    {
        $model = Category::query()->where('id', $id)->firstOrFail();

        if ($request->isMethod('post')) {
            $attr = $request->only(['name']);

            if ($model->fill($attr)->save()) {
                session()->flash('message', 'Category was updated!');
            }
        }

        return view('admin.category_edit', ['model' => $model]);
    }

    public function delete($id)
    {
        $cateogry = Category::query()->where('id', $id)->first();

        if ($cateogry) {
            $cateogry->delete();
        }

        return redirect(route('category.index'));
    }
}
