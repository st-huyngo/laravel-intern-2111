@extends("admin.partials.app")
@section('content')
<span>ID:</span>
<p>{{$user->id}}</p>
<span>Name:</span>
<p>{{$user->name}}</p>
<span>Email:</span>
<p>{{$user->email}}</p>
<table style="width:100%;border:1px solid black;">
    <tr>
        <th style="border:1px solid black;">Id</th>
        <th style="border:1px solid black;">Title</th>
        <th style="border:1px solid black;">Description</th>
    </tr>
    @foreach($tasks as $task)
    <tr>
        <td style="border:1px solid black;">{{$task->id}}</td>
        <td style="border:1px solid black;">{{$task->title}}</td>
        <td style="border:1px solid black;">{{$task->description}}</td>
    </tr>
    @endforeach
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
</table>
@endsection