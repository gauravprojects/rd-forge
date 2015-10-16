<!doctype html>
<html>
<head>
    <?php


    // $filename="RawMaterial ".date("Y-m-d");
    // header("Content-type: application/vnd.ms-excel");
    // header("Content-Disposition: attachment;Filename=". $filename .".xls");
    ?>
</head>
<body>
<table>
    <tr class="heading">
        <th>Seration Id</th>
        <th>Date</th>
        <th>Work Order Number</th>
        <th>Item</th>
        <th>Heat no</th>
        <th>Quantity</th>
        <th>Machine Name</th>
        <th>Grade</th>

    @foreach($data as $machining_data)

        <tr>
            <td>{{ $machining_data->seration_id }}</td>
            <td>{{ $machining_data->date }}</td>
            <td>{{ $machining_data->work_order_no }}</td>
            <td>{{ $machining_data->item }}</td>
            <td>{{ $machining_data->heat_no }}</td>
            <td>{{ $machining_data->quantity }}</td>
            <td>{{ $machining_data->machine_name }}</td>
            <td>{{ $machining_data->grade }}</td>
        </tr>
    @endforeach
</table>

</body>
</html>
