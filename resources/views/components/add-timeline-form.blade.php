<div id="add-timeline-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <div class="d-flex gap-1 align-items-center">
                    <h6 class="modal-title text-secondary me-1">Create New Task</h6>
                    <h5 class="text-secondary">|</h5>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <form id="add-timeline-form" method="POST" action="">
                <input type="hidden" name="task" value="add_timeline">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="timeline-name" class="form-label">Task Title</label>
                        <input type="text" class="form-control" id="timeline-name" name="timeline_name" placeholder="Enter task title" required>
                    </div>
                    <div class="mb-3">
                        <label for="timeline-description" class="form-label">Task Description <span class="text-secondary">(Optional)</span></label>
                        <textarea class="form-control" id="timeline-description" name="timeline_description" placeholder="Enter task description" rows="1"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="timeline-due-date" class="form-label">Due Date</label>
                        <input type="date" class="form-control" id="timeline-due-date" name="timeline_due_date" placeholder="mm/dd/yyyy" required>
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <label for="tag-color" class="form-label">Tag Color</label>
                        <div class="btn-group gap-3" role="group" aria-label="Tag Color">
                            <button type="button" class="btn bg-primary-50 rounded color-btn" value="primary"></button>
                            <button type="button" class="btn bg-success-50 rounded color-btn" value="success"></button>
                            <button type="button" class="btn bg-warning-50 rounded color-btn" value="warning"></button>
                            <button type="button" class="btn bg-Error-50 rounded color-btn" value="Error"></button>
                        </div>
                        <input type="hidden" id="tag-color-input" name="tag_color" value="primary">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="timeline" class="btn btn-primary w-100">Create New Task</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .color-btn {
        height: 1.25em;
    }
    .color-btn.selected {
        border: 1px solid #000;
    }
</style>

<script>
    function openAddTimelineFormModal() {
        var modal = new bootstrap.Modal(document.getElementById('add-timeline-modal'));
        var form = document.getElementById(`add-timeline-form`);
        form.reset();

        const colorButtons = document.querySelectorAll('.color-btn');
        colorButtons.forEach(function(button) {
            button.classList.remove('selected');
        });

        modal.show();
    }

    document.addEventListener('DOMContentLoaded', function() {
        const colorButtons = document.querySelectorAll('.color-btn');

        colorButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Remove 'selected' class from all buttons
                colorButtons.forEach(function(btn) {
                    btn.classList.remove('selected');
                });

                // Add 'selected' class to the clicked button
                this.classList.add('selected');

                // Set the value of the hidden input to the color of the clicked button
                const tagColorInput = document.getElementById('tag-color-input');
                tagColorInput.value = this.value;
            });
        });
    });
</script>