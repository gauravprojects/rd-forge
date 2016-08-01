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
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 " id="button" >
                            <a class="waves-effect waves-light btn link" href="{{  action('adminPageController@show_reports');}}"><i class="medium material-icons">list</i>&nbsp;<span style="width:550px;">Reports</span></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4" id="button-1">
                            <a class="waves-effect waves-light btn link" href="{{ action('masterController@showSizes'); }}" ><i class="material-icons">format_size</i>&nbsp; Raw Material Sizes</a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 ">
                            <a class="waves-effect waves-light btn link" href="{{ action('rawMaterialController@available'); }}" ><i class="medium material-icons">tab_unselected</i>&nbsp; Available Raw Material</a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 ">
                            <a class="waves-effect waves-light btn link" href="{{ action('cuttingPageController@available'); }}" ><i class="material-icons">content_cut</i> &nbsp;Available Cutting Material</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 ">
                            <a class="waves-effect waves-light btn link" href="{{ action('masterController@showManufactures'); }}" ><i class="material-icons">gavel</i>&nbsp; Manufacturers</a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 ">
                            <a class="waves-effect waves-light btn link" href="{{ action('masterController@showGrades'); }}" ><i class="material-icons">grade</i>&nbsp;Material Grades</a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <a class=" waves-effect waves-light btn link" href="{{ action('ForgingController@available'); }}" ><i class="material-icons">select_all</i>&nbsp;Available Forging Material</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <a href="{{ action('masterController@showStandardSizes'); }}" class=" waves-effect waves-light btn link"><i class="material-icons">format_size</i>&nbsp; Standard Sizes</a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <a href="{{ action('masterController@showPressure'); }}" class=" waves-effect waves-light btn link"><i class="material-icons">web_asset</i>&nbsp; Standard Pressures</a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <a href="{{ action('masterController@showSchedule'); }}" class=" waves-effect waves-light btn link"><i class="material-icons">schedule</i>&nbsp;Standard Schedules</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <a href="{{ action('masterController@showType'); }}" class=" waves-effect waves-light btn link"><i class="medium material-icons">description</i>&nbsp;Description Types</a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <a href="{{ action('masterController@showMaterialType'); }}" class=" waves-effect waves-light btn link"><i class="medium material-icons">view_array</i>&nbsp;Material Types</a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <a href="{{ action('masterController@showStatus'); }}" class=" waves-effect waves-light btn link"><i class="medium material-icons">reorder</i>&nbsp;Status</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <a href="{{ action('masterController@showWorkOrderStatus'); }}" class=" waves-effect waves-light btn link"><i class="material-icons">assignment</i>&nbsp;Work Order Status</a>
                        </div>
                    </div>
                    <div class="row">

                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

@stop