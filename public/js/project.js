$(window).on('load', () => {
    let topic_id = $('.active1').attr('id')
    // alert(topic_id);
    topic_id = topic_id.substring(1);

    // Append Message
    // {"data":{"comment":{"chatContent":"test","chatDate":"2023-07-05 02-08-36"},"project_id":"23","sender":{"firstName":"Admin","id":1}}}
    
    function append_data(data) {
        let own = data.id == user_id;
        let div = (c) => {return $("<div>", {class: c})}
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
    
    for (let x of data) {
        append_data(x);
    }

    // Recieve Message
    const pusher_recieve_message = function(data) {
        // alert(JSON.stringify(data));
        let id = data.comment.topic_id;
        // console.log(id);
        console.log(id, topic_id, "hehe");
        if (id == topic_id) {
            let x = {
                'firstName': data.sender.firstName,
                'chatDate': data.comment.chatDate,
                'chatContent': data.comment.chatContent,
                'id': data.sender.id,
            }
            append_data(x);
        }
        else {
            let notifcount = $('#t'+id+' .notification');
            let x = parseInt(notifcount.text());
            if (isNaN(x)) x = 0;
            notifcount.text(x+1);
        }
        $('#t'+id+' .chatcontent').text(data.comment.chatContent);
    }
    
    // Pusher
    Pusher.logToConsole = true;
// {"comment":{"chatContent":"Test","chatDate":"2023-07-08 00-59-08","topic_id":"101"},"project_id":"21","sender":{"firstName":"Admin","id":1}}
    var pusher = new Pusher('35ca343f2d20964f7bfb', {
        cluster: 'ap1',
        forceTLS: true,
        encrypted: true,
        channelAuthorization: { 
            endpoint: "/pusher/auth/"+project_id,
            headers: { "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content'), 'topic_id': topic_id },
        },
        // auth: {
        //     params: {
        //         CSRFToken: $('meta[name="csrf-token"]').attr('content'),
        //     }
        // }
    });

    var channel = pusher.subscribe(`private-project.${project_id}`);
    channel.bind('send-message', pusher_recieve_message);

    // Custom Send Message
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

});