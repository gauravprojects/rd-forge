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
                                    <td>{{ $data->customer_name }}</td>

                                    <th class="heading" style="text-align:center;">Work Order No</th>
                                    <td>{{ $data->work_order_no }}</td>
                                </tr>

                                <tr>
                                    <th class="heading" style="text-align:center;">Required Delivery Date</th>
                                    <td>{{ $data->required_delivery_date }}</td>

                                    <th class="heading" style="text-align:center;">Remarks</th>
                                    <td>{{ $data->remarks }}</td>
                                </tr>

                            </table>

                            <?php

    $last_record_details= DB::select(DB::raw("SELECT * from work_order_material_details where work_order_no LIKE '%".$data->work_order_no."%'"));

?>
                            <table>

                                <tr>
                                    <th class="heading" style="text-align:center;" colspan="6"> Item Details</th>
                                </tr>
                                <tr>
                                    <th class="heading" style="text-align:center;">Work Order No</th>
                                    <th class="heading" style="text-align:center;">Description</th>
                                    <th class="heading" style="text-align:center;">Material Grade</th>
                                    <th class="heading" style="text-align:center;">Quantity</th>
                                    <th class="heading" style="text-align:center;">Weight</th>
                                    <th class="heading" style="text-align:center;">Remarks</th>
                                </tr>
                            @foreach($last_record_details as $details)
                                <tr>
                                    <td>{{ $details->work_order_no }}</td>
                                    <td>{{ $details->description }}</td>
                                    <td>{{ $details->material_grade }}</td>
                                    <td>{{ $details->quantity }}</td>
                                    <td>{{ $details->weight }}</td>
                                    <td>{{ $details->remarks }}</td>

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