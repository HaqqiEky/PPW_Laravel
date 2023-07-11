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
    @if(session('success'))
    <div id="success-message" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    
    <!-- Navbar -->
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 my-3 {{ (Request::is('static-sign-up') ? 'w-100 shadow-none  navbar-transparent mt-4' : 'blur blur-rounded shadow py-2 start-0 end-0 mx4') }}" id="guest-navbar">
                    <div class="container-fluid {{ (Request::is('static-sign-up') ? 'container' : 'container-fluid') }}">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 {{ (Request::is('static-sign-up') ? 'text-white' : '') }}" href="{{ url('dashboard') }}">
                        Sipinjam
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ms-auto">
                            @if (auth()->user())
                                <li class="nav-item">
                                <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{ url('dashboard') }}">
                                    <i class="fa fa-chart-pie opacity-6 me-1 {{ (Request::is('static-sign-up') ? '' : 'text-dark') }}"></i>
                                    Dashboard
                                </a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link me-2" href="{{ url('profile') }}">
                                    <i class="fa fa-user opacity-6 me-1 {{ (Request::is('static-sign-up') ? '' : 'text-dark') }}"></i>
                                    Profile
                                </a>
                                </li>
                            @endif
                            <li class="nav-item">
                            <a class="nav-link me-2" href="{{ auth()->user() ? url('static-sign-up') : url('register') }}">
                                <i class="fas fa-user-circle opacity-6 me-1 {{ (Request::is('static-sign-up') ? '' : 'text-dark') }}"></i>
                                Register
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link me-2" href="{{ auth()->user() ? url('static-sign-in') : url('login') }}">
                                <i class="fas fa-key opacity-6 me-1 {{ (Request::is('static-sign-up') ? '' : 'text-dark') }}"></i>
                                Login
                            </a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Navbar -->

    <section class="min-vh-100 mb-4">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 mx-3 border-radius-lg" style="background-image: url('{{ asset('assets/img/register.png') }}');">
          <span class="mask bg-gradient-dark opacity-6"></span>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-5 text-center mx-auto">
                <h1 class="text-white mb-2 mt-5" id="register-heading">Sipinjam</h1>
                <p class="text-lead text-white" id="register-description">Create an account for a simple and safe way to apply for borrowing items online</p>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
              <div class="card z-index-0">
                <div class="card-header text-center pt-4">
                  <h5>Register</h5>
                </div>
                <div class="card-body">
                  <form role="form text-left" method="POST" action="/register">
                    @csrf
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="Name" name="name" id="name" aria-label="Name" aria-describedby="name" value="{{ old('name') }}">
                      @error('name')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <input type="email" class="form-control" placeholder="Email" name="email" id="email" aria-label="Email" aria-describedby="email-addon" value="{{ old('email') }}">
                      @error('email')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="Phone Number" name="phone" id="phone" aria-label="Phone Number" aria-describedby="phone" value="{{ old('telp') }}">
                      @error('phone')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control" placeholder="Password" name="password" id="password" aria-label="Password" aria-describedby="password-addon">
                      @error('password')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="form-check form-check-info text-left">
                      <input class="form-check-input" type="checkbox" name="agreement" id="flexCheckDefault" checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree with the <a href="javascript:;" class="text-dark font-weight-bolder" data-bs-toggle="modal" data-bs-target="#terms-and-conditions">Terms and Conditions</a>
                      </label>
                      @error('agreement')
                        <p class="text-danger text-xs mt-2">You must agree to the Terms and Conditions in order to register.</p>
                      @enderror
                    <!-- Modal -->
                    <div class="modal fade" id="terms-and-conditions" tabindex="-1" role="dialog" aria-labelledby="terms-and-condition" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="terms-and-conditions-title">TERMS AND CONDITIONS</h5>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h6>Registration and User Accounts</h6>
                            <ol>
                              <li>User registration must be carried out accurately by providing correct and complete information, including full name, email address, telephone number, and other profile information requested by the application.</li>
                              <li>Only users who have registered and have an official account on the SIPINJAM application can use items lending services.</li>
                              <li>Each user is responsible for maintaining the confidentiality of their account information, including the password used to access the application. Users are not permitted to share their account information with other parties.</li>
                              <li>Users are fully responsible for all activities carried out using their account.</li>
                            </ol>
    
                            <h6>Items Lending</h6>
                            <ol>
                              <li>Users can borrow items available in the SIPINJAM application in accordance with applicable regulations.</li>
                              <li>The user is required to submit an application for borrowing items by stating the start date and end date of the loan.</li>
                              <li>Applications for borrowing items will be processed by the application admin and can be approved or rejected based on the availability of items and the application admin's considerations.</li>
                              <li>Users can only borrow items for personal use and are not allowed for commercial purposes.</li>
                            </ol>
    
                            <h6>Use of Items</h6>
                            <ol>
                              <li>The use of borrowed items must be in accordance with the agreed start date and end date of the loan.</li>
                              <li>The user is responsible for maintaining and using the item properly during the loan period.</li>
                              <li>Any damage or loss of items during use must be reported immediately to the application admin.</li>
                              <li>Users are prohibited from making changes, modifications, or moving items without the approval of the application admin.</li>
                            </ol>
                            
                            <h6>Loan Cancellation</h6>
                            <ol>
                              <li>Users can cancel loan requests before getting approval from the application admin.</li>
                              <li>Users can only cancel loan requests through the application and not through other methods.</li>
                              <li>If the user cancels the loan application after obtaining approval from the application admin, the user is still responsible for paying fees or sanctions set by the application admin.</li>
                            </ol>
    
                            <h6>Termination of Access</h6>
                            <ol>
                              <li>The application admin has the right to terminate user access to the SIPINJAM application if the user violates the terms and conditions set.</li>
                              <li>Termination of access can be temporary or permanent, depending on the decision of the application admin.</li>
                              <li>Users whose access has been terminated will not be able to use the SIPINJAM application services during the termination period.</li>
                            </ol>
    
                            <p>Please note that these terms and conditions may be updated or changed according to the applicable policies. Users will be notified of changes made via email or in-app notifications.</p>
                            <p>By using the SIPINJAM application, users are deemed to have read, understood, and agreed to comply with all terms and conditions that have been set.</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-primary" data-bs-dismiss="modal">I have read and understood</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Register</button>
                  </div>
                  <p class="text-sm mt-3 mb-0">Already have an account? <a href="login" class="text-dark font-weight-bolder">Login</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

      <script>
      setTimeout(function() {
          var flashMessage = document.getElementById('success-message');
          if (flashMessage) {
              flashMessage.remove();
          }
      }, 2000);
      </script>

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
