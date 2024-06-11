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
     @php
    $total_price = 0;
    @endphp
    <style>
    /* Gaya untuk modal */
    .modal-content {
        background-color: #fff;
        border-radius: 10px;
    }

    .modal-header {
        background-color: #f0f0f0;
        border-bottom: none;
    }

    .modal-title {
        color: #333;
    }

    .modal-body {
        padding: 20px;
    }

    .list-group-item {
        border: none;
        padding: 15px 0;
        align-items: center;
    }

    .product-image {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 50%;
        margin-right: 20px;
    }

      /* Gaya untuk modal */
      .modal-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: none;
        padding: 20px;
        background-color: #f0f0f0;
    }

    .total-price {
        color: #333;
        font-weight: bold;
    }

    .btn-primary {
        border-radius: 5px;
        padding: 10px 20px;
        font-weight: bold;
        background-color: #3498db;
        color: #fff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #2980b9;
    }
</style>


      <!-- Modal Cart Belanja -->
      <div class="modal fade custom-cart" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title " id="cartModalLabel" >Cart Belanja</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @foreach ($carts as $cart)
            <div class="modal-body">
              <ul class="list-group" id="produkList">

                <li class="list-group-item d-flex justify-content-between align-items-center" data-index="0">
                  <img src="{{ url('storage/' . $cart->product->image) }}" alt="menu" class="product-image">
                  <p> {{ $cart->product->name }}</p>
                    <form action="{{ route('update_cart', $cart) }}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="tombol-aksi">
                            <input type="number" class="form-control" value="{{ $cart->amount }}" name="amount">
                            <button class="btn btn-light btn-update" type="submit">Update</button>
                        </div>
                    </form>
                    <form action="{{ route('delete_cart_menu', $cart) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                </li>
              </ul>
            </div>

            @php
            $total_price += $cart->product->price * $cart->amount;
        @endphp
            @endforeach

            <div class="modal-footer">
                <div class="total-price">
                    Total Harga: Rp {{ $total_price }}
                </div>
                <form action="{{ route('checkout_jadi') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary" @if ($carts->isEmpty()) disabled @endif>Checkout</button>
                </form>
            </div>

            </div>
          </div>
        </div>
      </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="/home">NgopiYukk</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="/home" style="margin-left: 150px">Home</a></li>
          <li><a class="nav-link scrollto" href="/home">About</a></li>
          <li><a class="nav-link scrollto" href="/home">Events</a></li>
          <li><a class="nav-link scrollto" href="/home">Gallery</a></li>
          <li><a class="nav-link scrollto" href="/menu">Menu</a></li>
          @if (Auth::check())
          <li><a class="nav-link scrollto" href="/orderku">Order</a></li>
          @endif

            <style>
                .search-input-1 {
  background: #f2f2f2;
  border: 1px solid #ccc;
  padding-left: 8px;
  border-radius: 4px;
  margin-left: 10px;
  margin-right: 10px;
  width: 200px; /* Sesuaikan lebar input sesuai kebutuhan */
  color: white;
}

/* Gaya untuk tombol filter */
.filter-1 {

  background: none;
  color: white;
  padding: 8px 12px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  outline: none;
  transition: background 0.3s ease; /* Efek transisi hover */
}

/* Efek hover pada tombol filter */
.filter-1:hover {
  color: rgb(210, 185, 40); /* Ubah warna saat dihover */
}
            </style>

          <li><form action="{{ route('menu') }}" method="GET" style="margin-left:100px;">
            <input type="text" name="search" class="search-input-1" placeholder="Search Name " style="background:none">

            <button type="submit" class="filter-1" style="outline: none;"><span class="bi bi-search"></span>    </button>
        </form></li>

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
          <h2>Menu</h2>
          <p>Check Our Tasty Menu</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
                <form action="{{ route('menu') }}" method="GET" style="margin-right: 20px;">
                    <a href="{{ route('menu') }}" style="margin-right: 10px">All Products</a>
                    <a href="{{ route('menu', ['category' => 1]) }} " style="margin-right: 20px">Coffee</a>
                    <a href="{{ route('menu', ['category' => 0]) }}" style="margin-right: 20px">Non-Coffee</a>
            </form>
            </ul>
          </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
            @if($cari->isEmpty())
            @foreach ($product as $product)
          <div class="col-lg-6 menu-item filter-starters">
        <img src="{{ url('storage/' . $prod->image) }}" class="menu-img" alt="image menu">
              <a href="{{ url('storage/' . $prod->image) }}">{{ $product->name }}</a><span>$Rp {{ $product->price }}</span>
            </div>
            <div class="menu-ingredients">
              <p style="color: white;">{{ $product->description }}</p>
              <p style="color: white;"> Stock : {{ $product->stock }}</p>
              <p>Category: {{ $product->category ? 'Coffe' : 'Non-Coffe' }}   </p>
              <form action="{{ route('add_to_cart_menu', $product) }}" method="post">
                <input type="number" class="form-control" aria-describedby="basic-addon2" name="amount" value=1 style="display: none">
                        <button class="btn btn-outline-secondary" type="submit">Add to cart</button>
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-append" style="margin-left: 270px">
                        <input type="number" class="form-control" aria-describedby="basic-addon2" name="amount" value=1 style="display: none">
                        <button class="btn btn-outline-secondary" type="submit"><span class="bi bi-cart"></span></button>
                    </div>
                </div>
            </form>
            </div>
          </div>
          @endforeach

          @else

          @foreach ($cari as $prod)
    <div class="col-lg-6 menu-item filter-starters">
        <img src="{{ $prod->image) }}" class="menu-img" alt="image menu">
        <div class="menu-content">
            <a href="{{ url('storage/' . $prod->image) }}"> {{ $prod->name }}</a><span>Rp {{ $prod->price }}</span>
        </div>
        <div class="menu-ingredients" style="display: flex; align-items: center;">
            <div>
                <p style="color: white;">{{ $prod->description }}</p>
                <p style="color: white;"> Stock : {{ $prod->stock }}</p>
                <p>Category: {{ $prod->category ? 'Coffee' : 'Non-Coffee' }}</p>
            </div>
            @if (Auth::check())

            <form action="{{ route('add_to_cart_menu', $prod) }}" method="post">
                @csrf
                <div class="input-group" style="margin-left: 270px">
                    <input type="number" class="form-control" aria-describedby="basic-addon2" name="amount" value=1 style="display: none">
                    <button class="btn btn-outline-secondary" type="submit"><span class="bi bi-cart"></span></button>
                </div>
            </form>
            @endif
        </div>
    </div>
@endforeach

          @endif





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
    document.getElementById("imageLink").addEventListener("click", function(event) {
      event.preventDefault();
      document.getElementById("imageContainer").style.display = "block";
    });
  </script>
</body>

</html>
