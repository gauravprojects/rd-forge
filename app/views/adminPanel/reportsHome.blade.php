@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Admin Pannel</span>
                        </div>
                    </div>
                    <a href="{{route('raw.report')}} " class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Raw Material reports</a><br><br>
                    <a href="{{route('cutting.report')}} " class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Cutting reports</a><br><br>
                    <a href="{{route('forging.report')}} " class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Forging reports</a><br><br>
                    <a href="{{route('machining.report')}} " class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Machining reports</a><br><br>
                    <a href="{{route('drilling.report')}} " class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Drilling reports</a><br><br>
                    <a href="{{route('seration.report')}} " class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Serration reports</a>
                    <div class="row">

                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->


@stop