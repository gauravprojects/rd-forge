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
                                <th>Recipet Code</th>
                                <th>Date</th>
                                <th>Size</th>
                                <th>Manufacturer</th>
                                <th>Heat No</th>
                                <th>Weight</th>
                                <th>Left Over Weight</th>
                                <th>Material Type</th>
                                <th>Material Grade</th>
                                <th>Internal No</th>
                            </tr>
                            <tr>
                                <td>{{ $confirmation['receipt_code']; }}</td>
                                <td>{{ $confirmation['date']; }}</td>
                                <td>{{ $confirmation['size']; }}</td>
                                <td>{{ $confirmation['manufacturer']; }}</td>
                                <td>{{ $confirmation['heat_no']; }}</td>
                                <td>{{ $confirmation['weight']; }}</td>
                                <td>{{ $confirmation['left_over_weight']; }}</td>
                                <td>{{ $confirmation['material_grade']; }}</td>
                                <td>{{ $confirmation['raw_material_type']; }}</td>
                                <td>Auto Gen.</td>
                            </tr>
                        </table>
                        <br><br><br><br>
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

@stop