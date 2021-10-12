<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $data = News::query()->with(['category', 'user'])->paginate();

        return view('admin.news_index', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $model = new News();

        if ($request->isMethod('post')) {
            $attr = $request->only(['type', 'category_id', 'title', 'content']);

            if ($model->fill($attr)->save()) {
                session()->flash('message', 'News was created!');
            }
        }

        return view('admin.news_edit', ['model' => $model]);
    }

    public function update(Request $request, $id)
    {
        $model = News::query()->where('id', $id)->firstOrFail();

        if ($request->isMethod('post')) {
            $attr = $request->only(['type', 'category_id', 'title', 'content']);

            if ($model->fill($attr)->save()) {
                session()->flash('message', 'News was updated!');
            }
        }

        return view('admin.news_edit', ['model' => $model]);
    }
    public function delete($id)
    {
        $news = News::query()->where('id', $id)->first();

        if ($news) {
            $news->delete();
        }

        return redirect(route('news.indexs'));
    }
}
