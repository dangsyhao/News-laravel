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
                        <a  class="btn btn-outline-primary btn-sm" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- include JavaScript/Jquery for page-->
        <script src="{{url('/vendors/jquery/jquery.min.js')}}"></script>
        <script src="{{url('/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{url('/vendors/jquery-easing/jquery.easing.min.js')}}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{url('/backend/common/assets/main.js')}}"></script>
        <script src="{{url('/backend/admin/js/sb-admin.min.js')}}"></script>
        <script src="{{url('/backend/admin/js/main.js')}}"></script>
        <script src="{{url('/vendors/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
        <!-- Custom scripts for vendor pages-->
        <script src="{{url('/vendors/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{url('/vendors/datatables/dataTables.bootstrap4.js')}}"></script>
        <!-- Page level plugin JavaScript-->
        <script src="{{asset('/vendors/chart.js/Chart.min.js')}}"></script>
        <!-- Custom scripts for this page-->
        <script src="{{asset('/backend/admin/js/sb-admin-charts.min.js')}}"></script>
    </body>
</html>