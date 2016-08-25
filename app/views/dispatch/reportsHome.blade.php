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
                    <a href="{{route('dispatch.forging.report')}} " class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Forging Dispatch reports</a><br><br>
                    <a href="{{route('dispatch.machining.report')}} " class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Machining Dispatch reports</a><br><br>
                    <a href="{{route('dispatch.drilling.report')}} " class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Drilling Dispatch reports</a><br><br>
                    <a href="{{route('dispatch.serration.report')}} " class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Serration Dispatch reports</a><br><br>


                    <div class="row">

                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->


@stop