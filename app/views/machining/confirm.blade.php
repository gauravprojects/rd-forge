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
                            <tr>
                                <td>{{ date('d-m-Y',strtotime($last_record->date)) }}</td>
                                <td>{{ $last_record->work_order_no }}</td>
                                <td>{{ $last_record->item }}</td>
                                <td>{{ $last_record->heat_no }}</td>
                                <td>{{ $last_record->quantity }}</td>
                                <td>{{ $last_record->machine_name }}</td>
                                <td>{{ $last_record->grade }}</td>
                                <td>{{ $last_record->weight }}</td>

                            </tr>
                        </table>
                        <div class="span9 btn-block excelPrint">
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('machiningController@update',array('id'=>$last_record->mach_id))}}" class="link" >Update</a>
                            </button>

                        </div>
                         <div class="span9 btn-block excelPrint">
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('machiningController@index')  }}" class="link" >New Machining Entry</a>
                            </button>
                        </div>
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

@stop