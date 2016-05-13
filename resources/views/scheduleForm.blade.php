@extends('layouts.app')

@section('content')
<style>
    #schedule * {
        border: 1px black solid;
    }
    #schedule td {
        height: 500px;
    }
</style>

<table id="schedule">
    <thead>
        @foreach (['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
            <th> {{ $day }} </th>
        @endforeach
    </thead>

    <tr>
        @foreach(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $dau)
            <td id="{{ $day }}" class="time"></td>
        @endforeach
    </tr>

</table>

<form action="/add-busy-time" method="post">
    {{ csrf_field() }}
    <input type="submit">
</form>

@endsection