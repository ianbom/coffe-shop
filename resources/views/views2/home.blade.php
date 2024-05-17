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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{ asset('css/home/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home/bootstrap.min.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('css/home/boxicons.min.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('css/home/glightbox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home/swiper-bundle.min.css') }}">

  <link href="https://cdn.jsdelivr.net/boxicons/2.0.7/css/boxicons.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('css/home/style.css') }}">

</head>
<style>
    .gradient-custom {
      /* fallback for old browsers */
      background: rgb(81, 12, 12);

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right bottom, rgb(0, 0, 0), rgb(224, 6, 6));

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right bottom, rgb(73, 73, 70), rgb(23, 18, 2));
    }
  </style>
<body>

    @if (Auth::check())
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


                            @if ($user->is_admin == true)
                            <p>Admin</p>
                            @else
                            <p>Member</p>
                            @endif

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
                                    <p class="text-muted">{{ $user->created_at->format('d-m-Y') }} </p>
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
                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="submit" class="btn btn-primary mt-3">Change profile details</button>
                            </form>

                            @if (Auth::user()->is_admin == true)
                                <button type="submit" class="btn btn-primary mt-3"> <a href="/dashboard_admin" style="color: white"> Dashboard</a>  </button>
                                @endif
                            <button class="btn btn-danger" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }}
                                      </button>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                                <div class="d-flex justify-content-start">

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
          </div>
        </div>
      </div>
    @endif


  <!-- ======= Top Bar ======= -->

  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>0819148034231</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 11AM - 23PM</span></i>
      </div>
    </div>
  </div>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
       <!-- Ganti placeholder "avatar.png" dengan URL atau path ke gambar avatar -->
       @if (Auth::check())
       <img src="{{ asset('asset/steampunk_9436366.png') }}" class="rounded-circle" alt="Avatar" data-bs-toggle="modal" data-bs-target="#userProfileModal" style="cursor: pointer; width: 50px; height: 50px;">
       @else
       <img src="{{ asset('asset/steampunk_9436366.png') }}" class="rounded-circle" alt="Avatar" style="cursor: pointer; width: 50px; height: 50px;">
        @endif


      <h1 class="logo me-auto me-lg-0"><a href="index.html">NgopiYukk</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li ><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#events">Events</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="/menu">Menu</a></li>
          @if (Auth::check())
          <li><a class="nav-link scrollto" href="/orderku">Order</a></li>
          @endif

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex" style="background: transparent; color:transparent; border:none;">Cart</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <video autoplay muted loop>
        <source src="{{ asset('asset/Coffee shop promo video - Sony a7III with Sigma 24-70mm f2.8_3.mp4') }}" type="video/mp4">
        </video>
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome to <span>NgopiYukk</span></h1>
          <h2>Savor the moment with our meticulously crafted coffees, <br>
            where every cup tells a story of unparalleled richness and bliss.</h2>

          <div class="btns">

            <a href="menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
            @if (!Auth::check())
            <a href="/loginUser" class="btn-book animated fadeInUp scrollto">Login To Order</a>
        @endif
        @if (Auth::check())
            <a class="btn-book animated fadeInUp scrollto" style="border: none">Welcome {{ Auth::user()->name }} !</a>
        @endif

          </div>
        </div>


      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="{{ asset('asset/home/coffee-2572522_1920.jpg') }}" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Experience the perfection of flavors at our cafe</h3>
            <p class="fst-italic">
              Where each sip of coffee and every bite of food takes you on a journey to indulge your palate.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Cozy Place</li>
              <li><i class="bi bi-check-circle"></i> Cheap price</li>
              <li><i class="bi bi-check-circle"></i> Strategic Location</li>
            </ul>
            <p>
              Step into our café, where every cup of coffee and each dish crafted with care is an invitation to savor perfection. With an ambiance that radiates warmth and hospitality, we don’t just serve exceptional quality; we create an experience that lingers long after your visit. Join us and immerse yourself in moments of delight, here at our café, where every sip and every bite is a celebration of flavors
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">

          <p>Why You Should Come to Our Coffee</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>Strategic Location</h4>
              <p>This cafe is located in the city center, and has a large parking area</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4>Convenient Place</h4>
              <p>This cafe is very comfortable, especially for hanging out with friends</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4>Affordable Price</h4>
              <p>Experience unparalleled value, affordable prices without compromising on the premium quality we offer.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->


    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Events</h2>
          <p>Organize Your Events in our Restaurant</p>
        </div>

        <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="{{ asset('asset/home/sergei-solo-XmefirQLMfY-unsplash.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Birthday Parties</h3>
                  <div class="price">
                    <p><span>$189</span></p>
                  </div>
                  <p class="fst-italic">
                    Mark your calendars as we prepare to celebrate a momentous occasion! Join us in revelry and joy as we commemorate a birthday filled with happiness. With a party brimming with laughter, surprises, and cherished memories, let’s come together to celebrate another year of adventures, love, and aspirations along this unforgettable journey.
                    <br>
                    <br>
                    <br>
                    Embrace the joyous spirit, bask in the warmth of friendship, and raise a toast to the milestones achieved and the bright horizons yet to come in the tapestry of life
                  </p>

                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="{{ asset('asset/home/fireworks-1953253_1920.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>New Year Parties</h3>
                  <div class="price">
                    <p><span>$290</span></p>
                  </div>
                  <p class="fst-italic">
                    Get ready to bid farewell to the old and welcome the new in style! Join us as we countdown to an extraordinary New Year's Eve bash filled with glittering decorations, contagious excitement, and a jubilant atmosphere.
                    <br>
                    <br>
                    <br>
                     Let's raise our glasses to reminisce about the past year's triumphs and look ahead with hope and anticipation for the adventures that await us in the coming year. Get ready to dance, laugh, and create unforgettable memories as we usher in a fresh chapter together!
                  </p>

                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="{{ asset('asset/home/taylor-foss-eXb3Rt2b07w-unsplash.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Haloween Parties</h3>
                  <div class="price">
                    <p><span>$99</span></p>
                  </div>
                  <p class="fst-italic">
                    As the moon casts an enchanting glow upon the night sky, embark on an otherworldly journey into a realm where the mystical and the macabre intertwine. Join us for an unforgettable Halloween extravaganza that transcends the ordinary, where the boundary between our world and the ethereal realms blurs. Prepare to immerse yourself in an eerie landscape adorned with haunting decor that whispers tales of ancient spirits and forgotten folklore.
                    <br>
                    <br>
                    <br>
                    Let your imagination roam free as you adorn yourself in the most captivating costumes, each attire weaving its own narrative of ghosts, witches, and fantastical beings.                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Events Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Gallery</h2>
          <p>Some photos from Our Restaurant</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('asset/home/louis-hansel-e96ST3p7tn4-unsplash.jpg') }}" class="gallery-lightbox" data-gall="gallery-item">
                <img src="{{ asset('asset/home/louis-hansel-e96ST3p7tn4-unsplash.jpg') }}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('asset/home/wyron-a-cSVW9SnFXio-unsplash.jpg') }}" class="gallery-lightbox" data-gall="gallery-item">
                <img src="{{ asset('asset/home/wyron-a-cSVW9SnFXio-unsplash.jpg') }}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('asset/home/al-elmes-ULHxWq8reao-unsplash.jpg') }}" class="gallery-lightbox" data-gall="gallery-item">
                <img src="{{ asset('asset/home/al-elmes-ULHxWq8reao-unsplash.jpg') }}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('asset/home/kevin-schmid-ftA71vetxuo-unsplash.jpg') }}" class="gallery-lightbox" data-gall="gallery-item">
                <img src="{{ asset('asset/home/kevin-schmid-ftA71vetxuo-unsplash.jpg') }}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('asset/home/gallery/gallery-5.jpg') }}" class="gallery-lightbox" data-gall="gallery-item">
                <img src="{{ asset('asset/home/gallery/gallery-5.jpg') }}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('asset/home/gallery/gallery-6.jpg') }}" class="gallery-lightbox" data-gall="gallery-item">
                <img src="{{ asset('asset/home/gallery/gallery-6.jpg') }}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('asset/home/gallery/gallery-7.jpg') }}" class="gallery-lightbox" data-gall="gallery-item">
                <img src="{{ asset('asset/home/gallery/gallery-7.jpg') }}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('asset/home/gallery/gallery-8.jpg') }}" class="gallery-lightbox" data-gall="gallery-item">
                <img src="{{ asset('asset/home/gallery/gallery-8.jpg') }}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" >
    <div class="footer-top" style="height: 300px">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6" style="margin-left: 38%; justify-content: center; align-items: center; text-align: center;">
            <div class="footer-info" style="justify-content: center; align-items: center; text-align: center;">
              <h3 style="justify-content: center; align-items: center; text-align: center;">NgopiYukkk</h3>
              <p>
                Ian Bom Street <br>
                Blt 66012, IDN<br><br>
                <strong>Phone:</strong> 0819148034231<br>
                <strong>Email:</strong> ianianbom@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
<a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
<a href="#" class="instagram"><i class="fab fa-instagram"></i></a>


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

  <!-- Vendor JS Files -->
  {{-- <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script> --}}

  <script src="{{ asset('js/home/aos.js') }}"></script>
  <script src="{{ asset('js/home/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/home/glightbox.min.js') }}"></script>
  <script src="{{ asset('js/home/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('js/home/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('js/home/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/home/main.js') }}"></script>


</body>

</html>
