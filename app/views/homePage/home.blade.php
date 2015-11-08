@extends('layouts.master')


@section('links_data')

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row">
        <div class="wrapper wrapperHome">
            <div class="card forRowfix">
                <div class="row text-center">
                    <!-- for the links present inside the div -->
                    <ul id="nav-mobile">
                        <li><a href="{{action('workOrderController@index')}}" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Work Order</a></li>

                        <li><a href="{{action('rawMaterialController@index')}}" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Raw Material</a></li>

                        <li><a href="{{action('cuttingPageController@index')}}" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Cutting </a></li>
                        
                        <li><a href="{{action('forgingController@index')}}" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Forging</a></li>

                        <li><a href="{{action('machiningController@index')}}" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Machining</a></li>
                        <li><a href="{{action('drillingController@index')}}" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Drilling</a></li>
                        <li><a href="{{action('serationController@index')}}" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Serration</a></li>
                    </ul>
                </div>
                <div class="row">
                </div>		<!-- row conatining form ends here -->
            </div>		<!-- card ends here -->
        </div>		<!-- wrapper ends here -->
    </div>		<!-- row ends here -->
</div> 		<!-- col-12 ends here -->
@stop
