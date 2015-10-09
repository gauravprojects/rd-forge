@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>  Work Order no: {{ $data->work_order_no }}</span><br>
                            <span>  Mr/Mrs: {{ $data->customer_name }} </span>
                        </div>
                    </div>

                    <div class="row">

                        {{ Form::open(array('action'=> 'workOrderController@store_more')) }}

                        <table class="table table-bordered table-condensed">
                            <tbody>
                                <tr>
                                    <th class="heading" style="text-align:center;">Work Order No</th>
                                    <th class="heading" style="text-align:center;">Description</th>
                                    <th class="heading" style="text-align:center;">Material Grade</th>
                                    <th class="heading" style="text-align:center;">Quantity</th>
                                    <th class="heading" style="text-align:center;">Weight</th>
                                    <th class="heading" style="text-align:center;">Remarks</th>
                                </tr>

                            <tr>
                                <td>
                                    {{ Form::text('work_order_no1',$data->work_order_no.'/1',array('class'=>'form-control','id'=>'exampleInputEnail1')) }}
                                </td>
                                <td>
                                    {{ Form::text('description1',null,array('class'=>'form-control','placeholder'=>'Description','id'=>'exampleInputEnail1')) }}
                                </td>

                                <!-- Material Grade -->
                                <td>
                                    <select class="form-control" name="material_grade1">
                                        <option>Grade 1</option>
                                        <option>Grade 2</option>
                                        <option>Grade 3</option>
                                        <option>Grade 4</option>
                                        <option>Grade 5</option>
                                    </select>

                                </td>

                                <td>
                                    {{ Form::text('quantity1',null,array('class'=>'form-control','placeholder'=>'Quantity','id'=>'exampleInputEnail1')) }}
                                </td>

                                <td>
                                    {{ Form::text('weight1',null,array('class'=>'form-control','placeholder'=>'weight','id'=>'exampleInputEnail1')) }}
                                </td>
                                <td>
                                    {{ Form::text('remarks1',null,array('class'=>'form-control','placeholder'=>'remarks','id'=>'exampleInputEnail1')) }}
                                </td>

                            </tr>


                            <!-- FORM 2ND ROW .......................      -->


                            <tr>
                                <td>
                                    {{ Form::text('work_order_no2',$data->work_order_no.'/2',array('class'=>'form-control','id'=>'exampleInputEnail1')) }}
                                </td>
                                <td>
                                    {{ Form::text('description2',null,array('class'=>'form-control','placeholder'=>'Description','id'=>'exampleInputEnail1')) }}
                                </td>

                                <!-- Material Grade -->
                                <td>
                                    <select class="form-control" name="material_grade2">
                                        <option>Grade 1</option>
                                        <option>Grade 2</option>
                                        <option>Grade 3</option>
                                        <option>Grade 4</option>
                                        <option>Grade 5</option>
                                    </select>

                                </td>

                                <td>
                                    {{ Form::text('quantity2',null,array('class'=>'form-control','placeholder'=>'Quantity','id'=>'exampleInputEnail1')) }}
                                </td>

                                <td>
                                    {{ Form::text('weight2',null,array('class'=>'form-control','placeholder'=>'weight','id'=>'exampleInputEnail1')) }}
                                </td>
                                <td>
                                    {{ Form::text('remarks2',null,array('class'=>'form-control','placeholder'=>'remarks','id'=>'exampleInputEnail1')) }}
                                </td>

                            </tr>

                    <!-- Form for row 3 ---------------------->
                            <tr>
                                <td>
                                    {{ Form::text('work_order_no3',$data->work_order_no.'/3',array('class'=>'form-control','id'=>'exampleInputEnail1')) }}
                                </td>
                                <td>
                                    {{ Form::text('description3',null,array('class'=>'form-control','placeholder'=>'Description','id'=>'exampleInputEnail1')) }}
                                </td>

                                <!-- Material Grade -->
                                <td>
                                    <select class="form-control" name="material_grade3">
                                        <option>Grade 1</option>
                                        <option>Grade 2</option>
                                        <option>Grade 3</option>
                                        <option>Grade 4</option>
                                        <option>Grade 5</option>
                                    </select>

                                </td>

                                <td>
                                    {{ Form::text('quantity3',null,array('class'=>'form-control','placeholder'=>'Quantity','id'=>'exampleInputEnail1')) }}
                                </td>

                                <td>
                                    {{ Form::text('weight3',null,array('class'=>'form-control','placeholder'=>'weight','id'=>'exampleInputEnail1')) }}
                                </td>
                                <td>
                                    {{ Form::text('remarks3',null,array('class'=>'form-control','placeholder'=>'remarks','id'=>'exampleInputEnail1')) }}
                                </td>

                            </tr>


                            </tbody>
                        </table>

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