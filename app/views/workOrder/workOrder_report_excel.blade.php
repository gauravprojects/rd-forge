<!doctype html>
<html>
<head>
    <?php
    $filename="Work Order".date("Y-m-d");
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
<h2>Work Order Report</h2>

<div class="row">
    @foreach($work_order_details as $work_order_detail)
        <table>
            <tr>
                <th class="heading" style="text-align:center;">Customer Name</th>
                <td>{{ $work_order_detail->customer_name }}</td>

                <th class="heading" style="text-align:center;">Work Order No</th>
                <td>{{ $work_order_detail->work_order_no }}</td>
            </tr>

            <tr>

                <th class="heading" style="text-align:center;">Purchase Order Date</th>
                <td>{{ $work_order_detail->purchase_order_date }}</td>

                <th class="heading" style="text-align:center;">Required Delivery Date</th>
                <td>{{ $work_order_detail->required_delivery_date }}</td>
            </tr>
            <tr>
                <th class="heading" style="text-align:center;">Remarks</th>
                <td>{{ $work_order_detail->remarks }}</td>

                <th class="heading" style="text-align:center;">Inspection</th>
                <td>{{ $work_order_detail->inspection }}</td>
            </tr>


            <tr>
                <th class="heading" style="text-align:center;">Packing Instructions</th>
                <td>{{ $work_order_detail->packing_instruction }}</td>

                <th class="heading" style="text-align:center;">Testing Instructions</th>
                <td>{{ $work_order_detail->testing_instruction }}</td>
            </tr>
            <tr>
                <th class="heading" style="text-align:center;">Quatation No</th>
                <td>{{ $work_order_detail->quatation_no }}</td>
            </tr>
        </table>




        <table>
            <tr>
                <th class="heading" style="text-align:center;" colspan="6"> Item Details</th>
            </tr>
            <tr>
                <th class="heading" style="text-align:center;">Item No</th>
                <th class="heading" style="text-align:center;">Material Grade</th>
                <th class="heading" style="...">Size</th>
                <th class="heading" style="...">Pressure</th>
                <th class="heading" style="...">Type</th>
                <th class="heading" style="...">Schedule</th>
                <th class="heading" style="text-align:center;">Quantity</th>
                <th class="heading" style="text-align:center;">Weight</th>
                <th class="heading" style="text-align:center;">Remarks</th>
                <th class="heading" style="text-align:center;">Status</th>
            </tr>


            @foreach($work_order_material_details as $data)


                <?php if($data->work_order_no == $work_order_detail->work_order_no)
                {
                    echo "<tr>";
                    echo "<td>".$data->item_no."</td>";
                    echo "<td>".$data->material_grade."</td>";
                    echo "<td>".$data->size."</td>";
                    echo "<td>".$data->pressure."</td>";
                    echo "<td>".$data->type."</td>";
                    echo "<td>".$data->schedule."</td>";
                    echo "<td>".$data->quantity."</td>";
                    echo "<td>".$data->weight."</td>";
                    echo "<td>".$data->remarks."</td>";
                    echo "<td>".$data->status."</td>";
                    echo "</tr>";
                }
                ?>

            @endforeach
        </table>


        <hr><br><br>

    @endforeach



    <hr><hr>


</div>




</body>
</html>
