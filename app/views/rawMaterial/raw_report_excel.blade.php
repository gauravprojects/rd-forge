<!doctype html>
    <html>
        <head>
           <?php
            $filename="Raw Material ".date("Y-m-d");
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
        <h2>Raw Material Report</h2>
        <table cellpadding="10" cellspacing="10" border="2">
            <tr class="heading">
                <th>S.No</th>
                <th>Receipt Code</th>
                <th>Date</th>
                <th>Size</th>
                <th>Manufacturer</th>
                <th>Heat No</th>
                <th>Weight</th>
                <th>Invoice No</th>
                <th>Invoice date</th>
                <th>Material Type</th>
                <th>Material Grade</th>
                <th>Purchase order no</th>
                <th>Purchase Order Date</th>
            </tr>

            <?php $serial_number = 1; ?>

            @foreach($raw as $raw_data)
                <tr>
                    <td>{{{ $serial_number++ }}}</td>
                    <td>{{{ $raw_data->receipt_code }}}</td>
                    <td>{{{ date('d-m-Y',strtotime($raw_data->date)) }}}</td>
                    <td>{{{ $raw_data->size }}}</td>
                    <td>{{{ $raw_data->manufacturer }}}</td>
                    <td>{{{ $raw_data->heat_no }}}</td>
                    <td>{{{ $raw_data->weight }}}</td>
                    <td>{{{ $raw_data->invoice_no }}}</td>
                    <td>{{{ $raw_data->invoice_date }}}</td>
                    <td>{{{ $raw_data->raw_material_type }}}</td>
                    <td>{{{ $raw_data->material_grade }}}</td>
                    <td>{{{ $raw_data->pur_order_no }}}</td>
                    <td>{{{ $raw_data->pur_order_date }}}</td>
                </tr>


            @endforeach




        </table>

        </body>
    </html>
