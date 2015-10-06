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
    <tr class="heading">
        <th>Cutting Id</th>
        <th>Date</th>
        <th>Size</th>
        <th>Heat No</th>
        <th>Quantity</th>
        <th>Weight per piece</th>
        <th>Total Weight</th>
        <th>Description</th>
        <th>Remarks</th>
    </tr>


    @foreach($cutting as $cutting_data)
        <tr>

            <td>{{{ $cutting_data->cutting_id }}}</td>
            <td>{{{ $cutting_data->date }}}</td>
            <td>{{{ $cutting_data->raw_mat_size }}}</td>
            <td>{{{ $cutting_data->heat_no  }}}</td>
            <td>{{{ $cutting_data->quantity }}}</td>
            <td>{{{ $cutting_data->weight_per_piece }}}</td>
            <td>{{{ $cutting_data->total_weight }}}</td>
            <td>{{{ $cutting_data->item_des }}}</td>
            <td>{{{ $cutting_data->remarks }}}</td>
        </tr>


    @endforeach




</table>

</body>
</html>
