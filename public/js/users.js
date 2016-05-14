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