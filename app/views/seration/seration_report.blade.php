@extends('layouts.master')

@section('links_data')

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper wrapperRawReport">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Seration Entry report</span>
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

                            @foreach($data as $seration_data)

                            <tr>
                                <td>{{ $seration_data->seration_id }}</td>
                                <td>{{ $seration_data->date }}</td>
                                <td>{{ $seration_data->work_order_no }}</td>
                                <td>{{ $seration_data->item }}</td>
                                <td>{{ $seration_data->heat_no }}</td>
                                <td>{{ $seration_data->quantity }}</td>
                                <td>{{ $seration_data->machine_name }}</td>
                                <td>{{ $seration_data->grade }}</td>


                            </tr>
                            @endforeach
                        </table>



                        <div class="span9 btn-block excelPrint">
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="<?php echo  route('seration.excel'); ?>" class="link" >Generate Report in Excel</a>
                            </button>
                        </div>
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->


@stop