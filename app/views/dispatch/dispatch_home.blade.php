@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Dispatch Module</span>
                        </div>
                    </div>
                    <ul>
                        <li><a href="{{  action('dispatchController@forgingIndex');}} " class="col-xs-12 col-sm-12 col-md-12 col-lg-4 waves-effect waves-light btn link">Forging Dispatch</a></li>
                        <li><a href="{{ action('dispatchController@machiningIndex'); }}" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 waves-effect waves-light btn link">Machining Dispatch</a>  </li>
                        <li><a href="{{ action('dispatchController@drillingIndex'); }}" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 waves-effect waves-light btn link">Drilling Dispatch</a>  </li>
                        <li><a href="{{ action('dispatchController@serrationIndex'); }}" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 waves-effect waves-light btn link">Serration Dispatch</a>  </li>

                    </ul>
                    <div class="row">

                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

@stop