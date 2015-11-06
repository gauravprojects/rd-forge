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
        <th>Forging ID</th>
        <th>Date</th>
        <th>Forging Description</th>
        <th>Weight per peice</th>
        <th>Heat no</th>
        <th>Quantity</th>
        <th>Total Weight</th>
        <th>Remarks</th>
    </tr>

    @foreach($forging_data as $confirmation)
        <tr>
            <td>{{ $confirmation->forging_id }}</td>
            <td>{{ $confirmation->date }}</td>
            <td>{{ $confirmation->forged_des }}</td>
            <td>{{ $confirmation->weight_per_piece }}</td>
            <td>{{ $confirmation->heat_no }}</td>
            <td>{{ $confirmation->quantity }}</td>
            <td>{{ $confirmation->total_weight }}</td>
            <td>{{ $confirmation->records }}</td>
        </tr>
    @endforeach
</table>

</body>
</html>
