<div id="task-note-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <div class="d-flex gap-1 align-items-center">
                    <h6 class="modal-title text-secondary me-1" id="modal-title"></h6>
                    <h5 class="text-secondary">|</h5>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <form id="task-note-form" method="POST" action="">
                @csrf
                <input type="hidden" name="task" id="task-note-input" value="">
                <input type="hidden" name="project_id" id="timeline-id-input" value="">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" id="note-title" name="note_title" placeholder="Enter your note title..." required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="note-description" name="note_description" placeholder="Enter your note description..." rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn w-100 btn-primary" id="task-note-btn"></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const taskNoteModal = document.getElementById('task-note-modal');
        const taskNoteHeader = document.getElementById('modal-title');

        const taskNoteTitle = document.getElementById('note-title');
        const taskNoteDescription = document.getElementById('note-description');

        const taskNoteBtn = document.getElementById('task-note-btn');

        const taskNoteForm = document.getElementById('task-note-form');

        const taskNoteInput = document.getElementById('task-note-input');
        const timelineIDInput = document.getElementById('timeline-id-input');

        taskNoteBtn.addEventListener('click', function () {
            taskNoteInput.value = taskNoteModal.dataset.action;
            timelineIDInput.value = taskNoteModal.dataset.timelineId;
            taskNoteForm.submit();
            $('#task-note-modal').modal('hide');
        });

        taskNoteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const action = button.dataset.action;
            const noteTitle = button.dataset.noteTitle;
            const noteDescription = button.dataset.noteDescription;
            const timelineId = button.dataset.timelineId;

            taskNoteModal.dataset.action = action;
            taskNoteModal.dataset.noteTitle = noteTitle;
            taskNoteModal.dataset.noteDescription = noteDescription;
            taskNoteModal.dataset.timelineId = timelineId;
        
            switch (action) {
                case 'create':
                    taskNoteHeader.textContent = 'Create New Task Note';
                    taskNoteBtn.textContent = 'Create New Note';
                    break;
                case 'update':
                    taskNoteHeader.textContent = 'Update Task Note';
                    taskNoteTitle.textContent = noteTitle;
                    taskNoteDescription.textContent = noteDescription;
                    taskNoteBtn.textContent = 'Update Note';
                    break;
            }
        });
    });
</script>

