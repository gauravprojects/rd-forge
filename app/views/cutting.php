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
        <a href=" <?php echo action('HomeController@home'); ?>" class="brand-logo">RD FORGE</a>
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
                    <div class="heading">
                        <span>Cutting Entry</span>
                    </div>
                </div>

                <div class="row">
                    <form>
                        <!-- For the date of entry of raw materail
                            This date will be picket up using date() function from the machine -->

                        <!-- For the size of the coming raw material.. here size means raw material size -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Size</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Size">
                        </div>


                        <!-- Heat no, Every incoming raw material has a unique heat no -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Heat no</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Heat no">
                        </div>

                        <!-- qunanity.. this is the quantity of the cutted material -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Qunatity</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Qunatity">
                        </div>

                        <!-- Wieght per piece,, weight per piece of the cutted material -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Weight per piece</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Weight per piece">
                        </div>

                        <!-- total weight to be calculated by itself
                            total weight= quantity * Weight per piece -->

                        <!-- cutting item description  -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cutting item discription</label>
                            <input class="form-control input-lg" id="inputlg" type="text" placeholder="Cutting item description">
                        </div>

                        <!-- cutting remarks.. optional if user has some additional thing then he can mention it here -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cutting item remarks</label>
                            <input class="form-control input-lg" id="inputlg" type="text" placeholder="Cutting item remarks">
                        </div>



                        <a class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button">Submit</a>
                    </form>
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