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
                    @if (Auth::user()->role == 'administrator')
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder text-white">Administrator</h6>
                    @else
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder text-white">Pembeli</h6>
                    @endif
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
        <nav class="navbar navbar-main navbar-expand-lg p-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">{{ str_replace('-', ' ', Request::path()) }}</li>
                </ol>
                <h6 class="font-weight-bolder mb-0 text-capitalize">{{ str_replace('-', ' ', Request::path()) }}</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar"> 
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item d-flex align-items-center px-3">
                        <span class="d-sm-inline d-none px-3 font-weight-bold">{{ Auth::user()->name }}</span>
                        <span class="d-sm-inline d-none text-muted">({{ Auth::user()->role }})</span>
                    </li>
                    <li class="nav-item d-xl-none d-flex align-items-center pe-3">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                    <form class="mb-0" action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link text-body font-weight-bold px-0 py-0" style="border: none; background: none;">
                        <i class="fa fa-sign-out-alt ms-sm-1"></i>    
                        <span class="d-sm-inline d-none">Logout</span>
                        </button>
                    </form>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid py-3">
            <div class="card mx-3 mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="m-0">Items table</h6>
                        <p class="text-sm">See all items located in your unit</p>
                    </div>
                    <div>
                        <h6 class="m-0 text-sm">Total number of:</h6>
                        <p class="d-inline-block me-2 text-sm">Items: {{ $totalItems }}</p>
                        <p class="d-inline-block text-sm">Brands: {{ $totalBrands }}</p>
                    </div>
                    <div class="form-group mb-3">
                        <form action="{{ route('barang.index') }}" method="GET">
                        <div class="input-group">
                            <button class="input-group-text search-icon" type="submit"><i class="fas fa-search"></i></button>
                            <input class="form-control px-2" name="search" placeholder="Search" type="text" value="{{ request('search') }}">
                        </div>
                        </form>
                    </div>
                    @can('create-item')
                    <div class="ml-auto p-0">
                        <a href=" {{ route('barang.create') }}" class="btn bg-gradient-primary">Add Item</a>
                    </div>
                    @endcan
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-secondary text-xxs font-weight-bolder pe-3">ID</th>
                            <th class="text-secondary text-xxs font-weight-bolder px-2">Item</th>
                            <th class="text-secondary text-xxs font-weight-bolder px-2">Brand</th>
                            <th class="text-secondary text-xxs font-weight-bolder px-2">Serial Number</th>
                            <th class="text-secondary text-xxs font-weight-bolder px-2">Stok</th>
                            <th class="text-secondary text-xxs font-weight-bolder px-2">Harga</th>
                            <th class="text-secondary text-xxs font-weight-bolder px-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>
                            <p class="text-xs font-weight-bold mb-0 ps-3">{{ $item->id }}</p>
                            </td>
                            <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($item->photo) }}" class="avatar avatar-sm me-3" alt="item-image">
                                <div class="d-flex flex-column">
                                <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                                <p class="text-xs text-secondary mb-0">{{ $item->jenis }}</p>
                                </div>
                            </div>
                            </td>
                            <td>
                            <p class="text-xs font-weight-bold mb-0">{{ $item->brand }}</p>
                            </td>
                            <td class="align-middle">
                            <span class="text-xs font-weight-bold">{{ $item->serial_number }}</span>
                            </td>
                            <td class="align-middle">
                            <span class="text-xs font-weight-bold">{{ $item->stok }}</span>
                            </td>
                            <td class="align-middle">
                            <span class="text-xs font-weight-bold">Rp. {{ number_format($item->harga, 0, ',', '.') }}</span>
                            </td>
                            <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('barang.show', ['item' => $item->id]) }}" class="me-2">
                                <button type="button" class="btn btn-action btn-info mb-0" title="Show detail about this item">
                                    <i class="fas fa-eye"></i>
                                </button>
                                </a>
                                @can('edit-item', $item)
                                    <a href="{{ route('barang.edit', ['item' => $item->id]) }}">
                                        <button type="button" class="btn btn-action btn-primary mb-0 me-1" title="Edit this item">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </a>
                                @endcan

                                @can('delete-item', $item)
                                    <form action="{{ route('barang.destroy', ['item' => $item->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-action mb-0 ms-1 btn-danger" title="Delete this item">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endcan
                            </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
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
