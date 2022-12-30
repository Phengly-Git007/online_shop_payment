<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user_admin = User::where('role','1')->count();
        $user_register = User::where('role','0')->count();
        $categories = Category::all()->count();
        $products = Product::all()->count();
        return view('admin.dashboard',[
            'user_admin' => $user_admin,
            'user_register' => $user_register,
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function users(){
        $users = User::all();
       return view('admin.user.index',['users' => $users]);
    }

    public function viewUser($id){
        $users = User::find($id);
        return view('admin.user.view',['users' =>$users ]);
    }
}
