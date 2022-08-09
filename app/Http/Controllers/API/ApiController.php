<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function categoryList(){

        $categories = Category::get();
        $response = [
            'status' => "Success",
            'data' => $categories
        ];
        return response()->json($response);
    }
    public function categoryCreate(Request $request){
        $data = [
            'category_name' => $request->category_name,
        ];
        Category::create($data);
        $response = [
            'status' => 200,
            'message' => 'Success'
        ];
        return response()->json($response);
    }
}
