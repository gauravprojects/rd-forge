@extends('layouts.master')

@section('links_data')

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Raw Material Entry report</span>
                        </div>
                    </div>
                    <div class="span9 btn-block">
                        <button class="btn btn-large btn-block btn-primary" type="button" id="excel_button">
                            <a href="http://localhost/rdforge/public/raw/excel" class="link" >Generate Report in Excel</a>
                        </button>
                    </div>


                    <div class="row">
                        <table>
                            <tr class="heading">
                                <th>Id</th>
                                <th>Recipet Code</th>
                                <th>Date</th>
                                <th>Size</th>
                                <th>Manufacturer</th>
                                <th>Heat No</th>
                                <th>Weight</th>
                                <th>Material Type</th>
                                <th>Material Grade</th>
                                <th>Internal No</th>
                            </tr>

                            @foreach($raw as $raw_data)
                                <tr>
                                    <td>{{{ $raw_data->id }}}</td>
                                    <td>{{{ $raw_data->receipt_code }}}</td>
                                    <td>{{{ $raw_data->date }}}</td>
                                    <td>{{{ $raw_data->size }}}</td>
                                    <td>{{{ $raw_data->manufacturer }}}</td>
                                    <td>{{{ $raw_data->heat_no }}}</td>
                                    <td>{{{ $raw_data->weight }}}</td>
                                    <td>{{{ $raw_data->material_grade }}}</td>
                                    <td>{{{ $raw_data->raw_material_type }}}</td>
                                    <td>Auto gen</td>
                                </tr>


                            @endforeach


                        </table>

                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->


@stop