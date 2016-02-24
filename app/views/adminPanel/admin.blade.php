@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Admin Panel</span>
                        </div>
                    </div>
                    <ul>
                    <li><a href="{{  action('adminPageController@show_reports');}} " class="col-xs-12 col-sm-12 col-md-12 col-lg-4 waves-effect waves-light btn link">Reports</a></li>
                        <li><a href="{{ action('masterController@showManufactures'); }}" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 waves-effect waves-light btn link">Manufacturers</a></li>
                        <li><a href="{{ action('masterController@showGrades'); }}" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 waves-effect waves-light btn link">Material Grades</a></li>
                        <li><a href="{{ action('masterController@showSizes'); }}" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 waves-effect waves-light btn link">Raw Material Sizes</a></li>
                        <li><a href="{{ action('rawMaterialController@available'); }}" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 waves-effect waves-light btn link">Available Raw Material</a></li>
                        <li><a href="{{ action('cuttingPageController@available'); }}" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 waves-effect waves-light btn link">Available Cutting Material</a></li>
                        <li><a href="{{ action('masterController@showStandardSizes'); }}" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 waves-effect waves-light btn link">Standard Sizes</a></li>
                        <li><a href="{{ action('masterController@showPressure'); }}" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 waves-effect waves-light btn link">Standard Pressures</a></li>
                        <li><a href="{{ action('masterController@showSchedule'); }}" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 waves-effect waves-light btn link">Standard Schedules</a></li>
                        <li><a href="{{ action('masterController@showType'); }}" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 waves-effect waves-light btn link">Description Types</a></li>
                        <li><a href="{{ action('masterController@showMaterialType'); }}" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 waves-effect waves-light btn link">Material Types</a></li>
                        <li><a href="{{ action('masterController@showStatus'); }}" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 waves-effect waves-light btn link">Status</a></li>

                    </ul>
                    <div class="row">

                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

@stop