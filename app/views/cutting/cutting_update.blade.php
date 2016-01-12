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