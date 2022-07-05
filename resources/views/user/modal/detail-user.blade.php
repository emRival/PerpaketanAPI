<div class="modal fade" id="detail-user{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left\">
                        <h5 class="">Detail User</h5>
                        <p class="mb-0">Info Data User</p>
                    </div>
                    <div class="card-body">
                        <form action="{{route('resetpass', $user->id)}}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Nama User</label>
                                <input type="text" class="form-control" required name="name" value="{{$user->name}}"
                                    onfocus="focused(this)" disabled onfocusout="defocused(this)">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" required name="email" value="{{$user->email}}"
                                    onfocus="focused(this)" disabled onfocusout="defocused(this)">
                            </div>
                            <label>Role</label>
                            <div class="input-group input-group-outline">

                                @if ($user->role == 'Admin' )
                                <span class="badge bg-primary" style="color: white;">ADMIN</span>
                                @elseif ($user->role == 'Musyrif')
                                <span class="badge bg-warning" style="color: white;">MUSYRIF</span>
                                @else
                                <span class="badge bg-success" style="color: white;">SATPAM</span>
                                @endif
                            </div>
                            <div class="form-grup text-center mt-3 ">
                                <label style="color: red !important;">Default Password : 1234 </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" data-bs-dismiss="modal"
                                    class="btn btn-round bg-gradient-primary btn-lg w-100 mt-4 mb-0">Reset
                                    Password</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>