<div class="modal fade" id="detail-satpam{{$row->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                        <h5>Foto Bukti Paket</h5>
                        <p class="mb-0"><strong>Atas Nama : {{$row->nama_penerima}}</strong></p>
                    </div>
                    <div class="card-body">

                        <img class="img img-thumbnail" src="{{url('/storage', $row->img)}}" alt="">


                        <div class="text-center">
                            <button type="button" data-bs-dismiss="modal"
                                class="btn btn-round bg-gradient-primary btn-lg w-100 mt-4 mb-0">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>