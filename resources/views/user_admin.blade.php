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
  <body>



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
                            <form action="{{ route('index_user') }}" method="GET" style="margin-right: 10px;">
							    <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search">
								  <div class="input-group-append">
                                    <button type="submit" id="button-addon2" class="btn" style="outline: none;">Go    </button>
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
				    <h4 class="page-title">User</h4>
					<ol class="breadcrumb">
					  <li class="breadcrumb-item"><a href="#">IanBom</a></li>
					  <li class="breadcrumb-item active" aria-curent="page">Dashboard</li>
					</ol>
				 </div>


			 </div>
		  </div>
		  <!------top-navbar-end----------->


		   <!------main-content-start----------->

		      <div class="main-content">
			     <div class="row">
				    <div class="col-md-12">
					   <div class="table-wrapper">

					   <div class="table-title" style="background-color:black">
					     <div class="row" style="background-color:black">
						     <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
							    <h2 class="ml-lg-2">Manage User</h2>
							 </div>
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">

							 </div>
					     </div>
					   </div>

					   <table class="table table-striped table-hover">
					      <thead>
						     <tr>
							 <th>
							 </label></th>
                             <th>User Id</th>
							 <th>Name</th>
							 <th>Email</th>
							 <th>Role</th>
							 <th style=" width:150px">Join at </th>
							 </tr>
						  </thead>

						  <tbody>
                            @if($cari->isEmpty())
                            @foreach ($user as $user)


                            <tr>
                           <th><span class="custom-checkbox">
                           </th>

                           <th>{{ $user->id }}</th>
                           <th>{{ $user->name }}</th>
                           <th>{{ $user->email }}</th>
                           <th>{{  $user->is_admin ? 'Admin' : 'Member'  }}</th>
                           <th>{{ $user->created_at->format('d-m-Y') }} </th>
                           </tr>

                           @endforeach
                            @else
                            @foreach ($cari as $usr)


						      <tr>
							 <th><span class="custom-checkbox">
							 </th>

                             <th>{{ $usr->id }}</th>
							 <th>{{ $usr->name }}</th>
							 <th>{{ $usr->email }}</th>
							 <th>{{  $usr->is_admin ? 'Admin' : 'Member'  }}</th>
							 <th>{{ $usr->created_at->format('d-m-Y') }} </th>
							 </tr>

                             @endforeach
                            @endif

						  </tbody>


					   </table>


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


