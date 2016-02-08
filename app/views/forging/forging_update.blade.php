@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Forging Entry</span>
                        </div>
                    </div>


                    @foreach($forging_array as $forging)
                        <div class="row">
                            {{ Form::open(array('action'=> 'forgingController@update_store')) }}
                                    <!-- For recipt number of the material coming from outside -->

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Forging Id') }}
                                 {{ Form::text('forging_id',$forging->forging_id,array('class'=>'form-control inputfix','id'=>'forging_id','name'=>'forging_id','placeholder'=>'Date')) }}
                            </div>

                           <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Date') }}
                               {{ Form::text('date',date('d-m-Y',strtotime($forging->date)),array('class'=>'form-control inputfix','id'=>'date','name'=>'date','placeholder'=>'Date','readonly','data-date-format'=>'dd-mm-yyyy')) }}
                            </div>

                            <!-- Heat no for forged item -->

                            <!-- here it will show only those heat no, who have available weight corresponding
                            to cutting records table -->

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Heat Number(available raw material)') }}

                                <select class="form-control" name="heatNo" id="heat_no">
                                    <option value="">---Select Heat Number--------</option>
                                    @foreach($heat_no as $heat_no_element)
                                        @if($heat_no_element->heat_no == $forging->heat_no)
                                            <option value="{{ $heat_no_element->heat_no }}" selected>{{$heat_no_element->heat_no}}</option>
                                        @else
                                            <option value="{{ $heat_no_element->heat_no }}">{{$heat_no_element->heat_no}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>



                            <!-- Weight per peice for forged item -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Weight Per Piece') }}
                                {{ Form::text('weight_per_peice',$forging->weight_per_piece,array('class'=>'form-control inputfix','placeholder'=>'Weight per peice','id'=>'wpp')) }}
                            </div>


                            <!-- Quantity -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Quantity') }}
                                {{ Form::text('quantity',$forging->quantity,array('class'=>'form-control inputfix' ,'placeholder'=>'Quantity of material','id'=>'quantity')) }}
                            </div>


                            <!-- Forging description, it consists of four parts
                                Standard size,pressure , type and schdule -->

                             <br>

                           <div class="row text-center">
                                <div class="heading">
                                    <span>Forging Description</span>
                                </div>
                            </div>

                                     <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Standard Size') }}

                                <select class="form-control" name="standard_size">
                                    <option value="">---Select Standard Size--------</option>
                                    @foreach($standard_size as $standard_size_element)
                                        @if($standard_size_element->std_size == $forging->size)
                                            <option value="{{ $standard_size_element->std_size }}" selected>{{$standard_size_element->std_size}}</option>
                                        @else
                                            <option value="{{ $standard_size_element->std_size }}">{{$standard_size_element->std_size}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>


                            <!-- standard pressure which to be used for description -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Pressure') }}

                                <select class="form-control" name="pressure">
                                    <option value="">---Select Pressure--------</option>
                                    @foreach($pressure as $pressure_element)
                                        @if($pressure_element->pressure == $forging->pressure)
                                            <option value="{{ $pressure_element->pressure }}" selected>{{$pressure_element->pressure}}</option>
                                        @else
                                            <option value="{{ $pressure_element->pressure }}">{{$pressure_element->pressure}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <!-- Standard type for cutting, part of description -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Standard Type') }}

                                <select class="form-control" name="type">
                                    <option value="">---Select Standard Type--------</option>
                                    @foreach($type as $type_element)
                                        @if($type_element->type == $forging->type)
                                            <option value="{{ $type_element->type }}" selected>{{$type_element->type}}</option>
                                        @else
                                            <option value="{{ $type_element->type }}">{{$type_element->type}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>


                            <!-- Standard type for cutting, part of description -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Schedule') }}

                                <select class="form-control" name="schedule">
                                    <option value="">---Select Schedule--------</option>
                                    @foreach($schedule as $schedule_element)
                                        @if($schedule_element->schedule == $forging->schedule)
                                            <option value="{{ $schedule_element->schedule }}" selected>{{$schedule_element->schedule}}</option>
                                        @else
                                            <option value="{{ $schedule_element->schedule }}">{{$schedule_element->schedule}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>


                            <!-- Forging remarks -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Forging Remarks') }}
                                {{ Form::text('remarks',$forging->remarks,array('class'=>'form-control inputfix','placeholder'=>'Remarks for forging Material','id'=>'JustAnything')) }}
                            </div>

                            @endforeach


                            <div class="loginButton">
                                {{-- {{ Form::submit('Submit',array('class'=>'waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button')) }} --}}

                            <button class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button" type="submit">Submit</button>
                            
                            </div>
                        {{ Form::close() }}

                        </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

 <script type="text/javascript">
            $(function () {
                $('#date').datepicker();
            });
        </script>

@stop