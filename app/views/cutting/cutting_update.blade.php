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


                    @foreach($cutting_array as $cutting)
                        <div class="row">
                            {{ Form::open(array('action'=> 'cuttingPageController@update_store')) }}
                                    <!-- For recipt number of the material coming from outside -->

                            {{ Form::hidden('cutting_id',$cutting->cutting_id,array('class'=>'form-control inputfix','id'=>'cutting_id','name'=>'cutting_id','placeholder'=>'Id')) }}


                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Date') }}
                                 {{ Form::text('date',date('d-m-Y',strtotime($cutting->date)),array('class'=>'form-control inputfix','id'=>'date','name'=>'date','placeholder'=>'Date','readonly','data-date-format'=>'dd-mm-yyyy')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Size') }}

                                <select class="form-control" name="size" id="size_select" required>
                                    <option value="">---Select Size--------</option>
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

                                <select class="form-control search selection" name="heatNo" id="heatno_select" required>
                                    <option value="">---Select Heat Number--------</option>
                                    @foreach($heat_no as $heat_no_element)
                                        @if($heat_no_element->heat_no == $cutting->heat_no && $heat_no_element->size == $cutting->raw_mat_size)
                                            <option value="{{ $heat_no_element->heat_no }}-{{ $heat_no_element->size }}" selected>{{$heat_no_element->heat_no}} - {{ $heat_no_element->size }}</option>

                                            <?php $old_heat_no = $heat_no_element->heat_no; 
                                                  $old_size = $heat_no_element->size; ?>
                                        @else
                                            <option value="{{ $heat_no_element->heat_no }}-{{ $heat_no_element->size}}">{{$heat_no_element->heat_no}} - {{ $heat_no_element->size }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                 {{ Form::hidden('old_heat_no',$old_heat_no,array('class'=>'form-control inputfix')) }}
                                 {{ Form::hidden('old_size',$old_size,array('class'=>'form-control inputfix')) }}
                            </div>

 <br>
                           <div class="row text-center">
                                <div class="heading">
                                    <span>Cutting Description</span>
                                </div>
                            </div>

                           

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Standard Size') }}

                                <select class="form-control search selection" name="standard_size" id="standardsize_select" required>
                                    <option value="">---Select Standard Size--------</option>
                                    @foreach($standard_size as $standard_size_element)
                                        @if($standard_size_element->std_size == $cutting->size)
                                            <option value="{{ $standard_size_element->std_size }}" selected>{{$standard_size_element->std_size}}</option>
                                            <?php $old_standard_size = $standard_size_element->std_size; ?>
                                        @else
                                            <option value="{{ $standard_size_element->std_size }}">{{$standard_size_element->std_size}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                 {{ Form::hidden('old_standard_size',$old_standard_size,array('class'=>'form-control inputfix')) }}
                            </div>


                            <!-- standard pressure which to be used for description -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Pressure') }}

                                <select class="form-control search selection" name="pressure" id="pressure_select" required>
                                    <option value="">---Select Pressure--------</option>
                                    @foreach($pressure as $pressure_element)
                                        @if($pressure_element->pressure == $cutting->pressure)
                                            <option value="{{ $pressure_element->pressure }}" selected>{{$pressure_element->pressure}}</option>
                                            <?php $old_pressure = $pressure_element->pressure; ?>
                                        @else
                                            <option value="{{ $pressure_element->pressure }}">{{$pressure_element->pressure}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                 {{ Form::hidden('old_pressure',$old_pressure,array('class'=>'form-control inputfix')) }}
                            </div>

                            <!-- Standard type for cutting, part of description -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Standard Type') }}

                                <select class="form-control search selection" name="type" id="standardtype_select" required>
                                    <option value="">---Select Standard Type--------</option>
                                    @foreach($type as $type_element)
                                        @if($type_element->type == $cutting->type)
                                            <option value="{{ $type_element->type }}" selected>{{$type_element->type}}</option>
                                            <?php $old_type = $type_element->type; ?>
                                        @else
                                            <option value="{{ $type_element->type }}">{{$type_element->type}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                 {{ Form::hidden('old_type',$old_type,array('class'=>'form-control inputfix')) }}
                            </div>


                            <!-- Standard type for cutting, part of description -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Schedule') }}

                                <select class="form-control search selection" name="schedule" id="schedule_select" required>
                                    <option value="">---Select Schedule--------</option>
                                    @foreach($schedule as $schedule_element)
                                        @if($schedule_element->schedule == $cutting->schedule)
                                            <option value="{{ $schedule_element->schedule }}" selected>{{$schedule_element->schedule}}</option>
                                            <?php $old_schedule = $schedule_element->schedule; ?>
                                        @else
                                            <option value="{{ $schedule_element->schedule }}">{{$schedule_element->schedule}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                  {{ Form::hidden('old_schedule',$old_schedule,array('class'=>'form-control inputfix'))}}
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

                            <?php $old_weight = $cutting->quantity*$cutting->weight_per_piece; ?>

                            {{ Form::hidden('old_weight',$old_weight,array('class'=>'form-control inputfix'))}}
                                <!-- total weight to be calculated by itself
                                        total weight= quantity * Weight per piece -->

                                <!-- cutting item description  -->

                                <div class="form-group">
                                    {{ Form::label('exampleInputEmail','Cutting Item Discription') }}
                                    {{ Form::text('cutDes',$cutting->description,array('class'=>'form-control inputfix','placeholder'=>'Cutting item Discription','id'=>'JustAnything')) }}
                                </div>

                                <!-- cutting remarks.. optional if user has some additional thing then he can mention it here -->

                                <div class="form-group">
                                    {{ Form::label('exampleInputEmail','Cutting item remarks') }}
                                    {{ Form::text('cutRem',$cutting->remarks,array('class'=>'form-control inputfix','placeholder'=>'Cutting item remarks','id'=>'JustAnything')) }}
                                </div>

                                 @endforeach

                            
                            <button class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button" type="submit">Submit</button>
                               <!-- Given by pranav
                                <a class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button">Submit</a> -->
                            {{ Form::close() }}                        
                        </div>      <!-- row conatining form ends here -->
                </div>      <!-- card ends here -->
            </div>      <!-- wrapper ends here -->
        </div>      <!-- row ends here -->
    </div>      <!-- col-12 ends here -->

  <script type="text/javascript">
            $(function () {
                $('#date').datepicker();
                $('#size_select').dropdown();
                $('#heatno_select').dropdown();
                $('#standardsize_select').dropdown();
                $('#pressure_select').dropdown();
                $('#standardtype_select').dropdown();
                $('#schedule_select').dropdown();
            });
        </script>


@stop