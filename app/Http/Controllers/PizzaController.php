<?php

namespace App\Http\Controllers;

use App\Models\pizza;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PizzaController extends Controller
{
    public function showPizza(){
        $pizzaData = pizza::get();

        return view('admin.pizza.index')->with(['pizzaData' => $pizzaData]);
    }
    public function createPizza(){

        $category_names = Category::get();

        return view('admin.pizza.create')->with(['category_names' => $category_names]);
    }
    public function addPizza(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
            'price' => 'required',
            'categoryName' => 'required',
            'discountPrice' => 'required',

            'waitingTime' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $file = $request->file('image');

        $fileName =uniqid().'_hein'. $file->getClientOriginalName();

        $file->move(public_path().'/images/',$fileName);

        $data = $this->requestProcess($request);
        $data['image'] = $fileName;


        // $data = $this.pizzaDataRequestProcess($request);
        // dd($data);
        pizza::create($data);
        return redirect()->route('admin#showPizza')->with(['createSuccess' => 'New Pizza Successful Created!']);
    }
    // request process
    private function requestProcess($request){
        return  [
            'pizza_name' => $request->name,

            'price' => $request->price,
            'publish_status' => $request->publishStatus,
            'category_id' => $request->categoryName,
            'discount_price' => $request->discountPrice,
            'by_one_get_one_status' => $request->byOneGetOne,
            'waiting_time' => $request->waitingTime,
            'description' => $request->description,
           ];

    }
    public function detailPizza($id){
        $detailPizza = pizza::where('pizza_id',$id)->get();
        $categoryName = DB::table('categories')
            ->join('pizzas', 'pizzas.category_id', '=', 'categories.category_id')
            ->select('categories.category_name')
            ->first();

        return view('admin.pizza.seeMore')->with(['categoryName' => $categoryName,'detailPizza' => $detailPizza]);
    }
    public function editPizza($id){
         $editCategory = Category::get();
         $editPizza = pizza::select('pizzas.*','categories.category_id','categories.category_name')
                    ->join('categories','pizzas.category_id','categories.category_id')
                    ->where('pizza_id',$id)
                    ->first();



        return view('admin.pizza.edit')->with(['editPizza' => $editPizza, 'editCategory' => $editCategory]);
    }
    public function updatePizza(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'name' => 'required',

            'price' => 'required',
            'categoryName' => 'required',

            'waitingTime' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = $this->requestProcess($request);
        if (isset($request['image'])) {

            // get old image name
            $imageData = pizza::select('image')->where('pizza_id',$id)->first();
            $fileName = $imageData['image'];
            //delete old image name
            if(File::exists(public_path().'/images/'.$fileName)){
                File::delete(public_path().'/images/'.$fileName);
            }
            //request new image from form
            $file = $request->file('image');
            $fileName = uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/images/',$fileName);
            $data['image'] = $fileName;

            pizza::where('pizza_id',$id)->update($data);
            return redirect()->route('admin#showPizza')->with(['updateSuccess' => 'Successful Updated']);

        }else{
            $imageData = pizza::select('image')->where('pizza_id',$id)->first();
            $fileName = $imageData['image'];
            $data['image'] = $fileName;
            pizza::where('pizza_id',$id)->update($data);
            return redirect()->route('admin#showPizza')->with(['updateSuccess' => 'Successful Updated']);



        }



    }
    public function deletePizza($id){
        $dbImage = pizza::select('image')->where('pizza_id',$id)->first();
        $folderImage = $dbImage['image'];
        if(File::exists(public_path().'/images/'.$folderImage)){
            File::delete(public_path().'/images/'.$folderImage);
        }
        pizza::where('pizza_id',$id)->delete();

        return redirect()->route('admin#showPizza')->with(['deleteSuccess' => 'Successful Deleted !']);
    }

    public function searchPizza(Request $request){

        $searchData = pizza::where('pizza_name','like','%'.$request->searchPizza.'%')->get();

        return view('admin.pizza.index')->with(['pizzaData' => $searchData]);

    }

}
