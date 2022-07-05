<div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left\">
                        <h5 class="">Add User</h5>
                        <p class="mb-0">Masukkan Data User</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('createuser')}}" role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Nama User</label>
                                <input type="text" class="form-control" required name="name" onfocus="focused(this)"
                                    onfocusout="defocused(this)">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" required name="email" onfocus="focused(this)"
                                    onfocusout="defocused(this)">
                            </div>
                            <label>Role</label>
                            <div class="input-group input-group-outline">

                                <select class="form-control" required name="role">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Admin">ADMIN</option>
                                    <option value="Satpam">SATPAM</option>
                                    <option value="Musyrif">MUSYRIF</option>
                                </select>
                            </div>
                            <div class="form-grup container">
                                <label style="color: red !important;">Default Password : 1234 </label>
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class="btn btn-round bg-gradient-primary btn-lg w-100 mt-4 mb-0">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>