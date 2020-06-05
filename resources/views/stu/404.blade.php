<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="{{ asset('/storage/images/logo.jpg') }}" />
  <title>UENR INTERNSHIP </title>

  <!-- Custom fonts for this template-->

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">


  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" style=" margin-top: 45%; margin-left: 30%";>

          <!-- 404 Error Text -->
          <div class="text-center" ">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Page Not Found</p>
            <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>

            @if (auth()->guard('main_cordinator')->check())

                <a href="/main-cordinator/dashboard">&larr; Back to Dashboard</a>
                
            @elseif(auth()->guard('cordinator')->check())

                <a href="/cordinator/dashboard">&larr; Back to Dashboard</a>

            @elseif(auth()->guard('supervisor')->check())

                <a href="/supervisor/dashboard">&larr; Back to Dashboard</a>

            @elseif(auth()->check())

                <a href="/dashboard">&larr; Back to Dashboard</a>

            @else

                <a href="/">&larr; Back to Welcome Page</a>
    
            @endif
          
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    <!-- Footer -->
     <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer> 
      <!-- End of Footer --> 

    </div>
    <!-- End of Content Wrapper -->

  </div>
 
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
