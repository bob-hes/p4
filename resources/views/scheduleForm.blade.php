@extends('layouts.app')

@section('content')




<style>
    #schedule {
        margin: auto;
    }
    #schedule * {
        border: 1px black solid;
        text-align: center;
    }
    #schedule .time {
        width: 150px;
        height: 500px;
    }
    .busy {
        color:white;
        background-color: green;
    }
    .exit {
        color:white;
        background-color:red;
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
            <td id="{{ $day }}" class="time {{ (isset($appointments[$day])) ? 'busy' : '' }}">
                {{ isset($appointments[$day]) ? $appointments[$day] : '' }}
            </td>
        @endforeach
    </tr>

    <tr>
        @foreach($daysOfWeek as $day)
            <td id="{{ $day }}X" class="{{ isset($appointments[$day]) ? 'exit' : '' }}">
                @if(isset($appointments[$day]))
                    X
                @endif
            </td>
        @endforeach
    </tr>


</table>

@endsection