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
                                <th>Date</th>
                                <th>Work Order Number</th>
                                <th>Item</th>
                                <th>Heat no</th>
                                <th>Quantity</th>
                                <th>Machine Name</th>
                                <th>Grade</th>
                                <th>Weight</th>

                            </tr>
                            @foreach($confirmations as $confirmation)
                            <tr>
                                <td>{{ date('d-m-Y',strtotime($confirmation->date)) }}</td>
                                <td>{{ $confirmation->work_order_no }}</td>
                                <td>{{ $confirmation->item }}</td>
                                <td>{{ $confirmation->heat_no }}</td>
                                <td>{{ $confirmation->quantity }}</td>
                                <td>{{ $confirmation->machine_name }}</td>
                                <td>{{ $confirmation->grade }}</td>
                                <td>{{ $confirmation->weight }}</td>
                            </tr>
                            @endforeach



                        </table>

                        <div class="span9 btn-block excelPrint">
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('machiningController@update',array('id'=>$confirmation->mach_id))}}" class="link" >Update</a>
                            </button>
                        </div>
                        <br><br><br><br>
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

@stop