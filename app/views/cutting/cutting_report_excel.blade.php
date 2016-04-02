<!doctype html>
<html>
<head>
    <?php
    $filename="Cutting ".date("Y-m-d");
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment;Filename=". $filename .".xls");
    ?>
    <style type="text/css">

            tr,td,h2
            {
                text-align: center;
            }

    </style>
</head>
<body>
    <h2>Cutting Report</h2>
<table cellpadding="10" cellspacing="10" border="2">
    <tr class="heading">
        <th>S.No</th>
        <th>Date</th>
        <th>Size</th>
        <th>Heat No</th>
        <th>Quantity</th>
        <th>Weight per piece</th>
        <th>Total Weight</th>
        <th>Size</th>
        <th>Pressure</th>
        <th>Type</th>
        <th>Schedule</th>
        <th>Available Weight</th>
        <th>Remarks</th>
        <th>Description</th>
    </tr>

    <?php $serial_number = 1; ?>

    @foreach($all_records as $cutting_data)
        <tr>
            <td>{{ $serial_number++ }}</td>
            <td>{{ date('d-m-Y',strtotime($cutting_data->date)) }}</td>
            <td>{{ $cutting_data->raw_mat_size }}</td>
            <td>{{ $cutting_data->heat_no  }}</td>
            <td>{{ $cutting_data->quantity }}</td>
            <td>{{ $cutting_data->weight_per_piece }}</td>
            <td>{{ $cutting_data->total_weight }}</td>
            <td>{{ $cutting_data->size }}</td>
            <td>{{ $cutting_data->pressure }}</td>
            <td>{{ $cutting_data->type }}</td>
            <td>{{ $cutting_data->schedule }}</td>
            <th>{{ $cutting_data->available_weight_cutting }}</th>
            <td>{{ $cutting_data->remarks }}</td>
            <td>{{ $cutting_data->description }}</td>

        </tr>
    @endforeach




</table>

</body>
</html>
