@extends('layouts.master')

@section('links_data')

    <div>
        <div class="row">
           

        </div>


    </div>




    <div style="width: 900px; float:right;">
        <table>
            <tr class="heading">
                <th>Log Id</th>
                <th>Date</th>
                <th>Time</th>
                <th>Category</th>
                <th>Details</th>
            </tr>

            @foreach($data as $log_data)
                <tr>
                    <td>{{ $log_data->log_id }}</td>
                    <td>{{ $log_data->date }}</td>
                    <td>{{ $log_data->time }}</td>
                    <td>{{ $log_data->category }}</td>
                    <td>{{ $log_data->details }}</td>
                </tr>


            @endforeach


        </table>





    </div>







@stop
