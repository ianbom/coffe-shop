<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Coffee BOM</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{ asset('css/home/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home/boxicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home/glightbox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home/swiper-bundle.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('css/home/style.css') }}">

</head>
    <style>
         /* Gaya kustom untuk cart belanja */
    .custom-cart .modal-dialog {
      max-width: 800px; /* Lebar maksimum modal */
      margin: 30px auto; /* Atur margin untuk memposisikan modal di tengah */
    }
    .jumlah-produk {
      width: 40px; /* Lebar input jumlah produk */
      text-align: center;
    }
    .btn-update {
      padding: 0.15rem 0.3rem; /* Padding tombol hapus */
      font-size: 0.8rem; /* Ukuran font tombol hapus */
      margin-right: 10px; /* Jarak kanan tombol hapus */
    }
    .tombol-aksi {
      display: flex;
      align-items: center;
    }
    .harga-barang {
      margin-left: auto; /* Memindahkan harga ke sisi kanan */
    }
    /* Gaya untuk gambar produk */
    .product-image {
      width: 50px; /* Atur lebar gambar produk */
      height: 50px; /* Atur tinggi gambar produk */
      object-fit: cover; /* Biar gambar tidak terdistorsi */
      margin-right: 10px; /* Atur margin kanan gambar */
    }
    </style>
<body>


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">NgopiYukk</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li ><a class="nav-link scrollto active" href="/home">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#events">Events</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <!-- <li><a class="nav-link scrollto" href="#specials">Specials</a></li> -->
          <li><a class="nav-link scrollto" href="menu.html">Menu</a></li>
          <li><a class="nav-link scrollto" href="#chefs">Order</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="" class="book-a-table-btn scrollto d-none d-lg-flex " data-bs-toggle="modal" data-bs-target="#cartModal">Cart</a>

    </div>
  </header><!-- End Header -->
    <br>
    <br>
    <br>
    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Profile</h2>
          <p>User Profile Information</p>
        </div>


        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userProfileModal">
            Open User Profile
          </button>

          <div class="modal fade" id="userProfileModal" tabindex="-1" aria-labelledby="userProfileModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content" style="height: 50vh">
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            @endif

                          <div class="col col-lg-6 mb-4 mb-lg-0" >
                            <div class="card mb-3" style="border-radius: .5rem; border:2px solid black; width:100vh; display:flex;">
                              <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-white"
                                  style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">

                                  <form action="{{ route('edit_profile') }}" method="post">
                                    @csrf

                                    <img src="{{ asset('asset/60111.jpg') }}"
                                    alt="Avatar" class="img-fluid my-5" style="width: 80px; border-radius: 40px" />

                                        <style>
                                            .text-name{
                                                color: rgb(255, 255, 255);
                                                background: none;
                                            }
                                        </style>

                                 <div class="form-group">
                                    <input class="text-name form-control" name="name" placeholder="Name" style="border:none; text-align: center; display: block; margin: 0 auto; background: none; outline: none; color: white;" value="{{ $user->name }}">
                                </div>
                                  <p  value="{{ $user->is_admin ? 'Admin' : 'Member' }}"></p>
                                  <i class="far fa-edit mb-5"></i>
                                </div>
                                <div class="col-md-8">
                                  <div class="card-body p-4">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <h6>User Profile</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                      <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                                        </div>
                                      </div>
                                      <div class="col-6 mb-3">
                                        <h6>Join at</h6>
                                        <p class="text-muted">12/10/2023</p>
                                      </div>
                                    </div>
                                    <h6>Account</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                      <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>

                                      </div>
                                      <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label>Confirm password</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>
                                      </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Change profile details</button>
                                </form>
                                    <div class="d-flex justify-content-start">
                                      <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                      <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                      <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
              </div>
            </div>
          </div>









      </div>
    </section><!-- End Menu Section -->


  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6" style="margin-left: 38%; justify-content: center; align-items: center; text-align: center;">
            <div class="footer-info" style="justify-content: center; align-items: center; text-align: center;">
              <h3 style="justify-content: center; align-items: center; text-align: center;">Restaurantly</h3>
              <p>
                Ian Bom Street <br>
                Blt 66012, IDN<br><br>
                <strong>Phone:</strong> 0819148034231<br>
                <strong>Email:</strong> ianianbom@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-xing"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>


              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Ian Bom</span></strong>. Bismillah ini jadi
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
        Designed by <a >IanBom</a>
      </div>
    </div>
  </footer><!-- End Footer -->


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="{{ asset('js/home/aos.js') }}"></script>
  <script src="{{ asset('js/home/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/home/glightbox.min.js') }}"></script>
  <script src="{{ asset('js/home/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('js/home/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('js/home/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/home/main.js') }}"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    $('#userProfileModal').on('show.bs.modal', function (event) {
  // Temukan card yang ingin Anda masukkan ke dalam modal
  var cardContent = $('.card.mb-3');

  // Temukan modal-body dan masukkan konten card ke dalamnya
  var modal = $(this);
  modal.find('.modal-body').html(cardContent);
});

  </script>

</body>

</html>
