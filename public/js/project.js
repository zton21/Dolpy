$(document).ready(() => {
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
    
    function append_data2(data) {
        let own = data.sender.id == user_id;
        let div = (c) => {return $("<div>", {class: c})}
        let x = [
            div('col-11').append([
                div('d-flex gap-2 flex-row' + (own?'-reverse':'')).append([
                    div('').text(data.sender.firstName),
                    div('fs-7 text-secondary').text(data.comment.chatDate),
                ]),
                div('d-flex flex-row' + (own?'-reverse':'')).append(
                    div('p-2 rounded shadow d-inline-flex text-break'+(own?' bg-custom':'')).text(data.comment.chatContent)
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
        // alert(data);
        // alert(JSON.stringify(data));
        x = {
            'firstName': data.data.sender.firstName,
            'chatDate': data.data.comment.chatDate,
            'chatContent': data.data.comment.chatContent,
            'id': data.data.sender.id,
        }
        append_data(x);
    }
    
    // Pusher
    Pusher.logToConsole = true;

    var pusher = new Pusher('35ca343f2d20964f7bfb', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe(`project.${project_id}`);
    channel.bind('new-message', pusher_recieve_message);

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