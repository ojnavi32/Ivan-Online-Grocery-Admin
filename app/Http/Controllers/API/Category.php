<?php

namespace App\Http\Controllers\API;

use App\Repositories\CategoryRepository;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class Category extends Controller
{
    protected $repo;

    public function __construct()
    {
        $this->repo = new CategoryRepository;
    }

    public function lists()
    {
        try {
            $categories = CategoryResource::collection($this->repo->parentsList(true));
            return $this->success(compact('categories'));
        }
        catch (\Exception $e) {
            Log::error($e);
            return $this->error();
        }
    }

    public function children(Request $request)
    {
        $slug = $request->input('slug');

        try {
            $list = $this->repo->childList($slug);
            $children = CategoryResource::collection($list['children']);
            return $this->success(compact('children'));
        }
        catch (\Exception $e) {
            Log::error($e);
            return $this->error();
        }
    }

    public function singleSearch(Request $request)
    {
        $field = $request->input('field');
        $value = $request->input('value');
        try {
            $category = new CategoryResource($this->repo->findBy([$field => $value]));
            return $this->success(compact('category'));
        }
        catch (\Exception $e) {
            Log::error($e);
            return $this->error();
        } 
    }
}
