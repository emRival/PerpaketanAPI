@extends('template')

@section('title')
Edit Password
@endsection

@section('title')
Edit Password
@endsection

@section('mini-icon-nav')
<i class="fas fa-key"></i>
@endsection

@section('role')
{{$user->role}}
@endsection

@section('name')
{{$user->name}}
@endsection

@section('content')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title"></h4>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <form action="{{ route('update-pass', $user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <div>
                                <h5>Edit Password, <em>{{ Auth::user()->name }}</em></h5>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12">

                                    @if(Session::get('Success'))
                                    <div class="alert alert-success alert-dismissible fade show text-white"
                                        role="alert">
                                        {{Session::get('Success')}}
                                    </div>
                                    @endif

                                    @if(Session::get('Failed'))
                                    <div class="alert alert-danger alert-dismissible fade show text-white" role="alert">
                                        {{Session::get('Failed')}}
                                    </div>
                                    @endif

                                    <div class="row">

                                        <div>
                                            <div class="row">
                                                <div class="col-md-3 ">
                                                    <h6 for="#passNow">Password sekarang</h6>
                                                </div>
                                                <div class="col-md-1">
                                                    <h6>:</h6>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="password" name="old_password"
                                                        class="form-control w-100 h-75 input-fixed @error('old_password') is-invalid @enderror bg-light"
                                                        style="border: 1px solid; padding-left:8px;" id="passNow">
                                                    @error('old_password')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-md-3">
                                                    <h6>Password baru</h6>
                                                </div>
                                                <div class="col-md-1">
                                                    <h6>:</h6>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="password" name="password"
                                                        class="form-control input-fixed @error('password') is-invalid @enderror bg-light w-100 h-75 "
                                                        style="border: 1px solid; padding-left:8px;"
                                                        id="exampleInputPassword1">
                                                    @error('password')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-md-3">
                                                    <h6>Ulangi Password baru</h6>
                                                </div>
                                                <div class="col-md-1">
                                                    <h6>:</h6>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="password" name="password_confirmation"
                                                        class="@error('password_confirmation') is-invalid @enderror form-control input-fixed bg-light w-100 h-75"
                                                        style="border: 1px solid; padding-left:8px;"
                                                        id="exampleInputPassword1">
                                                    @error('password_confirmation')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">



                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" id="displayNotif" style="margin-left: -3px !important;"
                                    class="btn btn-primary">Update</button>
                            </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection