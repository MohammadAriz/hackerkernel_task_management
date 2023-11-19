<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Exports\ExportTasks;
use Maatwebsite\Excel\Facades\Excel;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::paginate(10);
        return view('admin.tasks.list',compact('tasks'));
    }
    public function create()
    {
        return view('admin.tasks.add_form');
    }
    public function store(Request $request){
        $store= new Task;
        $store->task_detail=$request->detail;
        $store->task_type=$request->type;
        $store->user_id=$request->user_id;
        $store->save();
        return redirect()->back();
    }
    public function update(Request $request, $id){
        $update = Task::find($id);
        $update->task_detail=$request->detail;
        $update->task_type=$request->type;
        $update->user_id=$request->user_id;
        $update->save();
        return redirect('/tasks');
    }
    public function edit($id)
{
    $edit = task::find($id);
    return view('admin.tasks.update', compact('edit'));
}
public function export_task() 
{
    if(Task::all()->count() > 0){
    return Excel::download(new ExportTasks, 'tasks.xlsx');
    }else{
        return redirect()->back();
    }
}    
public function delete($id){
    $delete = Task::find($id);
    $delete->delete();
    return redirect()->back();
}

}
