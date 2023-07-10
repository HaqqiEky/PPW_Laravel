<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <title>
    Sipinjam
  </title>
  <!--  Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/3343256dc4.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
  <!-- Chart JS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="g-sidenav-show bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl fixed-start bg-gradient-primary"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="#">
                <img src="{{ asset('assets/img/sidebar-logo.png') }}" class="navbar-brand-img h-100 invert" alt="...">
                <span class="ms-3 font-weight-bold text-white font brand-text">Jebres Electronic</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse h-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item mt-2">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder text-white">Administrator</h6>
                </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('items') ? 'active' : '' }}" href="{{ url('items') }}">
                            <div
                                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;"
                                    class="fas fa-lg fa-cubes ps-2 pe-2 text-center text-dark {{ Request::is('items') ? 'text-white' : 'text-dark' }} "
                                    aria-hidden="true"></i>
                            </div>
                            <span
                                class="nav-link-text ms-1 {{ Request::is('items') ? 'text-dark' : 'text-white' }}">Items</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="#">
                            <div
                                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;"
                                    class="fas fa-lg fa-user ps-2 pe-2 text-center text-dark {{ Request::is('profile') ? 'text-white' : 'text-dark' }} "
                                    aria-hidden="true"></i>
                            </div>
                            <span class="nav-link-text ms-1 {{ Request::is('profile') ? 'text-dark' : 'text-white' }}">User
                                Profile</span>
                        </a>
                    </li>
            </ul>
        </div>
        <div class="sidenav-footer mx-3 ">
            <div class="card card-background shadow-none bg-gradient-dark" id="sidenavCard">
                <div class="card-body text-start p-3 w-100">
                    <div
                        class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
                        <i class="fas fa-gem text-dark text-gradient text-lg top-0" aria-hidden="true"
                            id="sidenavCardIcon"></i>
                    </div>
                    <div class="docs-info">
                        <h6 class="text-white mb-0">Need help?</h6>
                        <p class="text-xs font-weight-bold">Please check our docs</p>
                        <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard"
                            target="_blank" class="btn bg-gradient-light btn-sm w-100 mb-0">Documentation</a>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <div class="card mx-3 mb-4">
            <div class="card-header pb-0">
                <h6 class="m-0">Item Detail</h6>
                <p class="text-sm mb-0">View detail of your item.</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset($item->photo) }}" alt="Item Photo" class="img-fluid rounded mb-2" style="max-height: 150px; width: auto;"><br>
                        <h5 class="mb-0 mt-2 d-inline-block">{{ $item->name }}</h5>
                        <p class="d-inline-block"></p>
                        <p class="m-0 d-inline-block">(ID: {{ $item->id }})</p>
                        <p class="m-0">Serial: {{ $item->serial_number }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Jenis:</strong><br> {{ $item->jenis }}</p>
                        <p><strong>Brand:</strong><br> {{ $item->brand }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>harga:</strong><br> Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>
                        <p><strong>Added at:</strong><br> {{ $item->created_at }}</p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <p><strong>Description:</strong><br> {{ $item->description }}</p>
                    </div>
                </div>
                <hr>
                <div class="col-md-6 mt-4">
                    <a href="{{ route('barang.index') }}" class="btn bg-gradient-info" id="backButton">Back</a>
                </div>
            </div>
        </div>       
    </main>

        <!--   Core JS Files   -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/perfect-scrollbar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.8.4/smooth-scrollbar.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/soft-ui-dashboard.js?v=1.0.3') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>