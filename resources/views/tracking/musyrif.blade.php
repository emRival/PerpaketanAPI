@extends('template')

@section('title')
Ruang Musyrif
@endsection

@section('side-bar')
Tracking paket
@endsection

@section('role')
{{$user->role}}
@endsection

@section('mini-icon-nav')
<i class="fas fa-boxes opacity-10"></i>
@endsection



@section('content')

<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-2 row">
                    <div class="col-md-6">
                        <h6 class="text-white text-capitalize ps-3">Ruang Musyrif</h6>
                    </div>

                    <div class="col-md-6 mb-2">
                        <form method="get" action="{{route('cari.musyrif')}}">
                            <div class="d-flex justify-content-end me-2">
                                <input type="text" name="cari" class="form-control w-25 h-75 d-inline bg-white"
                                    style="border: 1px solid; padding-left:8px;" id="cari" placeholder=" Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Tanggal</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Nama Penerima</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Ekspedisi</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Foto Bukti</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($barang as $row)
                            <tr>
                                <td>
                                    <div class="d-flex px-3">
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-sm">{{$loop->iteration}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$row->tanggal_input}}</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$row->nama_penerima}}</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$row->ekspedisi}}</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm " data-bs-toggle="modal"
                                        data-bs-target="#detail-satpam{{$row->id}}"><i class="fas fa-eye"></i></button>
                                    @include('tracking.modal.modal-detail-satpam')

                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">@if ($row->status == 'satpam' )
                                        <span class="badge bg-warning" style="color: white;"><i
                                                class="fas fa-store-alt"></i> POS SATPAM</span>
                                        @elseif ($row->status == 'musyrif')
                                        <span class="badge bg-primary" style="color: white;"><i
                                                class="fas fa-boxes"></i> RUANG MUSYRIF</span>
                                        @else
                                        <span class="badge bg-success" style="color: white;"><i
                                                class="fas fa-box-open"></i> SELESAI</span>
                                        @endif
                                    </p>
                                </td>


                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modal-edit-musyrif{{$row->id}}"><i
                                            class="fa fa-edit"></i></button>
                                    @include('tracking.modal.modal-edit-musyrif')
                                    @if(Auth::user()->role == 'Admin' )
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modal-del-musyrif{{$row->id}}"><i
                                            class="fa fa-trash"></i></button>
                                    @include('tracking.modal.modal-del-musyrif')
                                    @endif

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">Data Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="justfy-content-end d-flex text-end">
                        <div class="dataTables_paginate paging_simple_numbers mt-2" id="add-row_paginate">
                            {{ $barang->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('tracking.modal.modal-add-satpam')


@endsection