@extends('admin.partials.app')

@section('content')
<h1>Tasks</h1>
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
    <tr>
        <td style="border:1px solid black;">{{$task['title']}}</td>
        <td style="border:1px solid black;">{{$task['description']}}</td>
        <td style="border:1px solid black;">{{$task['type']}}</td>
        <td style="border:1px solid black;">{{$task['status']}}</td>
        <td style="border:1px solid black;">{{$task['start_date']}}</td>
        <td style="border:1px solid black;">{{$task['due_date']}}</td>
        <td style="border:1px solid black;">{{$task['assignee']}}</td>
        <td style="border:1px solid black;">{{$task['estimate']}}</td>
        <td style="border:1px solid black;">{{$task['actual']}}</td>
        <td style="border:1px solid black; display:flex;justify-content: space-evenly;">
            <a href="{{route('tasks.edit',['task' => $key])}}"
                style="background-color: #4CAF50;border: none;color: white;padding: 10px 20px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">Edit</a>
            <form action="{{route('tasks.destroy',['task' => $key])}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit"
                    style="background-color: #4CAF50;border: none;color: white;padding: 10px 20px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">Delete</button>
            </form>
        </td>
    </tr>
</table>
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
@endsection