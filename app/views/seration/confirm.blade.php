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
                                <th>Seration Id</th>
                                <th>Date</th>
                                <th>Work Order Number</th>
                                <th>Item</th>
                                <th>Heat no</th>
                                <th>Quantity</th>
                                <th>Machine Name</th>
                                <th>Grade</th>

                            <tr>
                                <td>{{ $data->seration_id }}</td>
                                <td>{{ $data->date }}</td>
                                <td>{{ $data->work_order_no }}</td>
                                <td>{{ $data->item }}</td>
                                <td>{{ $data->heat_no }}</td>
                                <td>{{ $data->quantity }}</td>
                                <td>{{ $data->machine_name }}</td>
                                <td>{{ $data->grade }}</td>


                            </tr>
                        </table>
                        <br><br><br><br>
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

@stop