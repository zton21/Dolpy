$(() => {
    // To Backend
    // const LAZY_TIMEOUT = 5000;
    
    // var state = false;
    // var to_upload = [];
    // const upload_changes = function() {
    //     state = false;
    //     $.post('', {
    //         'task': 'read',
    //         'topic_id': topic_id,
    //     });
    // }

    // Accumulate Event
    // const fire_event = function(data) {

    //     if (state === false) state = setTimeout(upload_changes, LAZY_TIMEOUT);
    //     else {
    //         clearTimeout(state); 
    //         state = setTimeout(upload_changes, LAZY_TIMEOUT)
    //     }
    // }

    // Rush send
    // -- 

    // Drag n drop - event handler

    function upload_changes(id, target_id, task) {
        $.post('', {
            'task': task,
            'timeline_id': id,
            'group': target_id,
            'after': after_id,
            'before': before_id,
            
        });
    }

    function dragEnter(e) { e.preventDefault(); e.currentTarget.classList.add('drag-over');};
    function dragLeave(e) { e.preventDefault(); e.currentTarget.classList.remove('drag-over');};
    function drop(e) {
        e.preventDefault(); e.currentTarget.classList.remove('drag-over'); 
        let x = $(e.target).parent('task-card');
        let id = e.originalEvent.dataTransfer.getData('element');
        
        $('#'+id).detach().appendTo(e.currentTarget);
        upload_changes(id, $(e.currentTarget).attr('id'), 'modify');
    }

    // Drag n drop : connect event
    $('.task_card').each(function() {
        $(this).on('dragstart', function(e) {e.originalEvent.dataTransfer.setData('element', e.target.id);})
    })
    for (let x of ['todo', 'onprogress', 'done']) {
        $('#'+x).on('dragenter', dragEnter);
        $('#'+x).on('dragover', dragEnter);
        $('#'+x).on('dragleave', dragLeave);
        $('#'+x).on('drop', drop);
        console.log('#'+x)
    }

});