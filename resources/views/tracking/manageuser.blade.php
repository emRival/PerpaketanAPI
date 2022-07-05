@extends('template')

@section('title')
Registrasi Akun
@endsection

@section('head')
Registrasi Akun
@endsection

@section('role')
{{$user->role}}
@endsection

@section('side-bar')
Akun
@endsection

@section('mini-icon-nav')
<i class="fas fa-user"></i>
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4  row">
                    <div class="col-md-6">
                        <h6 class="text-white text-capitalize ps-3">Registrasi AKun</h6>
                    </div>

                    <div class="col-md-6 d-flex justify-content-end mb-2">
                        <form method="get" action="">
                            <div class="d-flex justify-content-end me-2">
                                <input type="text" name="cari" class="form-control w-50 h-75 d-inline bg-white"
                                    style="border: 1px solid; padding-left:8px;" id="cari" placeholder=" Search">
                            </div>
                        </form>
                        <button type="button" class="btn btn-block btn-light btn-round btn-sm" data-bs-toggle="modal"
                            data-bs-target="#add-user">
                            <i class="fa fa-plus"></i> &nbsp;
                            Akun
                        </button>
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
                                    Nama Petugas</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Role</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>
                                    <div class="d-flex px-3">
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-sm">{{$loop->iteration}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$user->name}}</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$user->role}}</p>
                                </td>


                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#detail-user{{$user->id}}"><i class="fas fa-eye"></i></button>
                                    @include('user.modal.detail-user')

                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modal-del-user{{$user->id}}"><i
                                            class="fa fa-trash"></i></button>
                                    @include('user.modal.delete-user')
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">Data Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="justfy-content-start">
                        <div class="dataTables_paginate paging_simple_numbers mt-2" id="add-row_paginate">
                            {{ $users->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('user.modal.create-user')


@endsection