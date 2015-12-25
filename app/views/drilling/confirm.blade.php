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
                                <th>Drilling Id</th>
                                <th>Date</th>
                                <th>Work Order Number</th>
                                <th>Item</th>
                                <th>Heat no</th>
                                <th>Quantity</th>
                                <th>Machine Name</th>
                                <th>Grade</th>
                                <th>Remarks</th>

                            <tr>
                                <td>{{ $last_record->drilling_id }}</td>
                                <td>{{ $last_record->date }}</td>
                                <td>{{ $last_record->work_order_no }}</td>
                                <td>{{ $last_record->item }}</td>
                                <td>{{ $last_record->heat_no }}</td>
                                <td>{{ $last_record->quantity }}</td>
                                <td>{{ $last_record->machine_name }}</td>
                                <td>{{ $last_record->grade }}</td>
                                <td>{{ $last_record->remarks }}</td>


                            </tr>
                        </table>
                        <div class="span9 btn-block excelPrint">
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('drillingController@update',array('id'=>$last_record->drilling_id))}}" class="link" >Update</a>
                            </button>

                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('drillingController@destroy',array('id'=>$last_record->drilling_id))}}" class="link" >Delete</a>
                            </button>


                        </div>
                         <div class="span9 btn-block excelPrint">
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('drillingController@index')  }}" class="link" >New Drilling Entry</a>
                            </button>
                        </div>
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

@stop