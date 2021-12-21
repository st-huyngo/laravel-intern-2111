@extends('admin.partials.app')

@section('content')
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Update Task</h1>
                            </div>
                            <form class="user" action="{{route('tasks.update',['task'=>$task->id])}}" method="POST">
                                @method('PUT')
                                @csrf
                                @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control form-control-user"
                                        id="exampleInputEmail" aria-describedby="emailHelp" value="{{$task->title}}">
                                </div>
                                @error('title')
                                <span>{{$message}}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="title">description</label>
                                    <input type="text" name="description" class="form-control form-control-user"
                                        id="exampleInputPassword" value="{{$task->description}}">
                                </div>
                                @error('description')
                                <span>{{$message}}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="title">type</label>
                                    <input type="text" name="type" class="form-control form-control-user"
                                        id="exampleInputEmail" aria-describedby="emailHelp" value="{{$task->type}}">
                                </div>
                                @error('type')
                                <span>{{$message}}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="title">status</label>
                                    <input type="text" name="status" class="form-control form-control-user"
                                        id="exampleInputEmail" aria-describedby="emailHelp" value="{{$task->status}}">
                                </div>
                                @error('status')
                                <span>{{$message}}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="title">start_date</label>
                                    <input type="text" name="start_date" class="form-control form-control-user"
                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                        value="{{$task->start_date}}">
                                </div>
                                @error('start_date')
                                <span>{{$message}}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="title">due_date</label>
                                    <input type="text" name="due_date" class="form-control form-control-user"
                                        id="exampleInputEmail" aria-describedby="emailHelp" value="{{$task->due_date}}">
                                </div>
                                @error('due_date')
                                <span>{{$message}}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="title">assignee</label>
                                    <input type="text" name="assignee" class="form-control form-control-user"
                                        id="exampleInputEmail" aria-describedby="emailHelp" value="{{$task->assignee}}">
                                </div>
                                @error('assignee')
                                <span>{{$message}}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="title">estimate</label>
                                    <input type="text" name="estimate" class="form-control form-control-user"
                                        id="exampleInputEmail" aria-describedby="emailHelp" value="{{$task->estimate}}"
                                        placeholder="Enter estimate...">
                                </div>
                                @error('estimate')
                                <span>{{$message}}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="title">actual</label>
                                    <input type="text" name="actual" class="form-control form-control-user"
                                        id="exampleInputEmail" aria-describedby="emailHelp" value="{{$task->actual}}">
                                </div>
                                @error('actual')
                                <span>{{$message}}</span>
                                @enderror
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Update
                                </button>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection