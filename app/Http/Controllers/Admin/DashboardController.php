<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard');
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
