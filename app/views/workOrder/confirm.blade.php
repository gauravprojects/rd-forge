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
                                    <th class="heading" style="text-align:center;">Required Delivery Date</th>
                                    <td>{{ $work_order_details[0]->required_delivery_date }}</td>

                                    <th class="heading" style="text-align:center;">Remarks</th>
                                    <td>{{ $work_order_details[0]->remarks }}</td>
                                </tr>
                            </table>



                          <table>

                                <tr>
                                    <th class="heading" style="text-align:center;" colspan="6"> Item Details</th>
                                </tr>
                                <tr>
                                    <th class="heading" style="text-align:center;">Work Order No</th>
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

                                   
                                    <td>{{ $data->work_order_no }}</td>
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



                        </div>

                    </div>

                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->




@stop