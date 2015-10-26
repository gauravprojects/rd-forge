@extends('layouts.master')

@section('links_data')

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Cutting Entry</span>
                        </div>
                    </div>

                    <div class="row">
                        {{ Form::open(array('action'=>'cuttingPageController@store')) }}


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Date') }}
                            {{ Form::input('date', 'date') }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Size') }}

                            <select class="form-control" name="size">
                                @foreach($sizes as $size_element)
                                    <option value="{{ $size_element->size }}">{{$size_element->size}}</option>
                                @endforeach
                            </select>
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
                            {{ Form::label('exampleInputEmail1','Cutting Description') }}
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




                        <!-- qunanity.. this is the quantity of the cutted material -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Qunatity') }}
                                {{ Form::text('quantity',null,array('class'=>'form-control','placeholder'=>'Quantity','id'=>'JustAnything')) }}
                            </div>

                            <!-- Wieght per piece,, weight per piece of the cutted material -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Weight per Pice') }}
                                {{ Form::text('wpp',null,array('class'=>'form-control','placeholder'=>'Weight per piece')) }}
                            </div>

                            <!-- total weight to be calculated by itself
                                total weight= quantity * Weight per piece -->

                            <!-- cutting item description  -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Cutting Item Discription') }}
                                {{ Form::text('CutDes',null,array('class'=>'form-control','placeholder'=>'Cutting item Discription','id'=>'JustAnything')) }}
                            </div>

                            <!-- cutting remarks.. optional if user has some additional thing then he can mention it here -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Cutting item remarks') }}
                                {{ Form::text('cutRem',null,array('class'=>'form-control','placeholder'=>'Cutting item remarks','id'=>'JustAnything')) }}
                            </div>


                            {{ Form::submit('Submit',array('class'=>'waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button')) }}
                           <!-- Given by pranav
                            <a class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button">Submit</a> -->
                        {{ Form::close() }}
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->


@stop