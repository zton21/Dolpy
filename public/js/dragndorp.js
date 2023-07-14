function dragEnter(e) {
    e.preventDefault();
    e.currentTarget.classList.add('drag-over');
}

function dragLeave(e) {
    e.preventDefault();
    e.currentTarget.classList.remove('drag-over');
}

function drop(e) {
    e.preventDefault();
    e.currentTarget.classList.remove('drag-over');
    const id = e.originalEvent.dataTransfer.getData('element');
    $('#'+id).detach().appendTo(e.currentTarget);
}

$(() => {
    $('.task_card').each(function() {
        $(this).on('dragstart', function(e) {
            e.originalEvent.dataTransfer.setData('element', e.target.id);
        })
    })
    for (let x of ['todo', 'onprogress', 'done']) {
        $('#'+x).on('dragenter', dragEnter);
        $('#'+x).on('dragover', dragEnter);
        $('#'+x).on('dragleave', dragLeave);
        $('#'+x).on('drop', drop);
        console.log('#'+x)
    }
});