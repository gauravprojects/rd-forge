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
                {{  dd($raw); }}

                    <div class="row">
                        <table>
                            <tr class="heading">
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
                            <tr>
                                <td>{{ $raw['receipt_code']; }}</td>
                                <td>{{ $raw['date']; }}</td>
                                <td>{{ $raw['size']; }}</td>
                                <td>{{ $raw['manufacturer']; }}</td>
                                <td>{{ $raw['heat_no']; }}</td>
                                <td>{{ $raw['weight']; }}</td>
                                <td>{{ $raw['material_grade']; }}</td>
                                <td>{{ $raw['raw_material_type']; }}</td>
                                <td>Auto Gen.</td>
                            </tr>
                        </table>

                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->


@stop