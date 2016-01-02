@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                         <span>Your work order has been placed</span>
                        </div>
                    </div>
                    <div class="row">
                        <div><!-- For details form work_order_details table -->
                            <table>
                                <tr>
                                    <th class="heading" style="text-align:center;">Customer Name</th>
                                    <td>{{ $work_order_details[0]->customer_name }}</td>

                                    <th class="heading" style="text-align:center;">Work Order No</th>
                                    <td>{{ $work_order_details[0]->work_order_no }}</td>
                                </tr>

                                <tr>

                                <th class="heading" style="text-align:center;">Purchase Order Date</th>
                                    <td>{{ $work_order_details[0]->purchase_order_date }}</td>

                                    <th class="heading" style="text-align:center;">Required Delivery Date</th>
                                    <td>{{ $work_order_details[0]->required_delivery_date }}</td>
                                </tr>
                                <tr>
                                    <th class="heading" style="text-align:center;">Remarks</th>
                                    <td>{{ $work_order_details[0]->remarks }}</td>

                                    <th class="heading" style="text-align:center;">Inspection</th>
                                    <td>{{ $work_order_details[0]->inspection }}</td>
                                </tr>


                                <tr>
                                    <th class="heading" style="text-align:center;">Packing Instructions</th>
                                    <td>{{ $work_order_details[0]->packing_instruction }}</td>

                                    <th class="heading" style="text-align:center;">Testing Instructions</th>
                                    <td>{{ $work_order_details[0]->testing_instruction }}</td>
                                </tr>
                                <tr>
                                    <th class="heading" style="text-align:center;">Quatation No</th>
                                    <td>{{ $work_order_details[0]->quatation_no }}</td>
                                </tr>
                            </table>



                          <table>

                                <tr>
                                    <th class="heading" style="text-align:center;" colspan="6"> Item Details</th>
                                </tr>
                                <tr>
                                    <th class="heading" style="text-align:center;">Item No</th>
                                    <th class="heading" style="text-align:center;">Material Grade</th>
                                    <th class="heading" style="...">Size</th>
                                    <th class="heading" style="...">Pressure</th>
                                    <th class="heading" style="...">Type</th>
                                    <th class="heading" style="...">Schedule</th>
                                    <th class="heading" style="text-align:center;">Quantity</th>
                                    <th class="heading" style="text-align:center;">Weight</th>
                                    <th class="heading" style="text-align:center;">Remarks</th>
                                </tr>


                              @foreach($work_order_material_details as $data)


                                 <tr>

                                   
                                    <td>{{ $data->item_no }}</td>
                                    <td>{{ $data->material_grade }}</td>
                                    <td>{{ $data->size }}</td>
                                    <td>{{ $data->pressure }}</td>
                                    <td>{{ $data->type }}</td>
                                    <td>{{ $data->schedule }}</td>
                                    <td>{{ $data->quantity }}</td>
                                    <td>{{ $data->weight }}</td>
                                    <td>{{ $data->remarks }}</td>

                                </tr>
                                  @endforeach

                            </table>

                            {{--<button class="btn btn-small btn-block" type="button" id="excel_button">--}}
                                {{--<a href="{{ action('workOrderController@update',array('id'=>$work_order_details[0]->work_order_no))}}" class="link" >Update</a>--}}
                            {{--</button>--}}


                        </div>

                    </div>

                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->




@stop