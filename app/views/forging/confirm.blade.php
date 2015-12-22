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
                                <th>Weight per peice</th>
                                <th>Heat no</th>
                                <th>Standard Size</th>
                                <th>Pressure</th>
                                <th>Type</th>
                                <th>Schedule</th>
                                <th>Quantity</th>
                                <th>Total Weight</th>
                            <tr>
                                <td>{{ $last_record->forging_id }}</td>
                                <td>{{ $last_record->date }}</td>
                                <td>{{ $last_record->weight_per_piece }}</td>
                                <td>{{ $last_record->heat_no }}</td>
                                <td> {{ $last_record->size }}</td>
                                <td>{{ $last_record->pressure }}</td>
                                <td>{{ $last_record->type }}</td>
                                <td> {{ $last_record->schedule }}</td>
                                <td>{{ $last_record->quantity }}</td>
                                <td>{{ $last_record->total_weight }}</td>
                            </tr>
                        </table>
                        <div class="span9 btn-block excelPrint">
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('forgingController@update',array('id'=>$last_record->forging_id))}}" class="link" >Update</a>
                            </button>

                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('forgingController@destroy',array('id'=>$last_record->forging_id))}}" class="link" >Delete</a>
                            </button>
                        </div>
                         <div class="span9 btn-block excelPrint">
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('forgingController@index')  }}" class="link" >New Forging Entry</a>
                            </button>
                        </div>
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

@stop