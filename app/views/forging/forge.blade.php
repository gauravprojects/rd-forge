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

                        {{ Form::open(array('action'=>'forgingController@store')) }}
                                <!-- For recipt number of the material coming from outside -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Date') }}
                            {{ Form::input('date', 'date') }}
                        </div>


                        <!-- Weight per peice for forged item -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Weight Per Piece') }}
                            {{ Form::text('weight_per_peice',$dataArray['weight_per_piece'],array('class'=>'form-control','placeholder'=>'Weight per peice','id'=>'justAnything')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Heat Number') }}

                            <select class="form-control" name="heatNo">
                                @foreach($heat_no as $heat_no_element)
                                    <option value="{{ $heat_no_element->heat_no }}">{{$heat_no_element->heat_no}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Forging Description') }}
                            <hr>
                            {{ Form::label('exampleInputEmail1','Standard Size') }}

                            <select class="form-control" name="standard_size">
                                @foreach($standard_size as $standard_size_element)
                                    <option value="{{ $standard_size_element->std_size }}">{{$standard_size_element->std_size}}</option>
                                @endforeach
                            </select>
                        </div>


                        <!-- standard pressure which to be used for description -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Pressure') }}

                            <select class="form-control" name="pressure">
                                @foreach($pressure as $pressure_element)
                                    <option value="{{ $pressure_element->pressure }}">{{$pressure_element->pressure}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Standard type for cutting, part of description -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Standard Type') }}

                            <select class="form-control" name="type">
                                @foreach($type as $type_element)
                                    <option value="{{ $type_element->type }}">{{$type_element->type}}</option>
                                @endforeach
                            </select>
                        </div>


                        <!-- Standard type for cutting, part of description -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Schedule') }}

                            <select class="form-control" name="schedule">
                                @foreach($schedule as $schedule_element)
                                    <option value="{{ $schedule_element->schedule }}">{{$schedule_element->schedule}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Quantity -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail','Quantity') }}
                            {{ Form::text('quantity',$dataArray['quantity'],array('class'=>'form-control','placeholder'=>'Quantity of material','id'=>'JustAnything')) }}
                        </div>

                        <!-- TOTAL TO BE CALCULATED THE SYSTEM -->
                        <!-- Forging remarks -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail','Forging Remarks') }}
                            {{ Form::text('remarks',null,array('class'=>'form-control','placeholder'=>'Remarks for forging Material','id'=>'JustAnything')) }}
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