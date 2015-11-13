<html>
<head>
    <!-- jquery -->
    {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.js') }}

            <!-- Latest compiled and minified CSS bootstrap-->
    {{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') }}


            <!-- Optional theme -->
    {{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css') }}

            <!-- Latest compiled and minified JavaScript bootstrap-->
    {{ HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css') }}

            <!-- Compiled and minified CSS -->
    {{ HTML::style('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css') }}

            <!-- Compiled and minified JavaScript -->
    {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js') }}


    {{ HTML::style('https://fonts.googleapis.com/icon?family=Material+Icons') }}


            <!-- fontawesome -->
    {{ HTML::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') }}

            <!-- font -->
     {{ HTML::style('https://fonts.googleapis.com/css?family=PT+Sans') }}
            <!-- my css -->
    {{ HTML::style('css/index.css') }}

</head>
<body>
<!-- header -->
<nav class="teal">
    <div class="nav-wrapper">
        <a href="<?php echo action('homePageController@index'); ?>" class="brand-logo">RD FORGE</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="{{ route('search.index'); }}" >Search Panel</a> </li>
            <li><a href="{{ route('admin.page'); }}">Admin Panel</a> </li>
            <li><a href="#" class="link">Logout</a></li>
        </ul>
    </div>
</nav>
<!-- header ends -->

<!-- CUSTOMIZED DATA FOR THE PAGE STARTS HERE...........  -->

@yield('links_data')

<!-- CUSTOMIZED DATA ENDS HERE... rest everything in this page will remain same..   -->

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  margin-fix text-center footerWrap">
    <div class="row-fluid">
        <div class="footer">
            &copy; Forge Metal Corp.
        </div>
    </div>
</div>
</body>
</html>