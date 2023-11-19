@extends('admin.layouts.master')
@section('main-content')
    <div id="page-wrapper">
        <div id="page-inner">
            {{-- <div class="row"> --}}

            <h1 class="text-center">Tasks</h1>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @php
                    $users=App\Models\User::all();
                @endphp
                <div class="form-group">
                    <label for="">Select User</label>
                    <select name="user_id" id="" class="form-control">
                        <option value="">selected</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Task Details</label>
                    <input type="text" name="detail" id="" class="form-control" placeholder="enter task">
                </div>
                <div class="form-group">
                    <label for="">Task Type</label>
                    <select name="type" id="" class="form-control">
                        <option value="pending">Pending</option>
                        <option value="done">Done</option>
                    </select>
                </div>
                
                
                <button class="btn btn-primary" style="margin-left:30vw " type="submit">SUBMIT</button>
                
            </form>
        </div>
    </div>
    @endsection

              







           
    
