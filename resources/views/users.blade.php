@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="css/users.css" />
    <script src="js/users.js"></script>
    <table id="users">
        @foreach($users as $id => $name)
            <tr>
                <td class="name">
                    {{$name}}
                </td>

                @if(in_array($id, $friends))
                    <td id="{{$id}}" class="remove aux">Remove friend</td>
                @else
                    <td id="{{$id}}" class="aux">Add friend</td>
                @endif
            </tr>
        @endforeach
    </table>

@endsection