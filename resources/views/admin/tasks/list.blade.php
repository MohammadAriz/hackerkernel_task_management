@extends('admin.layouts.master')
@section('main-content')
   
    <div id="page-wrapper">
        <a href="{{url('/create-task')}}"><button class="btn btn-primary">Add New Task</button></a>
        <a href="{{url('/export-task')}}"><button class="btn btn-primary">Export Tasks</button></a>
        <table class="table">
           
            <thead>

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">USER EMAIL</th>
                    <th scope="col">TASK DETAIL</th>
                    <th scope="col">TASK STATUS</th>
                    <th scope="col">ACTION</th>

                   
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;

                @endphp

                @foreach ($tasks as $task)
                @php
                $user=App\Models\User::find($task->user_id);
                @endphp
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>
                            @if($user)
                            {{ $user->name }}
                            @else
                            <p>No User</p>
                            @endif
                        </td>
                        <td>
                            @if($user)
                            {{ $user->email}}
                            @else
                            <p>No Email</p>
                        @endif
                        </td>
                        <td>{{ $task->task_detail }}</td>
                        <td>{{ $task->task_type }}</td>
                        <td>
                            <a href="{{url('/edit-task')}}/{{$task->id}}"><i class="fa fa-edit" style="font-size:24px"></i></a>
                            <a href="{{url('/delete-task')}}/{{$task->id}}"><i class="fa fa-trash-o" style="font-size:24px;color:red"></i></a>
                        </td>


                       

                    </tr>
                    @endforeach

            </tbody>
        </table>
        {{ $tasks->links('pagination::bootstrap-4') }}
    </div>
    {{-- </div> --}}
@endsection
