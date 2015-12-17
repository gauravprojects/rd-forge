@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Drilling Entry</span>
                        </div>
                    </div>


                    @foreach($drilling_array as $drilling)
                        <div class="row">
                            {{ Form::open(array('action'=> 'drillingController@update_store')) }}
                                    <!-- For recipt number of the material coming from outside -->

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Drilling Id') }}
                                 {{ Form::text('drilling_id',$drilling->drilling_id,array('class'=>'form-control inputfix','id'=>'drilling_id','name'=>'drilling_id','placeholder'=>'Date')) }}
                            </div>

                            <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Work Order Number') }}
                            {{ Form::text('work_order_no',$drilling->work_order_no,array('class'=>'form-control inputfix','placeholder'=>'Work Order Number','id'=>'exampleInputEnail1')) }}
                            </div>

                            <div class="form-group"s>
                            {{ Form::label('exampleInputEmail1','Item') }}
                            {{ Form::text('item',$drilling->item,array('class'=>'form-control inputfix','placeholder'=>'Item','id'=>'exampleInputEnail1')) }}
                            </div>

                             <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Heat Number(available raw material)') }}

                                <select class="form-control" name="heatNo" id="heat_no">
                                    @foreach($heat_no as $heat_no_element)
                                        @if($heat_no_element->heat_no == $drilling->heat_no)
                                            <option value="{{ $heat_no_element->heat_no }}" selected>{{$heat_no_element->heat_no}}</option>
                                        @else
                                            <option value="{{ $heat_no_element->heat_no }}">{{$heat_no_element->heat_no}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Quantity') }}
                                {{ Form::text('quantity',$drilling->quantity,array('class'=>'form-control inputfix','placeholder'=>'Quantity','id'=>'justAnything')) }}
                            </div>


                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Machine Name') }}
                                {{ Form::text('machine_name',$drilling->machine_name,array('class'=>'form-control inputfix','placeholder'=>'Machine Name','id'=>'exampleInputEnail1')) }}
                            </div>

                            <!-- Employee name removed after new review from the client  -->

                           {{--  <div class="form-group">
                                {{ Form::label('exampleInputEmail1','quantity') }}
                                {{ Form::text('quantity',null,array('class'=>'form-control inputfix','placeholder'=>'Quantity','id'=>'exampleInputEnail1')) }}
                            </div> --}}


                            <!-- to be fetched from master grades -->

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Material Grade') }}
                                <select name="grade" class="form-control">
                                    @foreach($grades as $grade)
                                        @if($grade->grade_name == $drilling->grade)
                                            <option value="{{ $grade->grade_name }}" selected>{{ $grade->grade_name }}</option>
                                        @else
                                            <option value="{{ $grade->grade_name }}">{{ $grade->grade_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>


                            <!-- DOUBT HERE, which weight is this, refer doubts -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Weight') }}
                                {{ Form::text('weight',$drilling->weight,array('class'=>'form-control inputfix','placeholder'=>'Weight','id'=>'exampleInputEnail1')) }}
                            </div>

                            
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Remarks') }}
                                {{ Form::text('remarks',$drilling->remarks,array('class'=>'form-control inputfix','placeholder'=>'Remarks','id'=>'anything')) }}
                            </div>

                            @endforeach

                            <div class="loginButton">

                                 <button class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button" type="submit">Submit</button>
                                 
                            </div>
                            {{ Form::close() }}
               
                        </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->




@stop