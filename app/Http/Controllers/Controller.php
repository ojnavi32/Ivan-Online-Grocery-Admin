<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($items, $status = 200)
    {
        if ($items instanceof Arrayable) {
            $items = $items->toArray();
        }

        if ($items) {
            foreach($items as $key => $item) {
                $data[$key] = $item;
            }
        }

        $response['status'] = 'success';
        $response['data'] = $data;

        return response()->json($response, $status);
    }

    public function error($errors = null, $status = 422)
    {
        $response = [
            'status' => 'error',
            'message' => "Something went wrong!"
        ];

        return response()->json($response, $status);
    }
}
