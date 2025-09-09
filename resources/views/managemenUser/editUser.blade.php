<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="{{ asset('kaiadmin/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
            families: [
                "Font Awesome 5 Solid",
                "Font Awesome 5 Regular",
                "Font Awesome 5 Brands",
                "simple-line-icons",
            ],
            urls: ["{{ asset('kaiadmin/assets/css/fonts.min.css') }}"],
            },
            active: function () {
            sessionStorage.fonts = true;
            },
        });
    </script>

        <!-- CSS Files -->
        <link rel="stylesheet" href="{{ asset('kaiadmin/assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('kaiadmin/assets/css/plugins.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('kaiadmin/assets/css/kaiadmin.min.css') }}" />

        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link rel="stylesheet" href="{{ asset('kaiadmin/assets/css/demo.css') }}" />

  </head>
  <body>
    <div class="wrapper">
       @include('sidebar')

      <div class="main-panel">
        @include('header')
        <div class="container">
          <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              <div>
                <h3 class="fw-bold mb-3">Tambah Pengguna</h3>
                <h6 class="op-7 mb-2"></h6>
              </div>
            </div>

            <div class="row">
              <div class="col-md-8 col-lg-12 mx-auto"> <!-- center & agak besar -->
                <div class="card">
                    <div class="card-header bg-secondary rounded-top">
                      <h4 style="color:white;" class="card-title mb-0">Form Tambah Pengguna</h4>
                    </div>
                  <div class="card-body">
                    <form action="{{ route('managemenUser.updateUser', $user->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="row">
                        <!-- First & Last Name -->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input
                              type="text"
                              name="first_name"
                              class="form-control"
                              id="first_name"
                              placeholder="First Name"
                              required
                              value="{{ old('first_name', $first_name) }}"
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input
                              type="text"
                              name="last_name"
                              class="form-control"
                              id="last_name"
                              placeholder="Last Name"
                              required
                               value="{{ old('last_name', $last_name) }}"
                            />
                          </div>
                        </div>
                      </div>

                      <!-- Email -->
                      <div class="form-group">
                        <label for="email2">Email Address</label>
                        <input
                          type="email"
                          name="email"
                          class="form-control"
                          id="email2"
                          placeholder="Enter Email"
                          required
                           value="{{ old('email', $user->email) }}"
                        />
                        <small id="emailHelp2" class="form-text text-muted">
                          We'll never share your email with anyone else.
                        </small>
                      </div>

                      <!-- Password -->
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input
                          type="password"
                          name="password"
                          class="form-control"
                          id="password"
                          placeholder="Password"
                          required
                           value="Kosongkan jika tidak ingin diubah"
                        />
                      </div>

                     <select class="form-control" id="role" name="role" required>
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="super" {{ $user->role == 'super' ? 'selected' : '' }}>Super Admin</option>
                    </select>



                      <!-- Action -->
                     <div class="card-action text-end">
                      <button type="submit" class="btn btn-success"
                              id="alert_demo_3_3">Submit</button>
                      <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
                    </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <nav class="pull-left">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="http://www.themekita.com">
                    ThemeKita
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Help </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Licenses </a>
                </li>
              </ul>
            </nav>
            <div class="copyright">
              2024, made with <i class="fa fa-heart heart text-danger"></i> by
              <a href="http://www.themekita.com">ThemeKita</a>
            </div>
            <div>
              Distributed by
              <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
            </div>
          </div>
        </footer>
      </div>

    </div>
    <!--   Core JS Files   -->
        <script src="{{ asset('kaiadmin/assets/js/core/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('kaiadmin/assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('kaiadmin/assets/js/core/bootstrap.min.js') }}"></script>

        <!-- jQuery Scrollbar -->
        <script src="{{ asset('kaiadmin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

        <!-- Chart JS -->
        <script src="{{ asset('kaiadmin/assets/js/plugin/chart.js/chart.min.js') }}"></script>

        <!-- jQuery Sparkline -->
        <script src="{{ asset('kaiadmin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

        <!-- Chart Circle -->
        <script src="{{ asset('kaiadmin/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

        <!-- Datatables -->
        <script src="{{ asset('kaiadmin/assets/js/plugin/datatables/datatables.min.js') }}"></script>

        <!-- Bootstrap Notify -->
        <script src="{{ asset('kaiadmin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

        <!-- jQuery Vector Maps -->
        <script src="{{ asset('kaiadmin/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
        <script src="{{ asset('kaiadmin/assets/js/plugin/jsvectormap/world.js') }}"></script>

        <!-- Sweet Alert -->
        <script src="{{ asset('kaiadmin/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

        <!-- Kaiadmin JS -->
        <script src="{{ asset('kaiadmin/assets/js/kaiadmin.min.js') }}"></script>


    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>
  </body>
</html>
