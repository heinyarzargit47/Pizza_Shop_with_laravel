<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\pizza;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){

        $specialPizza = pizza::take(3)->orderBy('price','DESC')->get();


        $promotionPizza = pizza::where('by_one_get_one_status',"1")->get();
        $pizzaList = DB::table('pizzas')->latest()->take(3)->get();
        $allCategory = Category::get();
        return view('user.home')->with(['pizzaList' => $pizzaList, 'allCategory' => $allCategory,'promotionPizza' => $promotionPizza,'specialPizza' => $specialPizza]);

    }
    public function pizzaList(){
        $specialPizza = pizza::take(3)->orderBy('price','DESC')->get();

        $promotionPizza = pizza::where('by_one_get_one_status',"1")->get();

        $pizzaList = DB::table('pizzas')->latest()->take(3)->get();

        $allCategory = Category::get();

        return view('user.home')->with(['pizzaList' => $pizzaList, 'allCategory' => $allCategory,'promotionPizza' => $promotionPizza,'specialPizza' => $specialPizza]);
    }
    public function filterCategory(){
        $allCategory = Category::get();
        return redirect()->route('user#pizzaList')->with(['allCategory' => $allCategory]);
    }
    public function searchWithCategory($id){
        $specialPizza = pizza::take(3)->orderBy('price','DESC')->get();


        $promotionPizza = pizza::where('by_one_get_one_status',"1")->get();

        $allCategory = Category::get();
        $searchWithCategory = pizza::where('category_id', $id)->get();
        return view('user.home')->with(['pizzaList' => $searchWithCategory , 'allCategory' => $allCategory,'promotionPizza' => $promotionPizza,'specialPizza' => $specialPizza]);
    }
    public function shoppingCart(){
        return view('user.cart');
    }
    public function userOrder(Request $request){
        $cartArr = json_decode($request->orderData);
        $total = 0;
        foreach ($cartArr as $row) {
            $total+=($row->price * $row->qty);
        }
        $data =[
            'voucher_number'=> uniqid(),'customer_id' => Auth::user()->id,'total_price' => $total,'payment_status' => "1",'order_date' => Carbon::now(),
        ];
        Order::create($data);
        $order = new Order;
        $last = DB::table('orders')->latest()->first();
        foreach ($cartArr as $row) {
            $order->pizzas()->attach($row->id,['order_id'=>$last->order_id,'price' => $row->price,'qty' => $row->qty]);
        }
        return "Ordered";
    }

}
