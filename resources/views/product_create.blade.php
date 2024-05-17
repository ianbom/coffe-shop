<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Product dashboard</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	    <!----css3---->

        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

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
            <a href="/user_admin" class="dashboard " style="background-color: transparent; color:black;" ><i class="material-icons" style="color:black;">dashboard</i>User </a>
            </li>

            <li class="active">
              <a href="/admin_product" class="dashboard" style="background-color: transparent; color:black;" ><i class="material-icons" style="color:black;">dashboard</i>Product </a>
              </li>

              <li class="active">
                  <a href="/order_admin" class="dashboard" style="background-color: transparent; color:black;" > <i class="material-icons" style="color:black;">dashboard</i>Order </a>
                  </li>

                  <li class="active">
                      <a href="/dashboard_admin" class="dashboard" style="background-color: transparent; color:black;"><i class="material-icons" style="color:black;">dashboard</i>Dashboard </a>
                      </li>

          </ul>




	 </div>

   <!-------sidebar--design- close----------->



      <!-------page-content start----------->

      <div id="content">

		  <!------top-navbar-start----------->

		  <div class="top-navbar" style="background-color: black">
		     <div class="xd-topbar">
			     <div class="row" style="background-color: black">
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
						    <nav class="navbar p-0" style="background-color: black">
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
									 <li><a href="#">
									 <span class="material-icons">logout</span>
									 Logout
									 </a></li>

								  </ul>
							   </li>


							   </ul>
							</nav>
						 </div>
					 </div>

				 </div>

				 <div class="xp-breadcrumbbar text-center">
				    <h4 class="page-title">Product</h4>
					<ol class="breadcrumb">
					  <li class="breadcrumb-item"><a href="#">IanBom</a></li>
					  <li class="breadcrumb-item active" aria-curent="page">Dashboard</li>
					</ol>
				 </div>


			 </div>
		  </div>
		  <!------top-navbar-end----------->


		   <!------main-content-start----------->

		      <div class="main-content" >
			     <div class="row">
				    <div class="col-md-12">
					   <div class="table-wrapper">

					   <div class="table-title" style="background-color: black">
					     <div class="row" style="background-color: black">
						     <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
							    <h2 class="ml-lg-2">Manage Product</h2>
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
							 <th style="font-weight: bold">Name</th>
                             <th style="font-weight: bold">Image</th>
							 <th style="font-weight: bold">Price</th>
							 <th style="font-weight: bold">Stock</th>
							 <th style="font-weight: bold">Category</th>
                             <th style="font-weight: bold">Description</th>
							 </tr>
						  </thead>

						  <tbody>
                            <form action="{{ route('store_product_admin') }}" method="post" enctype="multipart/form-data">
                                @csrf
						    <tr>
							<th>
							</th>
							<th>
                                <input type="text" name="name" placeholder="Name" class="form-control">
                                </th>
                            <th>
                                <input type="file" name="image" class="form-control">
                            </th>

							<th>
                                <input type="number" name="price" placeholder="Price" class="form-control">
                                </th>
							<th>
                                <input type="number" name="stock" placeholder="Stock" class="form-control">
                                </th>
							<th>

                                <input type="radio" name="category" value="1" checked > Coffe
                                <br>
                                <input type="radio" name="category" value="0" > Non
                            </th>

                            <th>
                                <input type="text" name="description" placeholder="Description" class="form-control">
                            </th>
							<th>
                                <style>
                                    .btnsub{
                                        height: auto;
                                        width: auto;
                                        font-size: 10px;
                                    }
                                </style>
							    <button type="submit" class="btn btn-primary btnsub">Add</button>
							 </th>
							 </tr>

                            </form>
						  </tbody>


					   </table>

					   </div>
					</div>


									   <!----add-modal start--------->
		<div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Employees</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
			<label>Name</label>
			<input type="text" name="name" placeholder="Name" class="form-control">
		</div>
		<div class="form-group">
			<label>Description</label>
			<input type="text" name="description" placeholder="Description" class="form-control">
		</div>
		<div class="form-group">
			<label>Price</label>
			<input type="number" name="price" placeholder="Price" class="form-control">
		</div>
		<div class="form-group">
			<label>Stock</label>
			<input type="number" name="stock" placeholder="Stock" class="form-control">
		</div>
		<div class="form-group">
			<label>Image</label>
			<input type="file" name="image" class="form-control">
		</div>
		<div class="form-group">
			<label for="category">Category:</label>
			<input type="radio" name="category" value="1" checked > Coffe
			<input type="radio" name="category" value="0" > Non-Coffe
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success">Add</button>
      </div>
    </div>
  </div>
</div>

					   <!----edit-modal end--------->





				   <!----edit-modal start--------->


					   <!----edit-modal end--------->


					 <!----delete-modal start--------->
		<div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this Records</p>
		<p class="text-warning"><small>this action Cannot be Undone,</small></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success">Delete</button>
      </div>
    </div>
  </div>
</div>

					   <!----edit-modal end--------->




			     </div>
			  </div>

		    <!------main-content-end----------->



		 <!----footer-design------------->

		 <footer class="footer" style="background-color: black">
		    <div class="container-fluid">
			   <div class="footer-in " style="background-color: black">
			      <p class="mb-0">IanBom Design . All Rights Reserved.</p>
			   </div>
			</div>
		 </footer>




	  </div>

</div>



<!-------complete html----------->








  </body>
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

   <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('asset/js/jquery-3.3.1.min.js') }}"></script>
   <script src="{{ asset('asset/js/jquery-3.3.1.slim.min.js') }}"></script>
   <script src="{{ asset('asset/js/popper.min.js') }}"></script>

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
  </html>


