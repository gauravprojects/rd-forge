@extends('layouts.master')

@section('links_data')

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper wrapperRawReport">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Machining Dispatch Reports</span>
                        </div>
                    </div>

                    @if($dispatchDetails)

                        <?php $serial_number = 1; ?>
                        <div class="row">
                            <table>
                                <tr class="heading">
                                    <th>S.No</th>
                                    <th>Work Order no</th>
                                    <th>Item no</th>
                                    <th>Size</th>
                                    <th>Pressure</th>
                                    <th>Type</th>
                                    <th>Schedule</th>
                                    <th>Dispatch Quantity</th>
                                    <th>Dispatch Date</th>


                                @foreach($dispatchDetails as $dispatch_data)



                                    <tr>
                                        <td>{{ $serial_number++ }}</td>
                                        <td>{{ $dispatch_data->work_order_no }}</td>
                                        <td>{{ $dispatch_data->item }}</td>
                                        <td> {{ $dispatch_data->size }}</td>
                                        <td> {{ $dispatch_data->pressure }}</td>
                                        <td> {{ $dispatch_data->type }}</td>
                                        <td> {{ $dispatch_data->schedule }}</td>
                                        <td> {{ $dispatch_data->quantity }}</td>
                                        <td> {{ $dispatch_data->date }}</td>


                                    </tr>
                                @endforeach
                            </table>





                            @else
                                <p class="center-align">No report currently present</p>
                            @endif
                        </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->


@stop