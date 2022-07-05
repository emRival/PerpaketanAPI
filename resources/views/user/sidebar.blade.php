<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#">
            <img src="../../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Pesantren-Ku</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mb-2 mt-0">
                <div class="container d-flex justify-content-center">
                    <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white "
                        aria-controls="ProfileNav" role="button" aria-expanded="false">
                        @if (empty($user->dataSiswa->image))
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="..."
                            class="img-thumbnail w-75 ">
                        @else
                        <img src="{{ url('/storage', $user->dataSiswa->image) }}" alt="" class="img-thumbnail w-75">
                        @endif
                    </a>
                </div>

                <div class="collapse" id="ProfileNav">
                    <ul class="nav ">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('ganti')}}">
                                <span class="sidenav-mini-icon"> GP </span>
                                <span class="sidenav-normal  ms-3  ps-1"> Ganti Password </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white " href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="sidenav-mini-icon"> L </span>
                                <span class="sidenav-normal  ms-3  ps-1"> Logout </span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf

                            </form>
                        </li>
                    </ul>
                </div>
            </li>

            <hr class="horizontal light mt-0">
            @if(Auth::user()->role == 'Admin')
            <!-- ===== ADMIN ===== -->
            <div class="collapse  show " id="dashboardsExamples">
                <ul class="nav ">
                    <li class="nav-item active">
                        <a class="nav-link text-white active" href="/home">
                            <span class="sidenav-mini-icon"> <i class="material-icons">dashboard</i> </span>
                            <span class="sidenav-normal  ms-2  ps-1"> Dashboard </span>
                        </a>
                    </li>

                    <li class="nav-item mb-2 mt-0">
                        <a data-bs-toggle="collapse" href="#tracking" class="nav-link" aria-controls="ProfileNav"
                            role="button" aria-expanded="false">
                            <span class="sidenav-mini-icon"><i class="fas fa-truck-loading"></i></span>

                            <span class="sidenav-normal  ms-3  ps-1"> Tracking Paket </span>
                        </a>
                        <div class="collapse" id="tracking">
                            <ul class="nav ">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{route('satpam.index')}}">
                                        <span class="sidenav-mini-icon"><i
                                                class="material-icons opacity-10">store</i></span>
                                        <span class="sidenav-normal  ms-3  ps-1"> Pos Satpam </span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{route('musyrif.index')}}">
                                        <span class="sidenav-mini-icon"><i class="fas fa-boxes opacity-10"></i></span>
                                        <span class="sidenav-normal  ms-3  ps-1"> Ruang Musyrif </span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{route('selesai.index')}}">
                                        <span class="sidenav-mini-icon"> <i
                                                class="fas fa-box-open opacity-10"></i></span>
                                        <span class="sidenav-normal  ms-3  ps-1"> Diambil </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mb-2 mt-0 ">
                        <a class="nav-link text-white " href="{{route('manageuser')}}">
                            <span class="sidenav-mini-icon"> <i class="fas fa-user"></i> </span>
                            <span class="sidenav-normal  ms-2  ps-1"> Registrasi Akun </span>
                        </a>
                    </li>

                </ul>
            </div>

            @else
            <!-- ===== SATPAM DAN MUSYRIF ===== -->

            <div class="collapse  show " id="dashboardsExamples">
                <ul class="nav ">
                    <li class="nav-item active">
                        <a class="nav-link text-white active" href="/home">
                            <span class="sidenav-mini-icon"> <i class="material-icons">dashboard</i> </span>
                            <span class="sidenav-normal  ms-2  ps-1"> Dashboard </span>
                        </a>
                    </li>

                    <li class="nav-item mb-2 mt-0">
                        <a data-bs-toggle="collapse" href="#tracking" class="nav-link" aria-controls="ProfileNav"
                            role="button" aria-expanded="false">
                            <span class="sidenav-mini-icon"><i class="fas fa-truck-loading"></i></span>

                            <span class="sidenav-normal  ms-3  ps-1"> Tracking Paket </span>
                        </a>
                        <div class="collapse" id="tracking">
                            <ul class="nav ">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{route('satpam.index')}}">
                                        <span class="sidenav-mini-icon"><i
                                                class="material-icons opacity-10">store</i></span>
                                        <span class="sidenav-normal  ms-3  ps-1"> Pos Satpam </span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{route('musyrif.index')}}">
                                        <span class="sidenav-mini-icon"><i class="fas fa-boxes opacity-10"></i></span>
                                        <span class="sidenav-normal  ms-3  ps-1"> Ruang Musyrif </span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{route('selesai.index')}}">
                                        <span class="sidenav-mini-icon"> <i
                                                class="fas fa-box-open opacity-10"></i></span>
                                        <span class="sidenav-normal  ms-3  ps-1"> Diambil </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif

                </ul>
            </div>
    </div>
</aside>