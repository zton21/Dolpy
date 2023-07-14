$(() => {
    function upload_changes(id, target_id, task) {
        $.post('', {
            'task': task,
            'timeline_id': id,
            'group': target_id,
            'before': before_id,
        });
    }
    function dragEnter(e) { e.preventDefault(); e.currentTarget.classList.add('drag-over');};
    function dragLeave(e) { e.preventDefault(); e.currentTarget.classList.remove('drag-over');};
    function drop(e) {
        e.preventDefault(); e.currentTarget.classList.remove('drag-over'); 
        let x = $(e.target);
        let y = x.parents('.task_card');
        let id = e.originalEvent.dataTransfer.getData('element');
        if (y.attr('class') && !y.is($('#'+id))) {
            $('#'+id).detach().insertBefore(y);
        }
        else if (!y.attr('class')) {
            $('#'+id).detach().appendTo(e.currentTarget);
        }

        // console.log(JSON.stringify(x.attr('id')));
        
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
        // console.log('#'+x)
    }

});