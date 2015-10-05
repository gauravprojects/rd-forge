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
                    <a href="<?php  echo action('adminPageController@show_reports'); ?> " class="col-xs-12 col-sm-12 col-md-12 col-lg-4 waves-effect waves-light btn link">Reports</a><br><br>

                    <div class="row">

                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

@stop