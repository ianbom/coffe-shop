<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>User dashboard</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="css/custom.css">


		<!--google fonts -->
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


	   <!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">

  </head>
  <style>
    .main-content {
      height: 74vh; /* Mengisi tinggi layar secara penuh */
      overflow: auto; /* Menambahkan scroll jika konten lebih besar dari tinggi layar */
      padding: 20px; /* Menambahkan padding agar konten tidak melekat pada tepi layar */
    }

    /* Anda bisa menambahkan gaya tambahan untuk elemen lain jika diperlukan */
  </style>
  <body >



<div class="wrapper">

	  <div class="body-overlay"></div>

	 <!-------sidebar--design------------>

	 <div id="sidebar">
	  <div class="sidebar-header">
		   <h3><img src="{{ asset('asset/coffee-shop.png') }}" class="img-fluid"/><span>NgopiYukkk</span></h3>
		</div>
        <ul class="list-unstyled component m-0">
            <li class="active">
            <a href="user_admin" class="dashboard " style="background-color: transparent; color:black;" ><i class="material-icons" style="color:black;">dashboard</i>User </a>
            </li>

            <li class="active">
              <a href="admin_product" class="dashboard" style="background-color: transparent; color:black;" ><i class="material-icons" style="color:black;">dashboard</i>Product </a>
              </li>

              <li class="active">
                  <a href="order_admin" class="dashboard" style="background-color: transparent; color:black;" > <i class="material-icons" style="color:black;">dashboard</i>Order </a>
                  </li>

                  <li class="active">
                      <a href="dashboard_admin" class="dashboard" style="background-color: transparent; color:black;"><i class="material-icons" style="color:black;">dashboard</i>Dashboard </a>
                      </li>

          </ul>




	 </div>

   <!-------sidebar--design- close----------->



      <!-------page-content start----------->

      <div id="content">

		  <!------top-navbar-start----------->

		  <div class="top-navbar" style="background-color:black">
		     <div class="xd-topbar">
			     <div class="row" style="background-color:black">
				     <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
					    <div class="xp-menubar">
						    <span class="material-icons text-white">signal_cellular_alt</span>
						</div>
					 </div>

					 <div class="col-md-5 col-lg-3 order-3 order-md-2">
					     <div class="xp-searchbar">
						     <form>
							    <div class="input-group">
								  <input type="search" class="form-control"
								  placeholder="Search">
								  <div class="input-group-append">
								     <button class="btn" type="submit" id="button-addon2">Go
									 </button>
								  </div>
								</div>
							 </form>
						 </div>
					 </div>


					 <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
					     <div class="xp-profilebar text-right">
						    <nav class="navbar p-0" style="background-color:black">
                                <ul class="nav navbar-nav flex-row ml-auto">

                                <li class="dropdown nav-item">
                                  <a class="nav-link" href="#" data-toggle="dropdown">
                                   <img src="{{ asset('asset/profile.png') }}" style="width:40px; border-radius:50%;"/>
                                   <span class="xp-user-live"></span>
                                  </a>
                                   <ul class="dropdown-menu small-menu">
                                      <li><a href="#">
                                      <span class="material-icons">person_outline</span>
                                      Profile
                                      </a></li>
                                      <li><a href="#">
                                      <span class="material-icons">settings</span>
                                      Settings
                                      </a></li>
                                      <li>
                                         <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }}
                                      </a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                         @csrf
                                     </form>
                                     </li>

                                   </ul>
                                </li>


                                </ul>
                             </nav>
						 </div>
					 </div>

				 </div>

				 <div class="xp-breadcrumbbar text-center">
				    <h4 class="page-title">Admin Dashboard</h4>
					<ol class="breadcrumb">
					  <li class="breadcrumb-item"><a href="#">IanBom</a></li>
					  <li class="breadcrumb-item active" aria-curent="page">Dashboard</li>
					</ol>
				 </div>


			 </div>
		  </div>
		  <!------top-navbar-end----------->


		   <!------main-content-start----------->
            <style>
                .card-container {
                 display: flex;
                    }

                .card {
                    border: none;
                    color: black;
                  margin-top: 10px;
                  margin-right: 10px; /* Optional: Untuk memberikan spasi antar card */
                  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
                            }

            </style>
		      <div class="main-content" style="">
			     <div class="row">
				    <div class="col-md-12">
					   <div class="table-wrapper">

                        <div class="card-container">
                            <div class="card card-body body4" style="background-color: #FDF7E4">
                                <p>Total Product : {{ $totalProducts }}</p>
                            </div>

                            <div class="card card-body body4" style="background-color: #FAEED1">
                                <p>Total User : {{ $totalUser }}</p>
                            </div>

                            <div class="card card-body body4" style="background-color: #DED0B6">
                                <p>Total Order : {{ $totalOrder }}</p>
                            </div>
                        </div>


                        <div class="card-container card4">
                            <style>
                            .body4{
                                display: flex;
                                justify-content: center;
                                align-items: flex-start;

                            }

                            .body4 p{
                                font-size: 30px;
                                font-weight: 20px;
                                outline: none;
                                border: none
                            }

                            </style>
                            <div class="card card-body body4 " style="background-color: #DED0B6">
                                <p>Coffee Sold : {{ $coffeeSold }}</p>
                            </div>

                            <div class="card card-body body4 " style="background-color: #FAEED1">
                                <p>Non-Coffee Sold : {{ $nonCoffeeSold }}</p>
                            </div>

                            <div class="card card-body body4 " style="background-color: #FAEED1">
                                <p>Total Sold : {{ $totalEarning }}</p>
                            </div>
                        </div>

                    <style>
                        .body2 {
                    padding: 10;
                    border-radius: 8px;
                    border-width: 1px; /* Ubah ketebalan border di sini */
                    border-style: solid;
                    background-color: rgb(255, 255, 255);
                    width: auto;
                    height: 70px;
                    display: flex;
                    justify-content: center;
                    align-items: flex-start;
            }
                    .body2 p{
                        margin-bottom: 10px;
                        text-align: center;
                        font-size: 15px;
                    }

                    </style>
                    <style>
                            .body2{
                                border: none;
                                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
                            }
                    </style>
                        <div class="card-container card2" style="border: none">
                            <div class="card card-body body2" style="background-color: #FAEED1; ">
                                <p>Coffee Product : {{ $totalCoffe }}</p>
                            </div>

                            <div class="card card-body body2 " style="background-color: #DED0B6">
                                <p>Non-Coffee Product : {{ $totalNon }}</p>
                            </div>

                            <div class="card card-body body2 " style="background-color: #FDF7E4">
                                <p>Most Purchased Products : {{ $productName }}</p>
                            </div>

                            <div class="card card-body body2 " style="background-color: #BBAB8C">
                                <p>Total Most Purchased Products : {{ $totalPurchased }}</p>
                            </div>

                        </div>
                        <style>

                            .card3{
                                width: 600px;
                                height: 600px;
                                margin-top: 50px;
                            }
                        </style>
                        <div class="card-container card3">
                            <canvas id="salesChart" width="400" height="200"></canvas>
                            <canvas id="userSales" width="400" height="200" style="margin-left: 20px"></canvas>
                        </div>

					   </div>
					</div>
                </div>
            </div>






		 <!----footer-design------------->

		 <footer class="footer" style="background-color:black">
		    <div class="container-fluid">
			   <div class="footer-in">
			      <p class="mb-0" style="background-color:black">IanBom Design . All Rights Reserved.</p>
			   </div>
			</div>
		 </footer>




	  </div>

