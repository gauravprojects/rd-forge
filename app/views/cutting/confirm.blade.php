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

                    <div class="row">
                        <table>
                            <tr class="heading">
                                <th>Cutting Id</th>
                                <th>Date</th>
                                <th>Size</th>
                                <th>Heat No</th>
                                <th>Quantity</th>
                                <th>Weight per piece</th>
                                <th>Total Weight</th>
                            </tr>
                            <tr>
                                <td>{{$last_record->cutting_id }}</td>
                                <td>{{$last_record->date }}</td>
                                <td>{{$last_record->raw_mat_size}}</td>
                                <td>{{$last_record->heat_no}}</td>
                                <td>{{$last_record->quantity}}</td>
                                <td>{{$last_record->weight_per_piece}}</td>
                                <td>{{$last_record->total_weight}}</td>
                            </tr>
                        </table>
                        <br><br><br><br>
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

@stop