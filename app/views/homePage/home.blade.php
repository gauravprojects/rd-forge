@extends('layouts.master')


@section('links_data')

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row">
        <div class="wrapper wrapperHome">
            <div class="card forRowfix">
                <div class="row text-center">
                    <!-- for the links present inside the div -->
                    <ul id="nav-mobile">
                        <li><a href="<?php  echo action('rawMaterialController@index'); ?> " class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Raw Material</a></li>
                        <a href="<?php  echo action('rawMaterialController@show'); ?> " class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Raw Material Report</a><br><br>
                        <li><a href="<?php echo action('cuttingPageController@index'); ?> " class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Cutting </a></li><br><br><br><br><br>
                    </ul>
                </div>
                <div class="row">
                </div>		<!-- row conatining form ends here -->
            </div>		<!-- card ends here -->
        </div>		<!-- wrapper ends here -->
    </div>		<!-- row ends here -->
</div> 		<!-- col-12 ends here -->
@stop
