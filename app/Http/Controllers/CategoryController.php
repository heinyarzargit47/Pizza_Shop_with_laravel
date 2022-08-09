<?php

namespace App\Http\Controllers;

use App\Models\pizza;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function category(){
        // $data = Category::paginate(5);
        $data = Category::select('categories.*',DB::raw('COUNT(pizzas.category_id) as count'))
                ->leftJoin('pizzas','pizzas.category_id','categories.category_id')
                ->groupBy('categories.category_id')
                ->paginate(7);

return view('admin.category.index')->with(['categoryData' => $data]);
    }
    public function addCategory(){
        return view('admin.category.addCategory');
    }
    public function createCategory(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',

        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = [
            'category_name' => $request->name,

        ];
        Category::create($data);
        return redirect()->route('admin#category')->with(['success' => 'New Category Added !']);
    }
    public function editCategory($id){
        $oldData = Category::where('category_id', $id)->first();


        return view('admin.category.edit')->with(['oldData' => $oldData]);
    }
    public function updateCategory(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',

        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = [
            'category_name' => $request->name,
        ];
        Category::where('category_id', $request->id)->update($data);
        return redirect()->route('admin#category')->with(['updateSuccess' => 'Successful Updated']);

    }

    public function searchCategory(Request $request){

        $searchData = Category::where('category_name','like','%'.$request->searchCategory.'%')->paginate(5);
        $oldData = $request->searchCategory;
        return view('admin.category.index')->with(['oldData' => $oldData,'categoryData' => $searchData]);

    }

    public function deleteCategory($id){
        Category::where('category_id',$id)->delete();
        return redirect()->route('admin#category')->with(['deleteSuccess' => 'Successful Deleted']);


    }
    public function categoryItem($id){
       $categoryItem = pizza::select('pizzas.*','categories.category_name')
                    ->join('categories','categories.category_id','pizzas.pizza_id')
                    ->where('pizzas.category_id',$id)
                    ->get();
       return view('admin.category.item')->with(['categoryItem' => $categoryItem]);

    }
}
