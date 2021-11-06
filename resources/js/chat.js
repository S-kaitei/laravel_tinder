$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.messageInputForm_input').keypress(function (event) {
        if(event.which === 13){
            event.preventDefault();
            $.ajax({
                url: '/chat/chat',
                data: {
                    chat_room_id: chat_room_id,
                    user_id: user_id,
                    message: $('.messageInputForm_input').val(),
                },
                method: "POST"
            })
            .done(function(data){
                if(data.user_id == user_id){
                    $('.messages').append(
                        '<div class="message"><span>' + current_user_name +
                        ':</span><div class="commonMessage"><div>' +
                        data.message + '</div></div></div>'
                    );
                }else{
                    $('.messages').append(
                        '<div class="message"><span>' + chat_room_user_name +
                        ':</span><div class="commonMessage"><div>' +
                        data.message + '</div></div></div>'
                    );
                }
                event.target.value = '';
            });
        }
    });
});
