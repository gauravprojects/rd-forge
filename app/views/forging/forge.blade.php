@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Forging Material Entry</span>
                        </div>
                    </div>

                    <div class="row">

                        <a href="<?php echo action('forgingController@store'); ?>" >Go to this link</a>

                        {{ Form::open(array('action'=> 'forgingController@store')) }}
                                <!-- For recipt number of the material coming from outside -->
                        <!-- Description for forged item -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Forged Item Description') }}
                            {{ Form::text('forged_des',null,array('class'=>'form-control','placeholder'=>'forged Item description','id'=>'exampleInputEnail1')) }}
                        </div>

                        <!-- Weight per peice for forged item -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Weight Per Piece') }}
                            {{ Form::text('weight_per_peice',null,array('class'=>'form-control','placeholder'=>'Weight per peice','id'=>'justAnything')) }}
                        </div>

                        <!-- Heat no -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail','Heat Number') }}
                            {{ Form::text('heat_no',null,array('class'=>'form-control','placeholder'=>'Heat Number','id'=>'JustAnything2')) }}
                        </div>





                        <!-- Quantity -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail','Quantity') }}
                            {{ Form::text('quantity',null,array('class'=>'form-control','placeholder'=>'Quantity of material','id'=>'JustAnything')) }}
                        </div>

                        <!-- TOTAL TO BE CALCULATED THE SYSTEM -->
                        <!-- Forging remarks -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail','Forging Remarks') }}
                            {{ Form::text('remarks',null,array('class'=>'form-control','placeholder'=>'Remarks for forging Material','id'=>'JustAnything')) }}
                        </div>
                        </div>



                        <div class="loginButton">

                            {{ Form::submit('Submit',array('class'=>'waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button')) }}
                        </div>
                        {{ Form::close() }}
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->



@stop