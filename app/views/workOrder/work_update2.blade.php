@extends('layouts.master')

@section('links_data')

    <script type="application/javascript">

        $item_no_count=1;
        $(document).ready(function(){
            $('#add_record').click(function(){
                //alert("function being called");
                $work_order_no_current= $('#work_order_no_form').val();

                <!-- work order no -->
                $work_order_no= '<td><input type="text" name="work_order_no[]" class="form-control inputfix" value=" '+$work_order_no_current+ ' "  </td>';

                <!-- item no -->
                $item_no= '<td><input type="text" name="item_no[]" class="form-control inputfix" value=" '+ $work_order_no_current+'/'+ ++$item_no_count+ '"  </td>';

                <!-- material grade -->
                $material_grade= '<td> <select class="form-control inputfix" name="grade[]"> @foreach($grades as $grade_element)
                                            <option value="{{ $grade_element->grade_name }}">{{ $grade_element->grade_name }}</option> @endforeach </select> </td>';

                <!-- Size -->
                $size= '<td><select class="form-control inputfix" name="standard_size[]"> @foreach($standard_size as $standard_size_element)
                              <option value="{{ $standard_size_element->std_size }}">{{$standard_size_element->std_size}}</option> @endforeach
                                </select></td>';

                <!-- pressure -->
                $pressure= '<td><select class="form-control inputfix" name="pressure[]">@foreach($pressure as $pressure_element)
                              <option value="{{ $pressure_element->pressure }}">{{$pressure_element->pressure}}</option>@endforeach
                      </select></td>';

                <!-- Type -->
                $type= '<td><select class="form-control inputfix" name="type[]">@foreach($type as $type_element)
                              <option value="{{ $type_element->type }}">{{$type_element->type}}</option>@endforeach
                      </select></td>';


                <!-- Schedule -->
                $schedule= '<td><select class="form-control inputfix" name="schedule[]"> @foreach($schedule as $schedule_element)
                              <option value="{{ $schedule_element->schedule }}">{{$schedule_element->schedule}}</option> @endforeach
                      </select></td>';

                <!-- quantity -->
                $quantity= '<td><input type="text" name="quantity[]" class="form-control inputfix" value="" placeholder="Quantity"  </td>';

                <!-- Weight -->
                $weight= '<td><input type="text" name="weight[]" class="form-control inputfix" value="" placeholder="Weight"  </td>';

                <!-- remarks -->
                $remarks= '<td><input type="text" name="remarks[]" class="form-control inputfix" value="" placeholder="Remarks"  </td>';

                <!-- Jquery append function to append everything to the table -->
                $("table").append("<tr>"+$work_order_no+$item_no+$material_grade+$size+$pressure+$type+$schedule+$quantity+$weight+$remarks+"</tr>");

            });
        });
    </script>


    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>  Work Order no: {{ $work_order_details[0]->work_order_no }}</span><br>
                            <span>  M/S: {{ $work_order_details[0]->customer_name }} </span>
                        </div>
                    </div>

                    <!-- If $work_order_details is empty then show nothing, otherwise show the required details -->

                    <!-- button to add a feild in the form dynamically -->
                    <button id="add_record" style="float: right;" onclick="add_record();">Add Field</button>
                    <br><br>

                    <div class="row">

                        {{ Form::open(array('action'=> 'work.details_add')) }}
                        <?php $count=0 ?>
                        <table class="table table-bordered table-condensed">
                            <tbody>
                            <tr>
                                <th class="heading" style="text-align:center; width:8%">Work Order No</th>
                                <th class="heading" style="text-align:center; width:8%">Item no</th>
                                <th class="heading" style="text-align:center; width: 12%">Material Grade</th>
                                <th class="heading" style="text-align:center; width: 12%">Size</th>
                                <th class="heading" style="text-align:center; width:12%">Pressure</th>
                                <th class="heading" style="text-align:center; width: 12%">Type</th>
                                <th class="heading" style="text-align:center; width: 12%">Schedule</th>
                                <th class="heading" style="text-align:center;">Quantity</th>
                                <th class="heading" style="text-align:center;">Weight</th>
                                <th class="heading" style="text-align:center;">Remarks</th>
                            </tr>

                            <tr>
                                <td>
                                    {{ Form::text('work_order_no[]',$work_order_details[0]->work_order_no,array('class'=>'form-control inputfix','id'=>'work_order_no_form')) }}
                                </td>
                                <td>
                                    {{ Form::text('item_no[]',$work_order_details[0]->work_order_no.'/'.++$count,array('class'=>'form-control inputfix','id'=>'item_no_form')) }}
                                </td>

                                <!-- Material Grade -->
                                <td>
                                    <select class="form-control inputfix" name="grade[]">
                                        @foreach($grades as $grade_element)
                                            <option value="{{ $grade_element->grade_name }}">{{ $grade_element->grade_name }}</option>
                                        @endforeach
                                    </select>

                                </td>

                                <td>
                                    <!-- Size -->
                                    <select class="form-control inputfix" name="standard_size[]">
                                        @foreach($standard_size as $standard_size_element)
                                            <option value="{{ $standard_size_element->std_size }}">{{$standard_size_element->std_size}}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td>
                                    <!-- Pressure -->
                                    <select class="form-control inputfix" name="pressure[]">
                                        @foreach($pressure as $pressure_element)
                                            <option value="{{ $pressure_element->pressure }}">{{$pressure_element->pressure}}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td>
                                    <!-- Type -->
                                    <select class="form-control inputfix" name="type[]">
                                        @foreach($type as $type_element)
                                            <option value="{{ $type_element->type }}">{{$type_element->type}}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td>
                                    <!-- Schedule -->
                                    <select class="form-control inputfix" name="schedule[]">
                                        @foreach($schedule as $schedule_element)
                                            <option value="{{ $schedule_element->schedule }}">{{$schedule_element->schedule}}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td>
                                    {{ Form::text('quantity[]',null,array('class'=>'form-control inputfix','placeholder'=>'Quantity','id'=>'exampleInputEnail1')) }}
                                </td>

                                <td>
                                    {{ Form::text('weight[]',null,array('class'=>'form-control inputfix','placeholder'=>'weight','id'=>'exampleInputEnail1')) }}
                                </td>
                                <td>
                                    {{ Form::text('remarks[]',null,array('class'=>'form-control inputfix','placeholder'=>'remarks','id'=>'exampleInputEnail1')) }}
                                </td>

                            </tr>




                            </tbody>
                        </table>



                        <div class="loginButton">
                            <button class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button" type="submit">Add</button>
                        </div>
                        {{ Form::close() }}


                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->




@stop