</div>



<!-------complete html----------->






     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="js/jquery-3.3.1.slim.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>

   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var ctx = document.getElementById('salesChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($namaProduk) !!},
            datasets: [{
                label: 'Total Sold',
                data: {!! json_encode($totalSold) !!},
                backgroundColor: 'rgb(166, 139, 76)',
                borderColor: 'rgb(166, 139, 76 )',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true, // Mulai sumbu Y dari 0
                    grid: {
                        display: true, // Tampilkan garis grid di sumbu Y
                    },
                    ticks: {
                        stepSize: 1 // Langkah antar nilai di sumbu Y
                    }
                },
                x: {
                    grid: {
                        display: false // Sembunyikan garis grid di sumbu X
                    }
                }
            },
            plugins: {
                legend: {
                    display: false // Sembunyikan legenda
                },
                title: {
                    display: true,
                    text: 'Total Sold Products' // Judul grafik
                }
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('userSales').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($userNames) !!},
            datasets: [{
                label: 'Total Order',
                data: {!! json_encode($orderCounts) !!},
                backgroundColor: 'rgb(194, 163, 91)', // Warna latar belakang
                borderColor: 'rgb(194, 163, 91)', // Warna garis batang
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true, // Mulai sumbu Y dari 0
                    grid: {
                        display: true, // Tampilkan garis grid di sumbu Y
                    },
                    ticks: {
                        stepSize: 1 // Langkah antar nilai di sumbu Y
                    }
                },
                x: {
                    grid: {
                        display: false // Sembunyikan garis grid di sumbu X
                    }
                }
            },
            plugins: {
                legend: {
                    display: false // Sembunyikan legenda
                },
                title: {
                    display: true,
                    text: 'Total Orders by Users' // Judul grafik
                }
            }
        }
    });
</script>



  <script type="text/javascript">
       $(document).ready(function(){
	      $(".xp-menubar").on('click',function(){
		    $("#sidebar").toggleClass('active');
			$("#content").toggleClass('active');
		  });

		  $('.xp-menubar,.body-overlay').on('click',function(){
		     $("#sidebar,.body-overlay").toggleClass('show-nav');
		  });

	   });
  </script>





  </body>

  </html>


