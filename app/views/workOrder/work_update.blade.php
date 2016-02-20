@extends('layouts.master')

@section('links_data')

    <script type="application/javascript">

            var $item_no_count=1;
           $(document).ready(function(){
              $('#add_record').click(function(){
                    //alert("function being called");

                  <!-- item no -->
                  $item_no= '<td><input type="text" name="item_no[]" class="form-control inputfix" value=" '+ ++$item_no_count+ '"  </td>';

                  <!-- material grade -->
                  $material_grade= '<td> <select class="form-control" name="grade[]"> @foreach($grades as $grade_element)
                                            <option value="{{ $grade_element->grade_name }}">{{ $grade_element->grade_name }}</option> @endforeach </select> </td>';

                  <!-- Size -->
                  $size= '<td><select class="form-control" name="standard_size[]"> @foreach($standard_size as $standard_size_element)
                              <option value="{{ $standard_size_element->std_size }}">{{$standard_size_element->std_size}}</option> @endforeach
                                </select></td>';

                  <!-- pressure -->
                  $pressure= '<td><select class="form-control" name="pressure[]">@foreach($pressure as $pressure_element)
                              <option value="{{ $pressure_element->pressure }}">{{$pressure_element->pressure}}</option>@endforeach
                      </select></td>';

                  <!-- Type -->
                  $type= '<td><select class="form-control" name="type[]">@foreach($type as $type_element)
                              <option value="{{ $type_element->type }}">{{$type_element->type}}</option>@endforeach
                      </select></td>';


                  <!-- Schedule -->
                  $schedule= '<td><select class="form-control" name="schedule[]"> @foreach($schedule as $schedule_element)
                              <option value="{{ $schedule_element->schedule }}">{{$schedule_element->schedule}}</option> @endforeach
                      </select></td>';

                  <!-- quantity -->
                  $quantity= '<td><input type="text" name="quantity[]" class="form-control inputfix" value="" placeholder="Quantity"></td>';

                  <!-- Weight -->
                  $weight= '<td><input type="text" name="weight[]" class="form-control inputfix" value="" placeholder="Weight"></td>';

                  <!-- remarks -->
                  $remarks= '<td><input type="text" name="remarks_mat[]" class="form-control inputfix" value="" placeholder="Remarks"></td>';

             <!-- Jquery append function to append everything to the table -->
              $("table").append("<tr>"+$item_no+$material_grade+$size+$pressure+$type+$schedule+$quantity+$weight+$remarks+"</tr>");

              });

             $('#delete_record').click(function(){

              $("table tr:last-child").remove();
              --$item_no_count;

             });

           });
        </script>



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


                        {{ Form::open(array('action'=> 'workOrderController@update_store')) }}
                                <!-- For recipt number of the material coming from outside -->

                        <!-- Customer Name who is placing the order -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Work Order no') }}
                            {{ Form::text('work_order_no',$record->work_order_no,array('class'=>'form-control inputfix','placeholder'=>'Work Order Number','id'=>'exampleInputEnail1')) }}
                        </div>


                        <!-- Customer Name who is placing the order -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Customer Name') }}
                            {{ Form::text('customer_name',$record->customer_name,array('class'=>'form-control inputfix','placeholder'=>'Customer Number','id'=>'exampleInputEnail1')) }}
                        </div>

                        <!-- Purchase order number -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Purchase Order Number') }}
                            {{ Form::text('purchase_order_no',$record->purchase_order_no,array('class'=>'form-control inputfix','placeholder'=>'Purchase Order Number','id'=>'exampleInputEnail1')) }}
                        </div>

                        <!-- Puchase order date -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail','Purchase Order Date') }}
                            {{ Form::text('purchase_order_date',$record->purchase_order_date,array('class'=>'form-control inputfix','id'=>'purchase_order_date','name'=>'purchase_order_date','placeholder'=>'Purchase Order Date','readonly','data-date-format'=>'dd-mm-yyyy')) }}
                        </div>

                        <!-- Required Delivery date when the order is required -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail','Required Delivery Date') }}
                            {{ Form::text('required_delivery_date',$record->required_delivery_date,array('class'=>'form-control inputfix','id'=>'required_delivery_date','name'=>'required_delivery_date','placeholder'=>'Required Delivery Date','readonly','data-date-format'=>'dd-mm-yyyy')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Inspection') }}
                            {{ Form::text('inspection',$record->inspection,array('class'=>'form-control inputfix','placeholder'=>'Inspection','id'=>'Justesehe')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Packing Instruction') }}
                            {{ Form::text('packing_instruction',$record->packing_instruction,array('class'=>'form-control inputfix','placeholder'=>'Packing Instruction','id'=>'Justesehe')) }}
                        </div>

                        <!-- testing Instruction -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Testing Instruction') }}
                            {{ Form::text('testing_instruction',$record->testing_instruction,array('class'=>'form-control inputfix','placeholder'=>'Testing Instruction','id'=>'Justesehe')) }}
                        </div>
                        <!-- Quotation Number -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Quotation Number') }}
                            {{ Form::text('quotation_no',$record->quotation_no,array('class'=>'form-control inputfix','placeholder'=>'Quotation Number','id'=>'Justesehe')) }}
                        </div>

                        <!-- Remarks -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Remarks') }}
                            {{ Form::text('remarks',$record->remarks,array('class'=>'form-control inputfix','placeholder'=>'Remarks','id'=>'Justesehe')) }}
                        </div>


                        <a id="delete_record" class="waves-effect waves-light btn right">Delete Field</a>

                        <a id="add_record" class="waves-effect waves-light btn right">Add Field</a>

                        <br/><br/>

                        <div class="row">

                            <?php $count=0; ?>
                            <br/>
                            <table class="table table-bordered table-condensed">
                                <tbody>
                                    <tr>
                                        <th class="heading" style="text-align:center; width:8%">Item no</th>
                                        <th class="heading" style="text-align:center; width: 12%">Material Grade</th>
                                        <th class="heading" style="text-align:center; width: 12%">Size</th>
                                        <th class="heading" style="text-align:center; width:12%">Pressure</th>
                                        <th class="heading" style="text-align:center; width: 12%">Type</th>
                                        <th class="heading" style="text-align:center; width: 12%">Schedule</th>
                                        <th class="heading" style="text-align:center;">Quantity</th>
                                        <th class="heading" style="text-align:center;">Weight</th>
                                        <th class="heading" style="text-align:center;">Remarks</th>
                                        <th class="heading" style="text-align:center;">Status</th>
                                    </tr>

                                @foreach($record_new as $pushpam_matah)

                                <tr>
                                    <td>
                                        {{ Form::text('item_no[]',$pushpam_matah->item_no,array('class'=>'form-control inputfix','id'=>'item_no_form')) }}
                                    </td>

                                    <!-- Material Grade -->
                                    <td>
                                        <select class="form-control" name="grade[]">
                                            @foreach($grades as $grade_element)
                                                @if($pushpam_matah->material_grade == $grade_element->grade_name)
                                                    <option value="{{ $grade_element->grade_name }}" selected>{{ $grade_element->grade_name }}</option>
                                                @else
                                                    <option value="{{ $grade_element->grade_name }}">{{ $grade_element->grade_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>

                                    </td>

                                    <td>
                                        <!-- Size -->
                                        <select class="form-control" name="standard_size[]">
                                            @foreach($standard_size as $standard_size_element)
                                                @if($pushpam_matah->size == $standard_size_element->std_size)
                                                    <option value="{{ $standard_size_element->std_size }}" selected>{{$standard_size_element->std_size}}</option>
                                                @else
                                                    <option value="{{ $standard_size_element->std_size }}">{{$standard_size_element->std_size}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>

                                    <td>
                                        <!-- Pressure -->
                                        <select class="form-control" name="pressure[]">
                                            @foreach($pressure as $pressure_element)
                                                 @if($pushpam_matah->pressure == $pressure_element->pressure)
                                                    <option value="{{ $pressure_element->pressure }}" selected>{{$pressure_element->pressure}}</option>
                                                @else
                                                     <option value="{{ $pressure_element->pressure }}">{{$pressure_element->pressure}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>

                                    <td>
                                        <!-- Type -->
                                        <select class="form-control" name="type[]">
                                            @foreach($type as $type_element)
                                                 @if($pushpam_matah->type == $type_element->type)
                                                    <option value="{{ $type_element->type }}" selected>{{$type_element->type}}</option>
                                                 @else
                                                    <option value="{{ $type_element->type }}">{{$type_element->type}}</option>
                                                 @endif
                                            @endforeach
                                        </select>
                                    </td>

                                    <td>
                                        <!-- Schedule -->
                                        <select class="form-control" name="schedule[]">
                                            @foreach($schedule as $schedule_element)
                                                @if($pushpam_matah->schedule == $schedule_element->schedule)
                                                    <option value="{{ $schedule_element->schedule }}" selected>{{$schedule_element->schedule}}</option>
                                                @else
                                                    <option value="{{ $schedule_element->schedule }}">{{$schedule_element->schedule}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>

                                    <td>
                                        <input type="text" name="quantity[]" class="form-control inputfix" placeholder="Quantity" value="{{$pushpam_matah->quantity}}">
                                    </td>

                                    <td>
                                        <input type="text" name="weight[]" class="form-control inputfix" placeholder="Weight" value="{{$pushpam_matah->weight}}">
                                    </td>
                                    <td>
                                        <input type="text" name="remarks_mat[]" class="form-control inputfix" placeholder="Remarks" value="{{$pushpam_matah->remarks}}">
                                    </td>

                                    <td>
                                        <!-- Order status -->
                                    <select class="form-control" name="order_status[]">
                                        @foreach($status as $order_status)
                                            @if($pushpam_matah->status == $order_status->status)
                                                <option value="{{$order_status->status}}" selected>{{$order_status->status}}</option>
                                            @else
                                            <option value="{{$order_status->status}}">{{$order_status->status}}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    </td>

                                </tr>

                                @endforeach

                                </tbody>
                            </table>


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
            $('#purchase_order_date').datepicker();
            $('#required_delivery_date').datepicker();
        });
    </script>


@stop