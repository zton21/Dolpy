$(() => {
    let x = $('.form-check-input');
    x.on('change', function(e) {
        // $console.log(x.attr('id'));
        let y = $(this), z = y.parent().parent().parent();
        if (y.is(':checked')) z.addClass('bg-success-5');
        else z.removeClass('bg-success-5');

        $.post('', {
            'note_id' : y.attr('id'),
            'completed' : y.is(':checked'),
            'task': 'complete-note',
        })
    });
});