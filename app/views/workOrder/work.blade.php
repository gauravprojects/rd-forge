@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Work Order Entry</span>
                        </div>
                    </div>

                    <div class="row">
                        {{ Form::open(array('action'=> 'workOrderController@store')) }}
                                <!-- For recipt number of the material coming from outside -->

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Item Number') }}
                            {{ Form::text('item_no',null,array('class'=>'form-control','placeholder'=>'Item Number','id'=>'exampleInputEnail1')) }}
                        </div>

                        <!-- For the date of entry of raw materail
                            This date will be picket up using date() function from the machine -->

                        <!-- Material grade, this will be prementioned, using dropdowm they will be shown
                        waiting for sample data to work further on this -->
                        <div class="form-group">
                            <!-- PROBLEM THIS form::select() NOT WORKING.. PLEASE CHECK IT OUT -->

                            {{ Form::label('exampleInputPassword','Material Grade') }}


                            <select class="form-control" name="materialGrade">
                                <option>Grade 1</option>
                                <option>Grade 2</option>
                                <option>Grade 3</option>
                                <option>Grade 4</option>
                                <option>Grade 5</option>
                            </select>
                        </div>

                        <!-- Quantity for material required -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Quantity') }}
                            {{ Form::text('quantity',null,array('class'=>'form-control','placeholder'=>'quantity','id'=>'Justesehe')) }}
                        </div>

                        <!-- Quantity of material dispatched -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Dispatched quantity') }}
                            {{ Form::text('dispatched_quantity',null,array('class'=>'form-control','placeholder'=>'Dispatched quantity','id'=>'Justesehe')) }}
                        </div>


                        <!-- Wieght, weight of the incoming material -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Weight') }}
                            {{ Form::text('weight',null,array('class'=>'form-control','placeholder'=>'Weight','id'=>'Justesehe')) }}
                        </div>

                        <!-- Wieght, weight of the incmomh material -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Weight') }}
                            {{ Form::text('weight',null,array('class'=>'form-control','placeholder'=>'Weight','id'=>'Justesehe')) }}
                        </div>

                        <!-- Remarks -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Remarks') }}
                            {{ Form::text('weight',null,array('class'=>'form-control','placeholder'=>'Weight','id'=>'Justesehe')) }}
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