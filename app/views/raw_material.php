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
                        <span>Raw Material Entry</span>
                    </div>
                </div>

                <div class="row">
                    <form>
                        <!-- For recipt number of the material coming from outside -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Receipt Code</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Receipt Number">
                        </div>

                        <!-- For the date of entry of raw materail
                            This date will be picket up using date() function from the machine -->

                        <!-- For the size of the coming raw material -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Size</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Size">
                        </div>

                        <!-- Wieght, weight of the incmomh material -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Weight</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Weight">
                        </div>

                        <!-- Manufacturer's name -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Manufacturer</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Manufacturer">
                        </div>

                        <!-- Heat no, Every incoming raw material has a unique heat no -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Heat no</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Heat no">
                        </div>

                        <!-- Purchase order no -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Purchase Order Number</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Purchase order no">
                        </div>

                        <!-- Purchase order date -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Purchase Order Date</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Purcahse Order date">
                        </div>

                        <!-- Invoice Number -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Invoice no</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="invoice no">
                        </div>

                        <!-- Inovice date -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Invoice date</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Inoice date">
                        </div>

                        <!-- Material grade, this will be prementioned, using dropdowm they will be shown
                        waiting for sample data to work further on this -->
                        <div class="form-group">
                            <label for="exampleInputPassword1">Material Grade</label>
                            <select class="form-control">
                                <option>Grade 1</option>
                                <option>Grade 2</option>
                                <option>Grade 3</option>
                                <option>Grade 4</option>
                                <option>Grade 5</option>
                            </select>
                        </div>

                        <!-- raw material type, these sample types will be provided.. to be implemented using dropdown -->
                        <div class="form-group">
                            <label for="exampleInputPassword1">Material Type</label>
                            <select class="form-control">
                                <option>Type 1</option>
                                <option>Type 2</option>
                                <option>Type 3</option>
                                <option>Type 4</option>
                                <option>Type 5</option>
                            </select>
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