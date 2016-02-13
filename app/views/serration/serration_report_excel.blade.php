<!doctype html>
<html>
<head>
    <?php
    $filename="Serration ".date("Y-m-d");
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

    <h2>Serration Report</h2>
    <tr class="heading">
        <th>S.No</th>
        <th>Date</th>
        <th>Work Order Number</th>
        <th>Item</th>
        <th>Heat no</th>
        <th>Quantity</th>
        <th>Machine Name</th>
        <th>Grade</th>

    <?php $serial_number = 1; ?>

    @foreach($data as $serration_data)

        <tr>
            <td>{{ $serial_number++ }}</td>
            <td>{{ date('d-m-Y',strtotime($serration_data->date)) }}</td>
            <td>{{ $serration_data->work_order_no }}</td>
            <td>{{ $serration_data->item }}</td>
            <td>{{ $serration_data->heat_no }}</td>
            <td>{{ $serration_data->quantity }}</td>
            <td>{{ $serration_data->machine_name }}</td>
            <td>{{ $serration_data->grade }}</td>
        </tr>
    @endforeach
</table>

</body>
</html>
