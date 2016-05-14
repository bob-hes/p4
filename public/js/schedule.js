/**
 * Created by bobsaludo on 5/12/16.
 */
$(document).ready(function(){
    $('.time').click(function() {

        var reason = prompt("Why are you busy for this day?");
        if (reason == "" || reason == null) {
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
                $('#'+day).html(reason).addClass('busy');
                $('#'+day+'X').html('X').addClass('exit');
            }
        });

    });

    $('.exit').click(function() {
        var day = this.id.substring(0, this.id.length - 1);
        dataToSend = {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'day': day
        }

        $.ajax({
            url: '/remove-busy-time',
            type: 'POST',
            data: dataToSend,
            success: function(response) {
                console.log($('#'+day));
                $('#'+day+'.time').html('').removeClass('busy');
                $('#'+day+'X').html('').removeClass('exit');
            }
        });

    });
});
