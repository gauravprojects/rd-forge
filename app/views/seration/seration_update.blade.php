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


                    @foreach($seration_array as $seration)
                        <div class="row">
                            {{ Form::open(array('action'=> 'serationController@update_store')) }}
                                    <!-- For recipt number of the material coming from outside -->

                        <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Seration Id') }}
                                 {{ Form::text('seration_id',$seration->seration_id,array('class'=>'form-control inputfix','id'=>'seration_id','name'=>'seration_id','placeholder'=>'Date')) }}
                        </div>

                           <!-- For WORK ORDER NUMBER -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Work Order Number') }}
                            {{ Form::text('work_order_no',$seration->work_order_no,array('class'=>'form-control inputfix','placeholder'=>'Work Order Number','id'=>'exampleInputEnail1')) }}
                        </div>

                        <!-- FOR ITEM TYPE -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Item') }}
                            {{ Form::text('item',$seration->item,array('class'=>'form-control inputfix','placeholder'=>'Item','id'=>'exampleInputEnail1')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Heat Number') }}
                            {{ Form::text('heat_no',$seration->heat_no,array('class'=>'form-control inputfix','placeholder'=>'Heat Number','id'=>'exampleInputEnail1')) }}
                        </div>


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Quantity') }}
                            {{ Form::text('quantity',$seration->quantity,array('class'=>'form-control inputfix','placeholder'=>'Quantity','id'=>'justAnything')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Machine Name') }}
                            {{ Form::text('machine_name',$seration->machine_name,array('class'=>'form-control inputfix','placeholder'=>'Machine Name','id'=>'exampleInputEnail1')) }}
                        </div>

{{--                         <div class="form-group">
                            {{ Form::label('exampleInputEmail1','quantity') }}
                            {{ Form::text('quantity',null,array('class'=>'form-control inputfix','placeholder'=>'Quantity','id'=>'exampleInputEnail1')) }}
                        </div>
 --}}
                        <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Material Grade') }}
                                <select name="grade" class="form-control">
                                    @foreach($grades as $grade)
                                        @if($grade->grade_name == $seration->grade)
                                            <option value="{{ $grade->grade_name }}" selected>{{ $grade->grade_name }}</option>
                                        @else
                                            <option value="{{ $grade->grade_name }}">{{ $grade->grade_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                        </div>


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Weight') }}
                            {{ Form::text('weight',$seration->weight,array('class'=>'form-control inputfix','placeholder'=>'Weight','id'=>'exampleInputEnail1')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Remarks') }}
                            {{ Form::text('remarks',$seration->remarks,array('class'=>'form-control inputfix','placeholder'=>'Remarks','id'=>'anything')) }}
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