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
        <th>Cutting Id</th>
        <th>Date</th>
        <th>Size</th>
        <th>Heat No</th>
        <th>Quantity</th>
        <th>Weight per piece</th>
        <th>Total Weight</th>
        <th>Available Weight</th>
    </tr>

    @foreach($all_records as $cutting_data)
        <tr>
            <td>{{ $cutting_data->cutting_id }}</td>
            <td>{{ $cutting_data->date }}</td>
            <td>{{ $cutting_data->raw_mat_size }}</td>
            <td>{{ $cutting_data->heat_no  }}</td>
            <td>{{ $cutting_data->quantity }}</td>
            <td>{{ $cutting_data->weight_per_piece }}</td>
            <td>{{ $cutting_data->total_weight }}</td>
            <th>{{ $cutting_data->available_weight_cutting }}</th>

        </tr>
    @endforeach




</table>

</body>
</html>
