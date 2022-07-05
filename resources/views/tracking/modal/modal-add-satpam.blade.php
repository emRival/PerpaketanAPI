<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left\">
                        <h5 class="">Add Data Barang Masuk</h5>
                        <p class="mb-0">Masukkan Data Barang</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('satpam.store')}}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Nama Penerima</label>
                                <input type="text" class="form-control" required name="nama_penerima"
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Ekspedisi</label>
                                <input type="text" class="form-control" required name="ekspedisi"
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>

                            <div class="input-group input-group-outline my-2">
                                <label class="form-label">Foto Barang</label>
                                <input type="file" class="form-control" required name="img">

                            </div>

                            <label>Status</label>
                            <div class="input-group input-group-outline">

                                <select class="form-control" required id="status" required name="status">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="satpam">POS SATPAM</option>
                                    <option value="musyrif">RUANG MUSYRIF</option>
                                    <option value="selesai">DIAMBIL</option>
                                </select>
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