<div id="create-project-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <div class="d-flex gap-1 align-items-center">
                    <h6 class="modal-title text-secondary me-1">Create New Project</h6>
                    <h5 class="text-secondary">|</h5>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <form id="create-project-form" method="POST" action="">
                <input type="hidden" name="task" value="create_project"/>
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="project-name" class="form-label">Project Title</label>
                        <input type="text" class="form-control" id="project-name" name="project_name" placeholder="Enter project title" required>
                    </div>
                    <div class="mb-3">
                        <label for="project-description" class="form-label">Project Description <span class="text-secondary">(Optional)</span></label>
                        <textarea class="form-control" id="project-description" name="project_description" placeholder="Enter project description" rows="1"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="due-date" class="form-label">Due Date</label>
                        <input type="date" class="form-control" id="due-date" name="due_date" placeholder="Enter end date of the project" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">Create New Project</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openCreateProjectFormModal() {
        var modal = new bootstrap.Modal(document.getElementById('create-project-modal'));
        var form = document.getElementById(`create-project-form`);
        form.reset();
        modal.show();
    }
</script>