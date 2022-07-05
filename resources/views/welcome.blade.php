<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Paket IDN</title>
    <link rel="icon" href="{{url('atlantis/assets/img/iconku.svg')}}" type="image/x-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="stylesheet" href="{{asset('atlantis/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('atlantis/assets/css/atlantis.min.css')}}">


    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{asset('atlantis/assets/css/demo.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!-- Styles -->


    <style>
    body {
        font-family: 'Nunito', sans-serif;
    }
    </style>
    @livewireScripts
</head>

<body>
    <nav class="navbar navbar-light bg-light" style="background-color: #de2667 !important;">

        <a href="/" class="logo">
            <img src="{{url('atlantis/assets/img/grup1.svg')}}" alt="navbar brand" class="navbar-brand">
        </a>

        <form style=" position: absolute; z-index: 1; right: 140px;" action="{{route('cari-landing')}}">
            <input class="form-control me-2" required name="cari" type="search" placeholder="Search"
                aria-label="Search">
        </form>
        @if (Route::has('login'))
        @auth
        <a style="color: black;" href="{{ url('/home') }}" class="btn btn-white">Home</a>
        @else
        <a href="{{ route('login') }}" class="btn btn-white me-2"><strong> Log in</strong></a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        @endif
        @endauth
        @endif



    </nav>
    <div style="padding-top: 50px;  padding-bottom: 120px;">
        <div class="container">
            <div class="card table-resposive" style="border-radius: 20px;">
                <h5 style="background-color: #de2667; border-radius: 20px; color:white;"
                    class="card-header text-center"><strong>Data Paket IDN</strong></h5>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tgl.</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Ekspedisi</th>
                                <th scope="col">Bukti</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($search == true)
                            @foreach($barang as $row)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$row->tanggal_input}}</td>
                                <td>{{$row->nama_penerima}}</td>
                                <td>{{$row->ekspedisi}}</td>
                                <td><button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#detail-landing{{$row->id}}"><i class="fas fa-eye"></i></button>
                                </td>
                                @include('modal-detail-landing')
                                <td class="">
                                    @if ($row->status == 'satpam')
                                    <span class="badge bg-warning" style="color: white;"><i
                                            class="fas fa-store-alt"></i>
                                        POS SATPAM</span>
                                    @endif
                                    @if ($row->status == 'musyrif')

                                    <span class="badge bg-primary" style="color: white;"><i class="fas fa-boxes"></i>
                                        RUANG
                                        MUSYRIF</span>
                                    @endif
                                    @if ($row->status == 'selesai')

                                    <span class="badge bg-success" style="color: white;"><i class="fas fa-box-open"></i>
                                        SELESAI</span>
                                    @endif
                                </td>

                            </tr>


                            @endforeach
                            @endif

                            @if ($search == false)
                            @foreach($barang as $row)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$row->tanggal_input}}</td>
                                <td>{{$row->nama_penerima}}</td>
                                <td>{{$row->ekspedisi}}</td>
                                <td><button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#detail-satpam{{$row->id}}"><i class="fas fa-eye"></i></button>
                                    @include('tracking.modal.modal-detail-satpam')</td>
                                <td class="">
                                    @if ($row->status == 'satpam')
                                    <span class="badge bg-warning" style="color: white;"><i
                                            class="fas fa-store-alt"></i>
                                        POS SATPAM</span>
                                    @endif
                                    @if ($row->status == 'musyrif')

                                    <span class="badge bg-primary" style="color: white;"><i class="fas fa-boxes"></i>
                                        RUANG
                                        MUSYRIF</span>
                                    @endif
                                    @if ($row->status == 'selesai')

                                    <span class="badge bg-success" style="color: white;"><i class="fas fa-box-open"></i>
                                        SELESAI</span>
                                    @endif
                                </td>
                            </tr>


                            @endforeach
                            @foreach($barangselesai as $row)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$row->tanggal_input}}</td>
                                <td>{{$row->nama_penerima}}</td>
                                <td>{{$row->ekspedisi}}</td>
                                <td><button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#detail-satpam{{$row->id}}"><i class="fas fa-eye"></i></button>
                                    @include('tracking.modal.modal-detail-satpam')</td>
                                <td class="">
                                    @if ($row->status == 'satpam')
                                    <span class="badge bg-warning" style="color: white;"><i
                                            class="fas fa-store-alt"></i>
                                        POS SATPAM</span>
                                    @endif
                                    @if ($row->status == 'musyrif')

                                    <span class="badge bg-primary" style="color: white;"><i class="fas fa-boxes"></i>
                                        RUANG
                                        MUSYRIF</span>
                                    @endif
                                    @if ($row->status == 'selesai')

                                    <span class="badge bg-success" style="color: white;"><i class="fas fa-box-open"></i>
                                        PENERIMA: {{$row->penerima_paket}}</span>
                                    @endif
                                </td>
                            </tr>


                            @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>

                <div class="justfy-content-start">
                    <div class="dataTables_paginate paging_simple_numbers ml-3 mt-2" id="add-row_paginate">
                        {{ $barang->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>

        </div>
    </div>



    <div class="container">
        <footer class="footer py-4 fixed-bottom ">

            <div class="row d-flex justify-content-between">
                <div class="col-md-6 d-flex justify-content-start">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        © <script>
                        document.write(new Date().getFullYear())
                        </script>,
                        IDN Boarding School
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="nav nav-footer  justify-content-lg-end">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-muted" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-muted" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-muted" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link pe-0 text-muted" target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div>

        </footer>
    </div>



    <!--   Core JS Files   -->
    <script src="{{asset('atlantis/assets/js/core/jquery.3.2.1.min.js')}}"></script>
    <script src="{{asset('atlantis/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('atlantis/assets/js/core/bootstrap.min.js')}}"></script>

    <!-- jQuery UI -->
    <script src="{{asset('atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
    <script src="{{asset('atlantis/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{asset('atlantis/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


    <!-- Chart JS -->
    <script src="{{asset('atlantis/assets/js/plugin/chart.js/chart.min.js')}}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{asset('atlantis/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Chart Circle -->
    <script src="{{asset('atlantis/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

    <!-- Datatables -->
    <script src="{{asset('atlantis/assets/js/plugin/datatables/datatables.min.js')}}"></script>

    <!-- Bootstrap Notify -->
    <!-- <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> -->

    <!-- jQuery Vector Maps -->
    <script src="{{asset('atlantis/assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('atlantis/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

    <!-- Sweet Alert -->
    <script src="{{asset('atlantis/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Atlantis JS -->
    <script src="{{asset('atlantis/assets/js/atlantis.min.js')}}"></script>

    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="{{asset('atlantis/assets/js/setting-demo.js')}}"></script>
    <script src="{{asset('atlantis/assets/js/demo.js')}}"></script>
    <!--   Core JS Files   -->
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>








</body>

</html>