@extends('template')

@section('title')
Dashboard
@endsection

@section('mini-icon-nav')
<i class="material-icons">dashboard</i>
@endsection

@section('side-bar')
Dashboard
@endsection

@section('role')
{{$user->role}}
@endsection

@section('content')

<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-3">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-black pb-2 fw-bold">Dashboard</h2>
                    <h5 class="text-black op-7 mb-2">Selamat Datang Kembali, {{ Auth::user()->name }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">

        <div class="row mb-4">

            <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
                <div class="card  mb-2">
                    <div class="card-header p-3 pt-2 bg-transparent">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">store</i>
                        </div>
                        <div class="text-end pt-1">
                            <h4>
                                <p class="text-lg mb-0 text-capitalize "><b>POS Satpam</b></p>
                            </h4>
                            <h4 class="mb-0 "></h4>
                        </div>
                    </div>
                    <hr class="horizontal my-0 dark">
                    <div class="card-footer p-3">
                        <p class="mb-0 "><span class="text-primary text-sm font-weight-bolder">{{$paketsatpam}}</span>
                            perlu dipindahkan</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
                <div class="card  mb-2">
                    <div class="card-header p-3 pt-2 bg-transparent">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-boxes opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <h4>
                                <p class="text-lg mb-0 text-capitalize "><b>Ruang Musyrif</b></p>
                            </h4>
                            <h4 class="mb-0 "></h4>
                        </div>
                    </div>
                    <hr class="horizontal my-0 dark">
                    <div class="card-footer p-3">
                        <p class="mb-0 "><span class="text-warning text-sm font-weight-bolder">{{$paketmusyrif}}</span>
                            perlu diambil</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
                <div class="card  mb-2">
                    <div class="card-header p-3 pt-2 bg-transparent">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-box-open opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <h4>
                                <p class="text-lg mb-0 text-capitalize "><b>Total Paket Diterima</b></p>
                            </h4>
                            <h4 class="mb-0 "></h4>
                        </div>
                    </div>
                    <hr class="horizontal my-0 dark">
                    <div class="card-footer p-3">
                        <p class="mb-0 "><span class="text-success text-sm font-weight-bolder">{{$paketditerima}}</span>
                            Diterima</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
                <div class="card  mb-2">
                    <div class="card-header p-3 pt-2 bg-transparent">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-box opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <h4>
                                <p class="text-lg mb-0 text-capitalize "><b>Total Paket Hari ini</b></p>
                            </h4>
                            <h4 class="mb-0 "></h4>
                        </div>
                    </div>
                    <hr class="horizontal my-0 dark">
                    <div class="card-footer p-3">
                        <p class="mb-0 "><span class="text-info text-sm font-weight-bolder">{{$pakettanggal}}</span>
                            Paket masuk</p>
                    </div>
                </div>
            </div>


        </div>

    </div>

</div>





@endsection