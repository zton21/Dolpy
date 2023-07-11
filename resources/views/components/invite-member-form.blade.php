<div id="invite-member-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <div class="d-flex gap-1 align-items-center">
                    <h6 class="modal-title text-secondary me-1">Invite Member</h6>
                    <h5 class="text-secondary">|</h5>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <form id="invite-member-form" method="POST" action="">
                <input type="hidden" name="task" value="invite"/>
                <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="member-email" class="form-label">Invite to Project</label>
                            <input type="email" class="form-control" id="member-email" name="member_email" placeholder="Enter email address" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="member" class="btn btn-primary w-100">Invite Member</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openInviteMemberFormModal() {
        var modal = new bootstrap.Modal(document.getElementById('invite-member-modal'));
        var form = document.getElementById(`invite-member-form`);
        form.reset();
        modal.show();
    }
</script>