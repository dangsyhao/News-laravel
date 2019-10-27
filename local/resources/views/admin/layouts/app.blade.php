<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
     <!-- Bootstrap core JavaScript-->
     <script src="{{asset('public/admin/vendor/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap core CSS-->
  <link href="{{asset('public/admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{asset('public/admin/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{asset('public/admin/css/sb-admin.css')}}" rel="stylesheet">
  <!-- Page level plugin CSS-->
  <link href="{{asset('public/admin/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{route('admin.dashboard')}}">Admin Dashboard</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Notification" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Notification</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Notification">
            <li>
              <a href="{{route('admin.notifi-getAdd')}}">Create Notification</a>
            </li>
            <li>
              <a href="{{route('admin.notifi-getNotifi')}}">Notifi List</a>
            </li>
          </ul>
        </li>
    
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Admin</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="{{route('admin.admin-list')}}">Admin List</a>
            </li>
            <li>
              <a href="{{route('admin.admin.date-date')}}">Time-Date</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Author" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Author</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Author">
            <li>
              <a href="{{route('admin.authorCategory-author')}}">Author Category</a>
            </li>
            <li>
              <a href="{{route('admin.authorList-author')}}">Author List</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Post" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Post</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Post">
            <li>
              <a href="{{route('admin.postCategory-post')}}">Post Category</a>
            </li>
            <li>
              <a href="{{route('admin.postList-getList')}}">Post List</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Advertise" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Advertise</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Advertise">
            <li>
                <a href="{{route('admin.advertise-getAdd')}}">Create Advertise</a>
            </li>
            <li>
                <a href="{{route('admin.advertise-getAdvertise')}}">Advertise List</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#imageGallery" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Images Gallery</span>
          </a>
          <ul class="sidenav-second-level collapse" id="imageGallery">
            <li>
                <a href="{{route('admin.imageGallery-getAdd')}}">Create Images Gallery</a>
            </li>
            <li>
                <a href="{{route('admin.imageGallery-getList')}}">Images GalleryList</a>
            </li>
          </ul>
        </li>

         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="{{route('admin.photos-getList')}}">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Photos Public</span>
          </a>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Menu Levels</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
          <li>
                <a href="{{route('admin.navBar-getAdd')}}">Create Navigation Bar</a>
            </li>
            <li>
                <a href="{{route('admin.navBar-getNavBar')}}">Navigation Bar List</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
    
        <li class="nav-item">
          <a  type='button 'class="btn btn-danger " href="{{route('admin.logout')}}"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    
         <!-- /.content-->

         @yield('content')

        <!-- /.content-->

    
   </div>
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('public/admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('public/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('public/admin/js/sb-admin.min.js')}}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{asset('public/admin/vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('public/admin/vendor/datatables/dataTables.bootstrap4.js')}}"></script>

  </div>
</body>

</html>
