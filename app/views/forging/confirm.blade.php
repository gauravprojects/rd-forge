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
                                <th>Forging ID</th>
                                <th>Date</th>
                                <th>Forging Description</th>
                                <th>Weight per peice</th>
                                <th>Heat no</th>
                                <th>Quantity</th>
                                <th>Total Weight</th>
                            <tr>
                                <td>{{ $confirmation->forging_id }}</td>
                                <td>{{ $confirmation->date }}</td>
                                <td>{{ $confirmation->forged_des }}</td>
                                <td>{{ $confirmation->weight_per_piece }}</td>
                                <td>{{ $confirmation->heat_no }}</td>
                                <td>{{ $confirmation->quantity }}</td>
                                <td>{{ $confirmation->total_weight }}</td>
                            </tr>
                        </table>
                        <br><br><br><br>
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

@stop