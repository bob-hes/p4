@extends('layouts.app')

@section('content')




<style>
    #schedule {
        margin: auto;
    }
    #schedule * {
        border: 1px black solid;
    }
    #schedule .time {
        width: 150px;
        height: 500px;
    }
</style>

<table id="schedule">
    <thead>
        @foreach ($daysOfWeek as $day)
            <th> {{ $day }} </th>
        @endforeach
    </thead>

    <tr>
        @foreach($daysOfWeek as $day)
            <td id="{{ $day }}" class="time"></td>
        @endforeach
    </tr>

    <tr>
        @foreach($daysOfWeek as $day)
            <td>
                @if(in_array($day, $appointments))
                    {{ 5 }}
                @endif
            </td>
        @endforeach
    </tr>


</table>

@endsection