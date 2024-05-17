<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Coffee BOM</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/home/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home/boxicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home/glightbox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home/swiper-bundle.min.css') }}">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('css/home/style.css') }}">

</head>
  <style>
  .table {
  background-color: transparent !important;
}

.table thead th,
.table tbody th,
.table tbody td {
  color: white;
  background-color: rgba(255, 255, 255, 0); /* Ubah nilai alpha (0 hingga 1) sesuai kebutuhan transparansi */
}

  </style>
<body>

  {{-- ORDER MODAL --}}

  <style>
    .gradient-custom {
        background: #cd9cf200;
        background: -webkit-linear-gradient(to top left, rgba(205, 156, 242, 0), rgba(246, 243, 255, 0));
        background: linear-gradient(to top left, rgba(205, 156, 242, 0), rgba(246, 243, 255, 0));
        background: transparent;
    }

    .modal-content {
    border: none;
}

.btn-show-qr {
        background-color: transparent;
        color: black;
        border: none;
    }

    /* Hover state */
    .btn-show-qr:hover {
        background-color: transparent;
        color: rgb(38, 131, 193);
        text-decoration: underline;
    }
</style>

    @php
        $total_price= 0;
    @endphp





  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">NgopiYukk</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li ><a class="nav-link scrollto active" href="/">Home</a></li>
          <li><a class="nav-link scrollto" href="/">About</a></li>
          <li><a class="nav-link scrollto" href="/">Events</a></li>
          <li><a class="nav-link scrollto" href="/">Gallery</a></li>

          <li><a class="nav-link scrollto" href="/menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="">Order</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex" style="background: transparent; color:transparent; border:none;">Cart</a>

    </div>
  </header><!-- End Header -->
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
    <br>
    <br>
    <br>
    <!-- ======= Menu Section ======= -->

    <section id="menu" class="menu section-bg">
      <div class="" data-aos="fade-up">

        <div class="section-title">
          <h2 style="margin-left: 14%; margin-top: 20px;">Order</h2>
          <p style="margin-left: 14%;">Check Your Order Here</p>
        </div>

        <div class="" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-6 menu-item " style="margin-top: 10px;">
            <div class="container" style="margin-left: 25%;">
              <div class="row">
                <div class="col">
                  <table class="table" style="width: 155%;">
                    <thead>
                      <tr style="background-color: rgb(82, 66, 38)">
                        <th scope="col" class="col" style="width: 25%;">Order Id</th>

                        <th scope="col" class="col" style="width: 25%;">Status</th>
                        <th scope="col" class="col" style="width: 25%;">Date</th>
                        <th scope="col" class="col" style="width: 25%;">Total</th>
                      </tr>
                    </thead>



                    @foreach ($orders as $order)
    @php
        $total_price = 0; // Set total harga awal menjadi 0 untuk setiap order
    @endphp

    @foreach ($order->transactions as $transaction)
        @php
            // Hitung total harga untuk setiap transaksi dalam satu order
            $total_price += $transaction->product->price * $transaction->amount;
        @endphp
    @endforeach

                        <!-- Display the total order price -->
                    <tbody>

                      <tr>
                        <td class="col" style="width: 2%;"><a href="{{ route('show_order_jadi', $order) }}"> {{ $order->id }} </a></td>

                        <td class="col" style="width: 2%;">
                            @if ($order->is_paid == true)
                                <p class="card-text" style="color: #ffffff">Paid</p>
                            @else
                                @if($order->payment_receipt)
                                    <p class="card-text" style="color: #ffffff">Pending</p>
                                @else
                                    <p class="card-text" style="color: #ffffff">Unpaid</p>
                                @endif
                            @endif
                        </td>
                        <td class="col" style="width: 2%;">{{ $order->created_at->format('d-m-Y') }}</td>
                        <td class="col" style="width: 2%;">Rp. {{ $total_price }} </td>

                      </tr>

                    </tbody>
                    @endforeach
                  </table>
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
  {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-D0zPNE6IEXIQ6vq+NB5QgvH9F89B9fW5+0BCW+oRx2Gx0XJXQkNpCIZfX0v0DSgD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> --}}
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-D0zPNE6IEXIQ6vq+NB5QgvH9F89B9fW5+0BCW+oRx2Gx0XJXQkNpCIZfX0v0DSgD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>
