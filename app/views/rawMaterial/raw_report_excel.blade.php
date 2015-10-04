<!doctype html>
    <html>
        <head>
            <?php
            $filename="RawMaterial ".date("Y-m-d");
            header("Content-type: application/vnd.ms-excel");
            header("Content-Disposition: attachment;Filename=". $filename .".xls");
            ?>
        </head>
        <body>
        <table>
            <tr class="heading">
                <th>Id</th>
                <th>Recipet Code</th>
                <th>Date</th>
                <th>Size</th>
                <th>Manufacturer</th>
                <th>Heat No</th>
                <th>Weight</th>
                <th>Material Type</th>
                <th>Material Grade</th>
                <th>Internal No</th>
            </tr>

            @foreach($raw as $raw_data)
            <tr>
                <td>{{{ $raw_data->id }}}</td>
                <td>{{{ $raw_data->receipt_code }}}</td>
                <td>{{{ $raw_data->date }}}</td>
                <td>{{{ $raw_data->size }}}</td>
                <td>{{{ $raw_data->manufacturer }}}</td>
                <td>{{{ $raw_data->heat_no }}}</td>
                <td>{{{ $raw_data->weight }}}</td>
                <td>{{{ $raw_data->material_grade }}}</td>
                <td>{{{ $raw_data->raw_material_type }}}</td>
                <td>Auto gen</td>
            </tr>


            @endforeach


        </table>
        </body>
    </html>
