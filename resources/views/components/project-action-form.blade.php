<div id="project-action-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <div class="d-flex gap-1 align-items-center">
                    <h6 class="modal-title text-secondary me-1" id="modal-title"></h6>
                    <h5 class="text-secondary">|</h5>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <p id="project-action-text" class="text-center fs-5"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn w-100" id="confirm-project-action-btn"></button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const projectActionModal = document.getElementById('project-action-modal');
        const projectActionHeader = document.getElementById('modal-title');
        const projectActionText = document.getElementById('project-action-text');
        const confirmProjectActionBtn = document.getElementById('confirm-project-action-btn');

        confirmProjectActionBtn.addEventListener('click', function () {
            // Perform the selected project action
            const action = projectActionModal.dataset.action;
            const projectName = projectActionModal.dataset.projectName;

            switch (action) {
                case 'delete':
                    // Perform delete project action
                    console.log('Delete project:', projectName);
                    break;
                case 'complete':
                    // Perform complete project action
                    console.log('Complete project:', projectName);
                    break;
                case 'leave':
                    // Perform leave project action
                    console.log('Leave project:', projectName);
                    break;
            }

            // Close the modal
            $('#project-action-modal').modal('hide');
        });

        // Set the action text and data attribute when opening the modal
        projectActionModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Button that triggered the modal
            const action = button.dataset.action; // Get the action from the button data attribute
            const projectName = button.dataset.projectName; // Get the project name from the button data attribute

            projectActionModal.dataset.action = action; // Set the data attribute
            projectActionModal.dataset.projectName = projectName; // Set the project name data attribute

            // Set the action text based on the selected action
            switch (action) {
                case 'delete':
                    projectActionHeader.textContent = 'Delete Project';
                    projectActionText.textContent = `Are you sure you want to delete the project "${projectName}"? It means you’ll remove all member inside this project.`;
                    confirmProjectActionBtn.textContent = 'Delete Project';
                    confirmProjectActionBtn.classList.add('btn-danger');
                    confirmProjectActionBtn.classList.remove('btn-primary');
                    break;
                case 'complete':
                    projectActionHeader.textContent = 'Complete Project';
                    projectActionText.textContent = `Are you sure you want to mark the project "${projectName}" as completed?`;
                    confirmProjectActionBtn.textContent = 'Complete Project';
                    confirmProjectActionBtn.classList.add('btn-primary');
                    confirmProjectActionBtn.classList.remove('btn-danger');
                    break;
                case 'leave':
                    projectActionHeader.textContent = 'Leave Project';
                    projectActionText.textContent = `Are you sure you want to leave the project "${projectName}"?`;
                    confirmProjectActionBtn.textContent = 'Leave Project';
                    confirmProjectActionBtn.classList.add('btn-danger');
                    confirmProjectActionBtn.classList.remove('btn-primary');
                    break;
            }
        });
    });
</script>

