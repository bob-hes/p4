/**
 * Created by bobsaludo on 5/12/16.
 */
$(document).ready(function(){
    $('.time').click(function() {

        var reason = prompt("Why are you busy for this day?");
        if (reason == "") {
           return;
        }

        var day = this.id,
            url = $(this).hasClass('busy') ? 'edit-busy-time' : 'add-busy-time',
            dataToSend = {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'day': day,
                'reason': reason
            };



        $.ajax({
            url: url,
            type: 'POST',
            data: dataToSend,
            success: function(response) {
                console.log(response);
            }
        });

    });
});
