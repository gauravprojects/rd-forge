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

                        <!-- If $work_order_details is empty then show nothing, otherwise show the required details -->


                        <div class="row">

                            {{ Form::open(array('action'=> 'work.details_add')) }}
                            <?php $count=0 ?>
                            <table class="table table-bordered table-condensed">
                                <tbody>
                                    <tr>
                                        <th class="heading" style="text-align:center;">Work Order No</th>
                                        <th class="heading" style="...">Item no</th>
                                        <th class="heading" style="text-align:center;">Description</th>
                                        <th class="heading" style="text-align:center;">Material Grade</th>
                                        <th class="heading" style="text-align:center;">Quantity</th>
                                        <th class="heading" style="text-align:center;">Weight</th>
                                        <th class="heading" style="text-align:center;">Remarks</th>
                                    </tr>

                                <tr>
                                    <td>
                                        {{ Form::text('work_order_no',$data->work_order_no,array('class'=>'form-control','id'=>'exampleInputEnail1')) }}
                                    </td>
                                    <td>
                                        {{ Form::text('item_no',$data->work_order_no.'/'.++$count,array('class'=>'form-control')) }}
                                    </td>

                                    <td>
                                        {{ Form::text('description',null,array('class'=>'form-control','placeholder'=>'Description','id'=>'exampleInputEnail1')) }}
                                    </td>

                                    <!-- Material Grade -->
                                    <td>
                                        <select class="form-control" name="grade">
                                            @foreach($grades as $grade_element)
                                                <option value="{{ $grade_element->grade_name }}">{{ $grade_element->grade_name }}</option>
                                            @endforeach
                                        </select>

                                    </td>

                                    <td>
                                        {{ Form::text('quantity',null,array('class'=>'form-control','placeholder'=>'Quantity','id'=>'exampleInputEnail1')) }}
                                    </td>

                                    <td>
                                        {{ Form::text('weight',null,array('class'=>'form-control','placeholder'=>'weight','id'=>'exampleInputEnail1')) }}
                                    </td>
                                    <td>
                                        {{ Form::text('remarks',null,array('class'=>'form-control','placeholder'=>'remarks','id'=>'exampleInputEnail1')) }}
                                    </td>

                                </tr>




                                </tbody>
                            </table>

                            <div class="loginButton">
                                {{ Form::submit('ADD',array('class'=>'waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button')) }}
                            </div>
                            {{ Form::close() }}


                        </div>		<!-- row conatining form ends here -->
                    </div>		<!-- card ends here -->
                </div>		<!-- wrapper ends here -->
            </div>		<!-- row ends here -->
        </div> 		<!-- col-12 ends here -->




    @stop