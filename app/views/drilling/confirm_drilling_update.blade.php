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
                               <th>Drilling Id</th>
                                <th>Date</th>
                                <th>Work Order Number</th>
                                <th>Item</th>
                                <th>Heat no</th>
                                <th>Quantity</th>
                                <th>Machine Name</th>
                                <th>Grade</th>
                                <th>Remarks</th>

                            </tr>
                            @foreach($confirmations as $confirmation)
                            <tr>
                                <td>{{ $confirmation->drilling_id }}</td>
                                <td>{{ $confirmation->date }}</td>
                                <td>{{ $confirmation->work_order_no }}</td>
                                <td>{{ $confirmation->item }}</td>
                                <td>{{ $confirmation->heat_no }}</td>
                                <td>{{ $confirmation->quantity }}</td>
                                <td>{{ $confirmation->machine_name }}</td>
                                <td>{{ $confirmation->grade }}</td>
                                <td>{{ $confirmation->remarks }}</td>
                            </tr>
                            @endforeach



                        </table>

                        <div class="span9 btn-block excelPrint">
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('drillingController@update',array('id'=>$confirmation->drilling_id))}}" class="link" >Update</a>
                            </button>
                        </div>
                        <br><br><br><br>
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

@stop