@extends('admin.layouts.master')
@section('main-content')
    {{-- <div id="page-inner"> --}}
    <div id="page-wrapper">
        
        <a href="{{url('/create')}}"><button class="btn btn-primary">Add New User</button></a>
        <a href="{{url('/export-user')}}"><button class="btn btn-primary">Export Users</button></a>
        
        <table class="table">
           
            <thead>

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">MOBILE NUMBER</th>
                    <th scope="col">ACTION</th>

                   
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp

                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td>
                            <a href="{{url('/edit')}}/{{$user->id}}"><i class="fa fa-edit" style="font-size:24px"></i></a>
                            <a href="{{url('/delete')}}/{{$user->id}}"><i class="fa fa-trash-o" style="font-size:24px;color:red"></i></a>
                        </td>


                       

                    </tr>
                    @endforeach

            </tbody>
        </table>
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
    {{-- </div> --}}
@endsection
