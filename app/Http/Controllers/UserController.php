<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Exports\ExportUsers;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function dashboard(){
        return view('index');
    }

    public function index(){
        $users = User::paginate(10);
        return view('admin.users.list',compact('users'));
    }
    public function create()
{
    return view('admin.users.add_form');
}
public function store(Request $request){
    $request->validate([
        'name'=> 'required',
        'email' => 'required|email|unique:users',
        'mobile'=> 'required',
    ]);
    $store= new user;
    $store->name=$request->name;
    $store->email=$request->email;
    $store->mobile=$request->mobile;
    $store->save();
    return redirect('/users');
}
public function edit($id)
{
    $edit = user::find($id);
    return view('admin.users.update', compact('edit'));
}
public function update(Request $request, $id){
    $request->validate([
        'name'=> 'required',
        'email'=> 'required|email',
        'mobile'=> 'required',
    ]);
    $edit = user::find($id);
    $edit->name=$request->name;
    $edit->email=$request->email;
    $edit->mobile=$request->mobile;
    $edit->save();
    return redirect('/users');
}
public function export_user() 
{
    if(User::all()->count() > 0){

        return Excel::download(new ExportUsers, 'users.xlsx');
    }else{
        return redirect()->back();
    }
}   
public function delete($id){
    $delete = User::find($id);
    $delete->delete();
    Task::where('user_id', $id)->delete();
    return redirect()->back();
}
}
