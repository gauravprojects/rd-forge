@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <button class="btn btn-small btn-block" type="button" id="excel_button">
                    <a href="{{ action('workOrderController@excel') }}" class="link" >Generate report in excel</a>
                </button>
                <div class="card">
                    <div class="row text-center">

                        <div class="heading">

                            <span>Work Order Reports</span>
                        </div>
                    </div>



                    <div class="row">
                        @foreach($work_order_details as $work_order_detail)
                            <table>
                                <tr>
                                    <th class="heading" style="text-align:center;">Customer Name</th>
                                    <td>{{ $work_order_detail->customer_name }}</td>

                                    <th class="heading" style="text-align:center;">Work Order No</th>
                                    <td>{{ $work_order_detail->work_order_no }}</td>
                                </tr>

                                <tr>

                                    <th class="heading" style="text-align:center;">Purchase Order Date</th>
                                    <td>{{ $work_order_detail->purchase_order_date }}</td>

                                    <th class="heading" style="text-align:center;">Required Delivery Date</th>
                                    <td>{{ $work_order_detail->required_delivery_date }}</td>
                                </tr>
                                <tr>
                                    <th class="heading" style="text-align:center;">Remarks</th>
                                    <td>{{ $work_order_detail->remarks }}</td>

                                    <th class="heading" style="text-align:center;">Inspection</th>
                                    <td>{{ $work_order_detail->inspection }}</td>
                                </tr>


                                <tr>
                                    <th class="heading" style="text-align:center;">Packing Instructions</th>
                                    <td>{{ $work_order_detail->packing_instruction }}</td>

                                    <th class="heading" style="text-align:center;">Testing Instructions</th>
                                    <td>{{ $work_order_detail->testing_instruction }}</td>
                                </tr>
                                <tr>
                                    <th class="heading" style="text-align:center;">Quatation No</th>
                                    <td>{{ $work_order_detail->quatation_no }}</td>
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




                                        <?php if($data->work_order_no ==$work_order_detail->work_order_no)
                                          {
                                                echo "<tr>";
                                                echo "<td>".$data->item_no."</td>";
                                                echo "<td>".$data->material_grade."</td>";
                                                echo "<td>".$data->size."</td>";
                                                echo "<td>".$data->pressure."</td>";
                                                echo "<td>".$data->type."</td>";
                                                echo "<td>".$data->schedule."</td>";
                                                echo "<td>".$data->quantity."</td>";
                                                echo "<td>".$data->weight."</td>";
                                                echo "<td>".$data->remarks."</td>";
                                                echo "</tr>";
                                          }
                                          ?>

                            @endforeach
                                </table>




                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('workOrderController@update',array('id'=>$work_order_detail->work_order_no))}}" class="link" >Update</a>
                            </button>

                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('workOrderController@destroy',array('id'=>$work_order_detail->work_order_no))}}" class="link" >Delete</a>
                            </button>

                            <hr><br><br>

                        @endforeach



                            <hr><hr>
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('workOrderController@excel') }}" class="link" >Generate report in excel</a>
                            </button>


                    </div>

                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->




@stop