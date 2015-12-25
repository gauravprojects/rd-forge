@extends('layouts.master')

@section('links_data')

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper wrapperRawReport">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Machining Report</span>
                        </div>
                    </div>

                @if($data)

                    <div class="row">
                        <table>
                            <tr class="heading">
                                <th>Machining Id</th>
                                <th>Date</th>
                                <th>Work Order Number</th>
                                <th>Item</th>
                                <th>Heat no</th>
                                <th>Quantity</th>
                                <th>Machine Name</th>
                                <th>Grade</th>
                                <th>Weight</th>
                                <th>Update/Delete</th>
                            @foreach($data as $machining_data)

                            <tr>
                                <td>{{ $machining_data->mach_id }}</td>
                                <td>{{ $machining_data->date }}</td>
                                <td>{{ $machining_data->work_order_no }}</td>
                                <td>{{ $machining_data->item }}</td>
                                <td>{{ $machining_data->heat_no }}</td>
                                <td>{{ $machining_data->quantity }}</td>
                                <td>{{ $machining_data->machine_name }}</td>
                                <td>{{ $machining_data->grade }}</td>
                                <td>{{ $machining_data->weight }}</td>
                                <td>
                                        <a href="{{ action('machiningController@update',array('id'=>$machining_data->mach_id))}}" class="link" >Update</a>
                                    <br>
                                        <a href="{{ action('machiningController@destroy',array('id'=>$machining_data->mach_id))}}" class="link" >Delete</a>

                                </td>
                            </tr>

                            @endforeach
                        </table>



                        <div class="span9 btn-block excelPrint">

                                <a href="<?php echo  route('machining.excel'); ?>" class="btn btn-small btn-block" >Generate Report in Excel</a>
                                
                        </div>

              @else
                    <p class="center-align">No report currently present</p>    
              @endif
              
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->


@stop