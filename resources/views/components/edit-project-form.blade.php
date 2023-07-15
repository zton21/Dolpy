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
            <div class="modal-body">
                <form id="edit-project-form">
                    <div class="mb-3">
                        <label for="editProjectTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="editProjectTitle" name="editProjectTitle" required>
                    </div>
                    <div class="mb-3">
                        <label for="editProjectDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editProjectDescription" name="editProjectDescription" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editProjectDueDate" class="form-label">Due Date</label>
                        <input type="date" class="form-control" id="editProjectDueDate" name="editProjectDueDate" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary w-100" id="saveProjectChangesBtn">Save Changes</button>
            </div>
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

        // Save changes when the "Save Changes" button is clicked
        saveProjectChangesBtn.addEventListener('click', function () {
            const projectId = editProjectModal.dataset.projectId;
            const updatedTitle = editProjectTitleInput.value;
            const updatedDescription = editProjectDescriptionTextarea.value;
            const updatedDueDate = editProjectDueDateInput.value;

            // Update the project with the new values
            console.log('Project ID:', projectId);
            console.log('Updated Title:', updatedTitle);
            console.log('Updated Description:', updatedDescription);
            console.log('Updated Due Date:', updatedDueDate);

            // Close the modal
            $('#editProjectModal').modal('hide');
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

            // Set the form values
            editProjectTitleInput.value = projectName;
            editProjectDescriptionTextarea.value = projectDescription;
            editProjectDueDateInput.value = projectDueDate;
        });
    });
</script>
