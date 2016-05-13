/**
 * Created by bobsaludo on 5/12/16.
 */
$(document).ready(function(){
    $('.time').click(function() {

        $.ajax({
            url: '/add-busy-time',
            type: 'POST',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                
            }
        });

    });
});
