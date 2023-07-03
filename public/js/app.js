$(document).ready(() => {
    let div = (c) => {return $("<div>", {class: c})}

    function append_data(data) {
        let own = data.own;
        let x = [
            div('col-11').append([
                div('d-flex gap-2 flex-row' + (own?'-reverse':'')).append([
                    div('').text(data.firstName),
                    div('fs-7 text-secondary').text(data.chatDate),
                ]),
                div('d-flex flex-row' + (own?'-reverse':'')).append(
                    div('p-2 rounded shadow d-inline-flex text-break'+(own?' bg-custom':'')).text(data.chatContent)
                )
            ]),
            div('col-1').append($("<img>", {class: "img-fluid rounded-circle", alt:"Profile Picture", src:"/img/profilePicture.png"}))
        ];
        if (!own) x.reverse();        
        $('.chatbox').append(div("row px-4 py-2").append(x));
    }

    function request_update_messages() {
        let post = $.post('/request_messages', {
            'topic_id': topic_id,
            'last_comment_id': last_comment_id,
        })   
        post.done(function(data) {
            for(let x of data) {
                append_data(x);
            }
        });
    }

    var refresh = function() {
        let post = $.post('/check_for_update', {
            'topic_id': topic_id,
        });
        post.done(function(data) {
            if (data != last_comment_id) {
                request_update_messages();
                last_comment_id = data;
            }
        });
    }

    $('#chat').on('submit', function(e) {
        e.preventDefault();
        let $form = $(this);
        url = $form.attr('action');

        let post = $.post(url, {
            'task': 'send_message',
            'topic_id': $form.find('input[name="topic_id"').val(),
            'comment': $form.find('input[name="comment"').val()
        });
        $('#comment').val('');
        post.done(function(data) {
            // Ok
        })
    })
    setInterval(refresh, 1000);
});