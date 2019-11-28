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
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('public/vendors/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap core CSS-->
    <link href="{{asset('public/vendors/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{asset('public/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{asset('public/backend/admin/css/sb-admin.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/admin/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/common/assets/main.css')}}" rel="stylesheet">
    <!-- Page level plugin CSS-->
    <link href="{{asset('public/vendors/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <!-- CKEY Editor Plugin-->
    <script src="{{ asset('public/vendors/ckeditor/ckeditor.js') }}"></script>
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
