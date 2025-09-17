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
                <h3 class="fw-bold mb-3">Tambah Barang</h3>
                <h6 class="op-7 mb-2"></h6>
              </div>
            </div>

            <div class="row">
              <div class="col-md-8 col-lg-12 mx-auto"> <!-- center & agak besar -->
                <div class="card">
                    <div class="card-header bg-secondary rounded-top">
                      <h4 style="color:white;" class="card-title mb-0">Form Tambah Barang</h4>
                    </div>
                  <div class="card-body">
                    <form action="{{ route('barang.barangAdd') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Kode Barang -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode_barang">Kode Barang</label>
                                    <input
                                        type="text"
                                        name="kode_barang"
                                        class="form-control"
                                        id="kode_barang"
                                        placeholder="Masukkan kode barang"
                                        required
                                    />
                                </div>
                            </div>

                            <!-- Nama Barang -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input
                                        type="text"
                                        name="nama_barang"
                                        class="form-control"
                                        id="nama_barang"
                                        placeholder="Masukkan nama barang"
                                        required
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Kategori (dropdown dari tabel kategori) -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori_id">Kategori</label>
                                    <select class="form-control" id="kategori_id" name="kategori_id" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Stok -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input
                                        type="number"
                                        name="stok"
                                        class="form-control"
                                        id="stok"
                                        placeholder="Jumlah stok"
                                        min="0"
                                        required
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Harga Beli -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga_beli">Harga Beli</label>
                                    <input
                                        type="number"
                                        step="0.01"
                                        name="harga_beli"
                                        class="form-control"
                                        id="harga_beli"
                                        placeholder="Masukkan harga beli"
                                        required
                                    />
                                </div>
                            </div>

                            <!-- Harga Jual -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga_jual">Harga Jual</label>
                                    <input
                                        type="number"
                                        step="0.01"
                                        name="harga_jual"
                                        class="form-control"
                                        id="harga_jual"
                                        placeholder="Masukkan harga jual"
                                        required
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea
                                name="deskripsi"
                                class="form-control"
                                id="deskripsi"
                                rows="4"
                                placeholder="Tambahkan deskripsi barang"
                            ></textarea>
                        </div>

                        <!-- Action -->
                        <div class="card-action text-end">
                            <button type="submit" class="btn btn-success" id="alert_demo_3_3">Submit</button>
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
