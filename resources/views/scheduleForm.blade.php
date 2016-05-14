@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="css/schedule.css" />
<script src="js/schedule.js"></script>
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