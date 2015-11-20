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
                                <th>Heat no</th>
                                <th>Weight per peice</th>
                                <th>Quantity</th>
                                <th>Total Weight</th>
                                <th>Size</th>
                                <th>Pressure</th>
                                <th>Type</th>
                                <th>Schedule</th>
                                <th>Remarks</th>
                            </tr>

                        @foreach($forging_data as $confirmation)
                            <tr>
                                <td>{{ $confirmation->forging_id }}</td>
                                <td>{{ $confirmation->date }}</td>
                                <td>{{ $confirmation->heat_no }}</td>
                                <td>{{ $confirmation->weight_per_piece }}</td>
                                <td>{{ $confirmation->quantity }}</td>
                                <td>{{ $confirmation->total_weight }}</td>
                                <td>{{ $confirmation->size }}</td>
                                <td>{{ $confirmation->pressure }}</td>
                                <td>{{ $confirmation->type }}</td>
                                <td>{{ $confirmation->schedule }}</td>
                                <td>{{ $confirmation->remarks }}</td>
                            </tr>
                        @endforeach
                        </table>

                        <div class="span9 btn-block excelPrint">
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="<?php echo  route('forging.excel'); ?>" class="link" >Generate Report in Excel</a>
                            </button>
                        </div>


                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

@stop