<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" cosntent="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DashBoard</title>

    <!-- Bootstrap core CSS-->
    <link href="{{asset('/vendors/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{asset('/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('/vendors/jquery/jquery.min.js')}}"></script>
    <!-- Custom styles for this template-->
    <link href="{{asset('/backend/admin/css/sb-admin.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/common/assets/main.css')}}" rel="stylesheet">
    <!-- Page level plugin CSS-->
    <link href="{{asset('/vendors/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <!-- CKEY Editor Plugin-->
    <script src="{{ asset('/vendors/ckeditor/ckeditor.js') }}"></script>
    <link href="{{asset('/backend/author/custom.css')}}" rel="stylesheet">
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
