<!doctype html>
<html>
<head>
    <?php
    $filename="Machining ".date("Y-m-d");
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
<table cellpadding="10" cellspacing="10" border="2">

    <h2>Machining Report</h2>
    <tr class="heading">
        <th>Machining Id</th>
        <th>Date</th>
        <th>Work Order Number</th>
        <th>Item</th>
        <th>Heat no</th>
        <th>Quantity</th>
        <th>Machine Name</th>
        <th>Grade</th>
        <th>Weight</th>
    @foreach($data as $machining_data)

        <tr>
            <td>{{ $machining_data->mach_id }}</td>
            <td>{{ date('d-m-Y',strtotime($machining_data->date)) }}</td>
            <td>{{ $machining_data->work_order_no }}</td>
            <td>{{ $machining_data->item }}</td>
            <td>{{ $machining_data->heat_no }}</td>
            <td>{{ $machining_data->quantity }}</td>
            <td>{{ $machining_data->machine_name }}</td>
            <td>{{ $machining_data->grade }}</td>
            <td>{{ $machining_data->weight }}</td>

        </tr>
    @endforeach
</table>

</body>
</html>
