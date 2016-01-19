@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <br><br>
                            <span>Form submited successfully with following details</span>
                            <br><br>
                        </div>
                    </div>
                    <!--
                    array(12) { ["receipt_code"]=> string(6) "123456" ["date"]=> string(10) "21/09/1994"
                    ["size"]=> string(0) "" ["manufacturer"]=> string(0) "" ["heat_no"]=> string(0) ""
                    ["weight"]=> string(0) "" ["pur_order_no"]=> string(0) "" ["pur_order_date"]=> string(0)
                    "" ["invoice_no"]=> string(0) "" ["invoice_date"]=> string(10) "21/09/1994"
                    ["material_grade"]=> string(7) "Grade 1" ["raw_material_type"]=> string(6) "Type 1" }
                    -->

                    <div class="row">
                        <table>
                            <tr class="heading">
                               <th>Cutting Id</th>
                                <th>Date</th>
                                <th>Size</th>
                                <th>Standard size</th>
                                <th>Pressure</th>
                                <th>Type</th>
                                <th>Schedule</th>
                                <th>Heat No</th>
                                <th>Quantity</th>
                                <th>Weight per piece</th>
                                <th>Total Weight</th>

                            </tr>
                            @foreach($confirmations as $confirmation)
                            <tr>
                               <td>{{$confirmation->cutting_id }}</td>
                                <td>{{$confirmation->date }}</td>
                                <td>{{$confirmation->raw_mat_size}}</td>
                                <td>{{$confirmation->size}}</td>
                                <td>{{$confirmation->pressure }}</td>
                                <td>{{$confirmation->type }}</td>
                                <td>{{$confirmation->schedule}}</td>
                                <td>{{$confirmation->heat_no }}</td>
                                <td>{{$confirmation->quantity}}</td>
                                <td>{{$confirmation->weight_per_piece}}</td>
                                <td>{{$confirmation->total_weight}}</td>
                            </tr>
                            @endforeach



                        </table>

                        <div class="span9 btn-block excelPrint">
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('cuttingPageController@update',array('id'=>$confirmation->cutting_id))}}" class="link" >Update</a>
                            </button>
                        </div>
                        <br><br><br><br>
                    </div>      <!-- row conatining form ends here -->
                </div>      <!-- card ends here -->
            </div>      <!-- wrapper ends here -->
        </div>      <!-- row ends here -->
    </div>      <!-- col-12 ends here -->

@stop