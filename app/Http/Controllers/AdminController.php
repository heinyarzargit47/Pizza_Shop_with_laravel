<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(){
        return view('admin.home');
    }
    public function profile(){
        $id = auth()->user()->id;
        $userData = User::where('id',$id)->first();


        return view('admin.profile.index')->with(['userData' => $userData]);
    }
    public function userList(){
        $userData = User::where('role','user')->paginate(5);


        return view('admin.user.userList')->with(['userData' => $userData]);
    }
    public function adminList(){

        $adminData = User::where('role','admin')->paginate(5);
        return view('admin.user.adminList')->with(['adminData' => $adminData]);
    }
    public function userSearch(Request $request){
        $userSearch = User::where('name','like','%'.$request->searchUser.'%')
                        ->where('role','user')->paginate(5);
        // dd($userSearch->toArray());
        return view('admin.user.userList')->with(['userData' => $userSearch]);
    }
    public function adminSearch(Request $request){

        $adminSearch = User::where('name','like','%'.$request->searchAdmin.'%')
                        ->where('role','admin')->paginate(5);

        return view('admin.user.adminList')->with(['adminData' => $adminSearch]);
    }
    public function userDelete($id){
        $deleteData = User::where('id',$id)->delete();
        return redirect()->route('admin#userList')->with(['deleteSuccess' => 'Successful Deleted !']);
    }
    public function deleteAdmin($id){
        $deleteAdmin = User::where('id',$id)->delete();
        return redirect()->route('admin#userList')->with(['deleteSuccess' => 'Successful Deleted']);
    }



}
