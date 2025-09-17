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
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

              @if(session('success'))
              <script>
                  Swal.fire({
                      icon: 'success',
                      title: 'Berhasil!',
                      text: '{{ session('success') }}',
                      showConfirmButton: false,
                      timer: 2000
                  });
              </script>
              @endif

              @if(session('error'))
              <script>
                  Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: '{{ session('error') }}'
                  });
              </script>
              @endif

            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              <div>
                <h3 class="fw-bold mb-3">Daftar Barang</h3>
                <h6 class="op-7 mb-2">Selamat Datang Bos!</h6>
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button data-bs-toggle="modal" data-bs-target="#modalCetak" class="btn btn-warning">
                <span class="btn-label">
                  <i class="fa fa-print"></i>
                </span>
                Cetak
              </button>
              <a href="{{route('barang.barangAdd')}}" class="btn btn-secondary ms-2">
                <span class="btn-label">
                  <i class="fa fa-plus"></i>
                </span>
                Tambah Kategori
              </a>
            </div>
            <br>
            <div class="col-md-12">
                <div class="card">
                  <div class="modal fade" id="modalCetak" tabindex="-1" role="dialog" aria-labelledby="modalCetakLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <form action="#" method="GET" target="_blank">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalCetakLabel">Cetak Laporan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="start_date">Dari Tanggal</label>
                              <input type="date" name="start_date" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="end_date">Sampai Tanggal</label>
                              <input type="date" name="end_date" class="form-control" required>
                            </div>
                          </div>
                          
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Cetak</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title">Daftar Barang</h4>
                      
                    </div>
                  </div>
                  <div class="card-body">
                    

                    <div class="table-responsive">
                    <table
                    id="add-row"
                    class="display table table-striped table-hover"
                >
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Deskripsi</th>
                            <th style="width: 12%">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($barangs as $barang)
                            <tr>
                                <td>{{ $barang->kode_barang }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->kategori->kategori ?? '-' }}</td>
                                <td>{{ $barang->stok }}</td>
                                <td>Rp {{ number_format($barang->harga_beli, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
                                <td>{{ $barang->deskripsi }}</td>
                                <td>
                                    <div class="form-button-action">
                                        <!-- Edit -->
                                        <a href="#" 
                                        class="btn btn-link btn-primary btn-lg" 
                                        title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('barang.barangDelete', $barang->id) }}" 
                                            method="POST" 
                                            class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" 
                                                    class="btn btn-link btn-danger btn-delete" 
                                                    title="Remove">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
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
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const deleteButtons = document.querySelectorAll(".btn-delete");

        deleteButtons.forEach(button => {
            button.addEventListener("click", function (e) {
                e.preventDefault();
                let form = this.closest("form");

                swal({
                    title: "Apakah Anda yakin?",
                    text: "Data pengguna ini akan dihapus permanen!",
                    icon: "warning",
                    buttons: ["Batal", "Ya, hapus!"],
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>

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
