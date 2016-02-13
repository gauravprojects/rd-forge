<!doctype html>
<html>
<head>
    <?php
     $filename="Forging ".date("Y-m-d");
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
<h2>Forging Report</h2>
<table cellpadding="10" cellspacing="10" border="2">
    <tr class="heading">
        <th>S.No</th>
        <th>Date</th>
        <th>Heat no</th>
        <th>Weight per peice</th>
        <th>Quantity</th>
        <th>Total Weight</th>
        <th>Size</th>
        <th>Pressure</th>
        <th>Type</th>
        <th>Schedule</th>
        <th>Remarks</th>
    </tr>

    <?php $serial_number = 1; ?>

    @foreach($forging_data as $confirmation)
        <tr>
            <td>{{ $serial_number++ }}</td>
            <td>{{ $confirmation->date }}</td>
            <td>{{ $confirmation->heat_no }}</td>
            <td>{{ $confirmation->weight_per_piece }}</td>
            <td>{{ $confirmation->quantity }}</td>
            <td>{{ $confirmation->total_weight }}</td>
            <td>{{ $confirmation->size }}</td>
            <td>{{ $confirmation->pressure }}</td>
            <td>{{ $confirmation->type }}</td>
            <td>{{ $confirmation->schedule }}</td>
            <td>{{ $confirmation->remarks }}</td>
        </tr>
    @endforeach
</table>

</body>
</html>
