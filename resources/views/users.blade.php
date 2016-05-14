@extends('layouts.app')

@section('content')

    {{--<link rel="stylesheet" href="css/users.css" />--}}
    {{--<script src="js/users.js"></script>--}}
    <style>
        #users {
            margin: auto;
        }
        #users * {
            border: 1px black solid;
            text-align: center;
            font-size: 20px;
        }
        .name {
            width: 400px;
            height: 100px;
        }
        .aux {
            width: 200px;
            color: white;
            background-color: green;
        }
        .aux.remove {
            background-color: red;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('.aux').click(function() {

                var $button = $(this),
                        url = $button.hasClass('remove') ? '/remove-friend' : '/add-friend',
                    dataToSend = {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'id': this.id
                    };


                $.ajax({
                    url: url,
                    type: 'POST',
                    data: dataToSend,
                    success: function(response) {
                        if(url == '/remove-friend') {
                            $button.removeClass("remove")
                                    .html('Add Friend');
                        }
                        else {
                            $button.addClass("remove")
                                    .html('Remove Friend');
                        }

                    }
                });
            });
        });
    </script>


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