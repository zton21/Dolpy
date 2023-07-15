$(() => {    
    let head = {}, arr = {};
    
    function upload_changes(id, before_id, group, task) {
        $.post('', {
            'task': task,
            'id': id,
            'group': group,
            'before': before_id,
        });
    }
    
    function dragEnter(e) { e.preventDefault(); e.currentTarget.classList.add('drag-over');};
    function dragLeave(e) { e.preventDefault(); e.currentTarget.classList.remove('drag-over');};
    function drop(e) {
        e.preventDefault(); e.currentTarget.classList.remove('drag-over'); 
        let group = $(e.currentTarget).attr('id');
        let y = $(e.target).parents('.task_card');
        let id = e.originalEvent.dataTransfer.getData('element');
        let x = $('#'+id);
        if (y.attr('class') && !y.is(x)) {
            if (y.prevAll().is(x)) x.detach().insertAfter(y);
            else x.detach().insertBefore(y);
        }
        else if (!y.attr('class')) x.detach().appendTo(e.currentTarget);
        else return;

        setTimeout(function() {
            let c = x.prev();
            upload_changes(id, (c.length ? c.attr('id') : head[group]), group, 'modify');
        }, 0);


        // console.log(JSON.stringify(x.attr('id')));
        
        // upload_changes(id, $(e.currentTarget).attr('id'), 'modify');
    }

    // Drag n drop : connect event
    // $('.task_card').each()
    for (let x of ['todo', 'onprogress', 'done']) {
        $('#'+x).on('dragenter', dragEnter);
        $('#'+x).on('dragover', dragEnter);
        $('#'+x).on('dragleave', dragLeave);
        $('#'+x).on('drop', drop);
        // console.log('#'+x)
    }

    var template = $(".task_card");
    template.detach();
    template.removeClass('d-none')
    // console.log(template.html());
    
    function createTask(data) {
        // console.log(JSON.stringify(data));
        let x = template.clone();
        x.attr('id', data.id);
        x.find('.task_title').text(data.timelineTitle);
        x.find('.task_desc').text(data.timelineDesc);
        x.find('.task_progress').text(data.completedTask + '/' + data.n_task);
        x.find('.task_duedate').text('end at 10/2/2023'); // not implemented
        // console.log(x.html());
        return x;
    }

    // Request data dulu
    $.get('', {
        'task': 'get_tasks',
    }).done(function (data) {
        // Cari kepala
        console.log(JSON.stringify(data));
        data.forEach(function(item) {
            // console.log(item);
            arr[item.id] = item;
            if (item.type === 'head') head[item.group] = item.id;
        });
        // console.log('head:', JSON.stringify(head))
        // console.log('arr:', JSON.stringify(arr))
        for (let x of ['todo', 'onprogress', 'done']) {
            curr = head[x];
            while (arr[curr].next != -1) {
                curr = arr[curr].next;
                // append item
                let card = createTask(arr[curr])
                card.appendTo($('#'+x));
                card.on('dragstart', function(e) {e.originalEvent.dataTransfer.setData('element', e.target.id);})
            }
        }
        // catet id location ke dict
        


    });
    

});