<div class="modal fade" id="modal-edit-musyrif{{$row->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left\">
                        <h5 class="">Edit Data Status Barang</h5>
                        <p class="mb-0">Update Data Barang</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('musyrif.update', $row->id)}}" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @if(Auth::user()->role == 'Admin' )
                            <div id="test" class="input-group input-group-outline my-3">
                                <label class="form-label">Nama Penerima</label>
                                <input type="text" class="form-control" name="nama_penerima"
                                    value="{{$row->nama_penerima}}" onfocus="focused(this)"
                                    onfocusout="defocused(this)">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Ekspedisi</label>
                                <input type="text" class="form-control" name="ekspedisi" value="{{$row->ekspedisi}}"
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <div class="input-group input-group-outline my-2">
                                <label class="form-label">Foto Barang</label>
                                <input type="file" class="form-control" value="{{$row->img}}" name="img">
                            </div>
                            <label>Status</label>
                            <div class="input-group input-group-outline">
                                <select class="form-control" required name="status">
                                    <option value="{{$row->status}}">@if ($row->status == 'satpam' )
                                        <span>POS SATPAM</span>
                                        @elseif ($row->status == 'musyrif')
                                        <span>RUANG MUSYRIF</span>
                                        @else
                                        <span>DIAMBIL</span>
                                        @endif
                                    </option>
                                    <option value="satpam">POS SATPAM</option>
                                    <option value="selesai">DIAMBIL</option>
                                </select>
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Diterima Oleh</label>
                                <input type="text" class="form-control" name="penerima_paket"
                                    value="{{$row->penerima_paket}}" onfocus="focused(this)"
                                    onfocusout="defocused(this)">
                            </div>
                            @else
                            <div id="test" class="input-group input-group-outline my-3">
                                <label class="form-label">Nama Penerima</label>
                                <input type="text" class="form-control" name="nama_penerima"
                                    value="{{$row->nama_penerima}}" disabled onfocus="focused(this)"
                                    onfocusout="defocused(this)">
                            </div>
                            <div class="input-group input-group-outline mb-2">
                                <label class="form-label">Ekspedisi</label>
                                <input type="text" class="form-control" name="ekspedisi" value="{{$row->ekspedisi}}"
                                    disabled onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            <label>Status</label>
                            <div class="input-group input-group-outline">

                                <select class="form-control" required name="status">
                                    <option value="{{$row->status}}">@if ($row->status == 'satpam' )
                                        <span>POS SATPAM</span>
                                        @elseif ($row->status == 'musyrif')
                                        <span>RUANG MUSYRIF</span>
                                        @else
                                        <span>DIAMBIL</span>
                                        @endif
                                    </option>
                                    <option value="selesai">DIAMBIL</option>
                                </select>

                            </div>

                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Diterima Oleh</label>
                                <input type="text" class="form-control" name="penerima_paket" required
                                    value="{{$row->penerima_paket}}" onfocus="focused(this)"
                                    onfocusout="defocused(this)">
                            </div>
                            @endif

                            <div class="text-center">
                                <button type="submit"
                                    class="btn btn-round bg-gradient-primary btn-lg w-100 mt-4 mb-0">Update</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>