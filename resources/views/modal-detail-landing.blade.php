<div class="modal fade" id="detail-landing{{$row->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                        <h5><strong>Foto Bukti Paket</strong></h5>
                        <h6>Atas Nama : {{$row->nama_penerima}}</h6>
                    </div>
                    <div class="card-body">

                        <img class="img img-thumbnail" style=" max-width: 100% !important;  height: auto !important;"
                            src="{{url('/storage', $row->img)}}" alt="">


                        <div class="text-center">
                            <button type="button" data-bs-dismiss="modal"
                                class="btn btn-round bg-gradient-primary btn-md w-100 mt-4 mb-0 text-white"
                                style="background-color: #de2667;">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>