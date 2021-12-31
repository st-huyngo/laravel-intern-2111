@extends("admin.partials.app")
@section('content')
<table style="width:100%;border:1px solid black;">
    <tr>
        <th style="border:1px solid black;">Name</th>
        <th style="border:1px solid black;">Email</th>
        <th style="border:1px solid black;">Action</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td style="border:1px solid black;">{{$user->name}}</td>
        <td style="border:1px solid black;">{{$user->email}}</td>
        <td style="border:1px solid black; display:flex;justify-content: space-evenly;">
            <a href="{{route('users.show',['user' => $user->id])}}"
                style="background-color: #4CAF50;border: none;color: white;padding: 10px 20px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">Show</a>
        </td>
    </tr>
    @endforeach
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
</table>
@endsection