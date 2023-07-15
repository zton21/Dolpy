<div id="edit-project-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <div class="d-flex gap-1 align-items-center">
                    <h6 class="modal-title text-secondary me-1">Edit Project</h6>
                    <h5 class="text-secondary">|</h5>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <form id="edit-project-form" method="POST" action="">
                @csrf
                @method('POST')
                <input type="hidden" name="task" id="project-action-input" value="">
                <input type="hidden" name="project_id" id="project-id-input" value="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editProjectTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="editProjectTitle" name="editProjectTitle" required>
                    </div>
                    <div class="mb-3">
                        <label for="editProjectDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editProjectDescription" name="editProjectDescription" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editProjectDueDate" class="form-label">Due Date</label>
                        <input type="date" class="form-control" id="editProjectDueDate" name="editProjectDueDate" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100" id="saveProjectChangesBtn">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editProjectModal = document.getElementById('edit-project-modal');
        const editProjectForm = document.getElementById('edit-project-form');
        const editProjectTitleInput = document.getElementById('editProjectTitle');
        const editProjectDescriptionTextarea = document.getElementById('editProjectDescription');
        const editProjectDueDateInput = document.getElementById('editProjectDueDate');
        const saveProjectChangesBtn = document.getElementById('saveProjectChangesBtn');
        const projectActionInput = document.getElementById('project-action-input');
        const projectIDInput = document.getElementById('project-id-input');

        // Save changes when the "Save Changes" button is clicked
        saveProjectChangesBtn.addEventListener('click', function () {
            // Set the action and project name in the form
            projectActionInput.value = editProjectModal.dataset.action;
            projectIDInput.value = editProjectModal.dataset.projectId;

            // Submit the form
            editProjectForm.submit();

            // Close the modal
            $('#edit-project-modal').modal('hide');
        });

        // Set the form values and data attribute when opening the modal
        editProjectModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Button that triggered the modal
            const action = button.dataset.action; // Get the action from the button data attribute
            const projectId = button.dataset.projectId; // Get the project ID from the button data attribute
            const projectName = button.dataset.projectName; // Get the project name from the button data attribute
            const projectDescription = button.dataset.projectDescription; // Get the project description from the button data attribute
            const projectDueDate = button.dataset.projectDueDate; // Get the project due date from the button data attribute

            editProjectModal.dataset.action = action; // Set the data attribute
            editProjectModal.dataset.projectId = projectId;

            // Set the form values
            editProjectTitleInput.value = projectName;
            editProjectDescriptionTextarea.value = projectDescription;
            editProjectDueDateInput.value = projectDueDate;
        });
    });
</script>
