@extends("admin.partials.app")
@section('content')
<div style="display:flex; justify-content:space-between">
    <h1>Tasks</h1>
    <form action="{{route('tasks.find.task')}}" method="POST">
        @csrf
        <input type="text" name='type' placeholder="Enter type ... ">
        <button type="submit"
            style="background-color: #4CAF50;border: none;color: white;padding: 10px 20px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">Search</button>
    </form>
</div>
<table style="width:100%;border:1px solid black;">
    <tr>
        <th style="border:1px solid black;">title</th>
        <th style="border:1px solid black;">description</th>
        <th style="border:1px solid black;">type</th>
        <th style="border:1px solid black;">status</th>
        <th style="border:1px solid black;">start_date</th>
        <th style="border:1px solid black;">due_date</th>
        <th style="border:1px solid black;">assignee</th>
        <th style="border:1px solid black;">estimate</th>
        <th style="border:1px solid black;">actual</th>
        <th style="border:1px solid black;">action</th>
    </tr>
    @foreach($tasks as $task)
    <tr>
        <td style="border:1px solid black;">{{$task->title}}</td>
        <td style="border:1px solid black;">{{$task->description}}</td>
        <td style="border:1px solid black;">{{$task->type}}</td>
        <td style="border:1px solid black;">{{$task->status}}</td>
        <td style="border:1px solid black;">{{$task->start_date}}</td>
        <td style="border:1px solid black;">{{$task->due_date}}</td>
        <td style="border:1px solid black;">{{$task->assignee}}</td>
        <td style="border:1px solid black;">{{$task->estimate}}</td>
        <td style="border:1px solid black;">{{$task->actual}}</td>
        <td style="border:1px solid black; display:flex;justify-content: space-evenly;">
            <a href="{{route('tasks.show', ['task' => $task->id])}}"
                style="background-color: #4CAF50;border: none;color: white;padding: 10px 20px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">Show</a>
            <a href="{{route('tasks.edit', ['task' => $task->id])}}"
                style="background-color: #4CAF50;border: none;color: white;padding: 10px 20px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">Edit</a>
            <form action="{{route('tasks.destroy', ['task' => $task->id])}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit"
                    style="background-color: #4CAF50;border: none;color: white;padding: 10px 20px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
</table>
<br>
<br>
<a href="{{route('tasks.create')}}"
    style="background-color: #4CAF50;border: none;color: white;padding: 10px 20px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">Create
    Task</a>
@endsection