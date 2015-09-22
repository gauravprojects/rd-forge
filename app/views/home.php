<html>
<head>
    <!-- jquery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.js"></script>

    <!-- Latest compiled and minified CSS bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript bootstrap-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- my css -->
    <link rel="stylesheet" type="text/css" href="css/index.css">

</head>
<body>
<!-- header -->
<nav class="teal">
    <div class="nav-wrapper">
        <a href="#" class="brand-logo">RD FORGE</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="collapsible.html" class="link">Logout</a></li>
        </ul>
    </div>
</nav>
<!-- header ends -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row">
        <div class="wrapper">
            <div class="card">
                <div class="row text-center">
                    <!-- for the links present inside the div -->
                    <ul id="nav-mobile">
                        <li><a href="<?php echo action('HomeController@raw_material'); ?> " class="link">Raw Material</a></li><br><br>
                        <li><a href="<?php echo action('HomeController@cutting'); ?> " class="link">Cutting </a></li><br><br><br><br><br>
                    </ul>

                </div>

                <div class="row">

                </div>		<!-- row conatining form ends here -->
            </div>		<!-- card ends here -->
        </div>		<!-- wrapper ends here -->
    </div>		<!-- row ends here -->
</div> 		<!-- col-12 ends here -->

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  margin-fix text-center">
    <div class="row-fluid">
        <div class="footer">
            &copy; Forge Metal Corp.
        </div>
    </div>
</div>
</body>
</html>