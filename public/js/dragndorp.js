/* draggable element */
let items = document.querySelectorAll('.task_card');

items.forEach(item => {
    item.addEventListener('dragstart', dragStart);
});

const toDo =  document.getElementById('todo');
toDo.addEventListener('dragenter', dragEnter)
toDo.addEventListener('dragover', dragOver);
toDo.addEventListener('dragleave', dragLeave);
toDo.addEventListener('drop', drop);

const onProgress = document.getElementById("onprogress")
onProgress.addEventListener('dragenter', dragEnter)
onProgress.addEventListener('dragover', dragOver);
onProgress.addEventListener('dragleave', dragLeave);
onProgress.addEventListener('drop', drop);

const done = document.getElementById("done")
done.addEventListener('dragenter', dragEnter)
done.addEventListener('dragover', dragOver);
done.addEventListener('dragleave', dragLeave);
done.addEventListener('drop', drop);

function dragStart(e) {
    e.dataTransfer.setData('element', e.target.id);
    setTimeout(() => {
        console.log('hide');
        // e.target.classList.add('hide');
    }, 0);
}

function dragEnter(e) {
    e.preventDefault();
    e.currentTarget.classList.add('drag-over');
}

function dragOver(e) {
    e.preventDefault();
    e.currentTarget.classList.add('drag-over');
}

function dragLeave(e) {
    e.preventDefault();
    e.currentTarget.classList.remove('drag-over');
}

function drop(e) {
    console.log(3);
    const id = e.dataTransfer.getData('element');
    const draggable = document.getElementById(id);

    e.currentTarget.classList.remove('drag-over');       
    e.currentTarget.appendChild(draggable);
}