<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;



class NewsController extends Controller
{
    /**
     * @OA\Get(
     * path="/api/news",
     * operationId="getNewsList",
     * tags={"news"},
     * @OA\Response(
     *    response=200,
     *    description="success"
     * ))
     */
    public function index()
    {
        $data = News::query()->with('category')->paginate();

        return response()->json($data);
    }

    /**
     * @OA\Get(
     * path="/api/news/{id}",
     * operationId="getNewsList",
     * tags={"news"},
     *     @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="ID of news that needs to be listed",
     *     required=true,
     *     @OA\Schema(
     *         type="integer",
     *         format="int64"
     *     )
     *   ),
     * @OA\Response(
     *    response=200,
     *    description="success"
     * ))
     */
    public function edit($id)
    {
        return $this->show($id);
    }

    public function show($id)
    {
        $data = News::query()->with('category')->where('id', $id)->get();

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $attr = $request->only(['type', 'category_id', 'title', 'content']);

        $newsInstance = new News();

        $newsInstance->fill($attr);
        $newsInstance->user_id = auth()->user()->getAuthIdentifier();

        if (! $newsInstance->save()) {
            throw new \Exception('error while saving news.');
        }

        return response()->json($newsInstance);
    }

    public function update(Request $request, $id) {
        $attr = $request->only(['type', 'category_id', 'title', 'content']);

        $newsInstance = News::findOrFail($id);

        $newsInstance->fill($attr);

        if (! $newsInstance->save()) {
            throw new \Exception('error while saving news.');
        }

        return response()->json(['msg' => 'success']);
    }

    public function destroy($id)
    {
        $newsInstance = News::firstOrFail($id);

        if (! $newsInstance->delete()) {
            throw new \Exception('error while deleting news.');
        }

        return response()->json(['msg' => 'success']);
    }
}
