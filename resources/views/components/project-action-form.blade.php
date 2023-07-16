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
            <form id="project-action-form" method="POST" action="">
                @csrf
                <input type="hidden" name="task" id="complete-project-action-input" value="">
                <input type="hidden" name="project_id" id="complete-project-id-input" value="">
                <div class="modal-body">
                    <div class="mb-3">
                        <p id="project-action-text" class="text-center fs-5"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn w-100" id="confirm-project-action-btn"></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const projectActionModal = document.getElementById('project-action-modal');
        const projectActionHeader = document.getElementById('modal-title');
        const projectActionText = document.getElementById('project-action-text');
        const confirmProjectActionBtn = document.getElementById('confirm-project-action-btn');
        const projectActionForm = document.getElementById('project-action-form');
        const projectActionInput = document.getElementById('complete-project-action-input');
        const projectIDInput = document.getElementById('complete-project-id-input');

        confirmProjectActionBtn.addEventListener('click', function () {
            // Set the action and project name in the form
            projectActionInput.value = projectActionModal.dataset.action;
            projectIDInput.value = projectActionModal.dataset.projectId;

            // Submit the form
            projectActionForm.submit();

            // Close the modal
            $('#project-action-modal').modal('hide');
        });

        // Set the action text and data attribute when opening the modal
        projectActionModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Button that triggered the modal
            const action = button.dataset.action; // Get the action from the button data attribute
            const projectName = button.dataset.projectName; // Get the project name from the button data attribute
            const projectId = button.dataset.projectId;

            projectActionModal.dataset.action = action; // Set the data attribute
            projectActionModal.dataset.projectName = projectName; // Set the project name data attribute
            projectActionModal.dataset.projectId = projectId; // Set the project id data attribute

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
                case 'uncomplete':
                    projectActionHeader.textContent = 'Uncomplete Project';
                    projectActionText.textContent = `Are you sure you want to unmark the project "${projectName}" as completed?`;
                    confirmProjectActionBtn.textContent = 'Uncomplete Project';
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

