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
                    <a href="<?php  echo route('raw.report'); ?> " class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Raw Material reports</a><br><br>
                    <a href="<?php  echo route('cutting.report'); ?> " class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Cutting Material reports</a><br><br>
                    <a href="<?php  echo route('forging.report'); ?> " class="col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn link">Forging Material reports</a><br><br>
                    <div class="row">

                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->


@stop