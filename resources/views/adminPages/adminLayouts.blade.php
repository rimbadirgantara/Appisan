<!DOCTYPE html>
<!--
secure by 
  ______    __     ______        __       __   ___  
 /" _  "\  |" \   /" _  "\      /""\     |/"| /  ") 
(: ( \___) ||  | (: ( \___)    /    \    (: |/   /  
 \/ \      |:  |  \/ \        /' /\  \   |    __/   
 //  \ _   |.  |  //  \ _    //  __'  \  (// _  \   
(:   _) \  /\  |\(:   _) \  /   /  \\  \ |: | \  \  
 \_______)(__\_|_)\_______)(___/    \___)(__|  \__) Dev
 No one can hack this site :p
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{$title}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="adminTemplate/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminTemplate/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">

  @yield('content')

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="adminTemplate/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminTemplate/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminTemplate/dist/js/adminlte.min.js"></script>
</body>
</html>
