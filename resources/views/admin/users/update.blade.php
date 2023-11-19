@extends('admin.layouts.master')
@section('main-content')
    <div id="page-wrapper">
        <div id="page-inner">
            {{-- <div class="row"> --}}

            <h1 class="text-center">Update User Form</h1>
            <form action="{{ url('/update') }}/{{ $edit->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="enter your name" value="{{$edit->name}}">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="" class="form-control" placeholder="enter your email" value="{{$edit->email}}">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Mobile Number</label>
                    <input type="text" name="mobile" id="" class="form-control"
                        placeholder="enter your mobile number" value="{{$edit->mobile}}">
                        @error('mobile')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
                
                <button class="btn btn-primary" style="margin-left:30vw " type="submit">UPDATE</button>
                
            </form>
        </div>
    </div>
    @endsection

              







           
    
