<!-- Modal -->
<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="ajax-form" class="submitForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="update">
                    <div class="row m-2">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">name</label>
                                <input type="text" name="name" id="name" class="form-control form-control-sm">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control form-control-sm">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control form-control-sm">
                            </div>
                            <div class="mb-3">
                                <label for="roll" class="form-label">Roll</label>
                                <input type="number" name="roll" id="roll" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-6">

                            <div class="mb-3">
                                <label for="reg" class="form-label">Reg</label>
                                <input type="number" name="reg" id="reg" class="form-control form-control-sm">
                            </div>
                            <div class="mb-3" id="select-board">

                            </div>

                            <div class="mb-3">
                                <label for="profile" class="form-label">Profile</label>
                                <input type="file" name="avatar" id="avatar" class="form-control form-control-sm">
                            </div>
                            <div class="profile-img pt-1">

                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="reset" class="btn btn-sm btn-danger" >Reset</button>
                        <button type="submit" class="btn btn-sm btn-primary save-btn"></button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
