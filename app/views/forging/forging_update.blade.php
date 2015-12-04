@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Raw Material Entry</span>
                        </div>
                    </div>


                    @foreach($cutting_array as $cutting)
                        <div class="row">
                            {{ Form::open(array('action'=> 'cuttingPageController@update_store')) }}
                                    <!-- For recipt number of the material coming from outside -->

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Id') }}
                                 {{ Form::text('cutting_id',$cutting->cutting_id,array('class'=>'form-control inputfix','id'=>'cutting_id','name'=>'cutting_id','placeholder'=>'Date')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Date') }}
                                 {{ Form::text('date',$cutting->date,array('class'=>'form-control inputfix','id'=>'date','name'=>'date','placeholder'=>'Date','readonly')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Size') }}

                                <select class="form-control" name="size">
                                    @foreach($sizes as $size_element)
                                        @if($size_element->size == $cutting->raw_mat_size)
                                            <option value="{{ $size_element->size }}" selected>{{$size_element->size}}</option>
                                        @else
                                            <option value="{{ $size_element->size }}">{{$size_element->size}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>


                            <!-- here it will show only those heat no who have available weight
                            in raw_material table -->

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Heat Number(available raw material)') }}

                                <select class="form-control" name="heatNo" id="heat_no">
                                    @foreach($heat_no as $heat_no_element)
                                        @if($heat_no_element->heat_no == $cutting->heat_no)
                                            <option value="{{ $heat_no_element->heat_no }}" selected>{{$heat_no_element->heat_no}}</option>
                                        @else
                                            <option value="{{ $heat_no_element->heat_no }}">{{$heat_no_element->heat_no}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

 <br>
                           <div class="row text-center">
                                <div class="heading">
                                    <span>Cutting Description</span>
                                </div>
                            </div>

                           

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Standard Size') }}

                                <select class="form-control" name="standard_size">
                                    @foreach($standard_size as $standard_size_element)
                                        @if($standard_size_element->std_size == $cutting->size)
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
                                    @foreach($pressure as $pressure_element)
                                        @if($pressure_element->pressure == $cutting->pressure)
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
                                    @foreach($type as $type_element)
                                        @if($type_element->type == $cutting->type)
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
                                    @foreach($schedule as $schedule_element)
                                        @if($schedule_element->schedule == $cutting->schedule)
                                            <option value="{{ $schedule_element->schedule }}" selected>{{$schedule_element->schedule}}</option>
                                        @else
                                            <option value="{{ $schedule_element->schedule }}">{{$schedule_element->schedule}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>




                            <!-- qunanity.. this is the quantity of the cutted material -->
                                <div class="form-group">
                                    {{ Form::label('exampleInputEmail','Quantity') }}
                                    {{ Form::text('quantity',$cutting->quantity,array('class'=>'form-control inputfix','placeholder'=>'Quantity','id'=>'quantity')) }}
                                </div>

                                <!-- Wieght per piece,, weight per piece of the cutted material -->
                                <div class="form-group">
                                    {{ Form::label('exampleInputEmail1','Weight per Piece') }}
                                    {{ Form::text('wpp',$cutting->weight_per_piece,array('class'=>'form-control inputfix','placeholder'=>'Weight per piece','id'=>'wpp')) }}
                                </div>

                                <!-- total weight to be calculated by itself
                                        total weight= quantity * Weight per piece -->

                                  @endforeach

                                <!-- cutting item description  -->
                                @foreach($cutting_item_des_array as $cutting_des_array)

                                <div class="form-group">
                                    {{ Form::label('exampleInputEmail','Cutting Item Discription') }}
                                    {{ Form::text('cutDes',$cutting_des_array->item_des,array('class'=>'form-control inputfix','placeholder'=>'Cutting item Discription','id'=>'JustAnything')) }}
                                </div>

                                @endforeach

                                <!-- cutting remarks.. optional if user has some additional thing then he can mention it here -->
                                 @foreach($cutting_remarks_array as $cutting_rem_array)

                                <div class="form-group">
                                    {{ Form::label('exampleInputEmail','Cutting item remarks') }}
                                    {{ Form::text('cutRem',$cutting_rem_array->remarks,array('class'=>'form-control inputfix','placeholder'=>'Cutting item remarks','id'=>'JustAnything')) }}
                                </div>

                                @endforeach

                            
                            <button class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button" type="submit">Submit</button>
                               <!-- Given by pranav
                                <a class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button">Submit</a> -->
                            {{ Form::close() }}                        
                        </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->




@stop