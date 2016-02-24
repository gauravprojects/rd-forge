  $(document).ready(function () {
            $('#options').change(function () {
                options= $('#options').val();
                var html = "";
                if(options == null)
                    html = "";
                else
                {
                    for(var i=0;i<options.length;i++)
                        html = html + '<input type="text" class="form-control inputfix" placeholder="Enter '+options[i]+' here " class="'+options[i]+'">';
                }
                $('#search_form_div').html(html);
            });

            $("#search_query").on("click",function(){

                var options= $('#options').val();
                var array_mine = new Array();
                var category = $("#categories").val().substr(0,$("#categories").val().length-6)+"records";

               $.each($('#search_form_div input'),function(key,getting)
               {
                array_mine.push(getting.value)
               });

                $.ajax({
                    'type': 'GET',
                    'url' : 'search/display',
                    'data' : {options_name:options,options_values:array_mine,category:category}
                })
                .done(function(data)
                {
                    $("#report_display").html(window[$("#categories").val().substr(0,$("#categories").val().length-6)](JSON.parse(data)));
                });

            });

        });

  function work_order_(data)
  {
    var report_data = "";
    var serial_number = 1;
    var serial_number2 = 1;
    var haslooped = false;

    report_data = report_data + '<table>'+
                '<tr class="heading">'+
                    '<th>S.No</th>'+
                    '<th>Work order no.</th>'+
                    '<th>Purchase order no.</th>'+
                    '<th>Customer name</th>'+
                    '<th>Purchase order date</th>'+
                    '<th>Required delivery Date</th>'+
                    '<th>Inspection</th>'+
                    '<th>Packing Instruction</th>'+
                    '<th>Testing Instruction</th>'+
                    '<th>Quotation Number</th>'+
                '</tr>';
    console.log(data);

    $.each(data,function(key,report){

        if(haslooped == false)
        {
            report_data = report_data + '<tr>' +
            '<td>'+ serial_number++ +'</td>'+     
            '<td>'+report.work_order_no+'</td>'+
            '<td>'+report.purchase_order_no+'</td>'+
            '<td>'+report.customer_name+'</td>'+
            '<td>'+report.purchase_order_date+'</td>'+
            '<td>'+report.required_delivery_date+'</td>'+
            '<td>'+report.inspection+'</td>'+
            '<td>'+report.packing_instruction+'</td>'+
            '<td>'+report.testing_instruction+'</td>'+
            '<td>'+report.quotation_no+'</td>';

            report_data = report_data + '</tr>';
            haslooped = true;
        }

    });

    report_data = report_data + '</table><br/><br/><table>'+
                '<tr class="heading">'+
                    '<th>S.No</th>'+
                    '<th>Item no.</th>'+
                    '<th>Material Grade</th>'+
                    '<th>Size</th>'+
                    '<th>Pressure</th>'+
                    '<th>Schedule</th>'+
                    '<th>Quantity</th>'+
                    '<th>Weight</th>'+
                    '<th>Remarks</th>'+
                    '<th>Status</th>'+
                '</tr>';

     $.each(data,function(key,report){

        report_data = report_data + '<tr>' +
        '<td>'+ serial_number2++ +'</td>'+     
        '<td>'+report.item_no+'</td>'+
        '<td>'+report.material_grade+'</td>'+
        '<td>'+report.size+'</td>'+
        '<td>'+report.pressure+'</td>'+
        '<td>'+report.schedule+'</td>'+
        '<td>'+report.quantity+'</td>'+
        '<td>'+report.weight+'</td>'+
        '<td>'+report.remarks+'</td>'+
        '<td>'+report.status+'</td>';
        report_data = report_data + '</tr>';

    });


    report_data = report_data + "</table>";
    return report_data;
  }
  function raw_material_(data)
  {
    var report_data = "";
    var serial_number = 1;

    report_data = report_data + '<table>'+
                '<tr class="heading">'+
                    '<th>S.No</th>'+
                    '<th>Receipt Code</th>'+
                    '<th>Date</th>'+
                    '<th>Size</th>'+
                    '<th>Manufacturer</th>'+
                    '<th>Heat No</th>'+
                    '<th>Weight</th>'+
                    '<th>Material Type</th>'+
                    '<th>Material Grade</th>'+
                '</tr>';

    $.each(data,function(key,report){

        report_data = report_data + '<tr>' +
        '<td>'+ serial_number++ +'</td>'+     
        '<td>'+report.receipt_code+'</td>'+
        '<td>'+report.date+'</td>'+
        '<td>'+report.size+'</td>'+
        '<td>'+report.manufacturer+'</td>'+
        '<td>'+report.heat_no+'</td>'+
        '<td>'+report.weight+'</td>'+
        '<td>'+report.raw_material_type+'</td>'+
        '<td>'+report.material_grade+'</td>';
        report_data = report_data + '</tr>';

    });

    report_data = report_data + "</table>";
    return report_data;

  }

function cutting_(data)
{
    var report_data = "";
    var serial_number = 1;

    report_data = report_data + '<table>'+
                '<tr class="heading">'+
                    '<th>S.No</th>'+
                    '<th>Date</th>'+
                    '<th>Size</th>'+
                    '<th>Heat No</th>'+
                    '<th>Quantity</th>'+
                    '<th>Weight per piece</th>'+
                    '<th>Total Weight</th>'+
                    '<th>Size</th>'+
                    '<th>Pressure</th>'+
                    '<th>Type</th>'+
                    '<th>Schedule</th>'+
                    '<th>Available_Weight</th>'+
                '</tr>';

    $.each(data,function(key,report){

        report_data = report_data + '<tr>' +
        '<td>'+ serial_number++ +'</td>'+     
        '<td>'+report.date+'</td>'+
        '<td>'+report.raw_mat_size+'</td>'+
        '<td>'+report.heat_no+'</td>'+
        '<td>'+report.quantity+'</td>'+
        '<td>'+report.weight_per_piece+'</td>'+
        '<td>'+report.total_weight+'</td>'+
        '<td>'+report.size+'</td>'+
        '<td>'+report.pressure+'</td>'+
        '<td>'+report.type+'</td>'+
        '<td>'+report.schedule+'</td>'+
        '<td>'+report.available_weight_cutting+'</td>';
        report_data = report_data + '</tr>';

    });

    report_data = report_data + "</table>";
    return report_data;

  }

function forging_(data)
{
    var report_data = "";
    var serial_number = 1;

    report_data = report_data + '<table>'+
                '<tr class="heading">'+
                    '<th>S.No</th>'+
                    '<th>Receipt Code</th>'+
                    '<th>Date</th>'+
                    '<th>Size</th>'+
                    '<th>Manufacturer</th>'+
                    '<th>Heat No</th>'+
                    '<th>Weight</th>'+
                    '<th>Material Type</th>'+
                    '<th>Material Grade</th>'+
                '</tr>';

    $.each(data,function(key,report){

        report_data = report_data + '<tr>' +
        '<td>'+ serial_number++ +'</td>'+     
        '<td>'+report.receipt_code+'</td>'+
        '<td>'+report.date+'</td>'+
        '<td>'+report.size+'</td>'+
        '<td>'+report.manufacturer+'</td>'+
        '<td>'+report.heat_no+'</td>'+
        '<td>'+report.weight+'</td>'+
        '<td>'+report.raw_material_type+'</td>'+
        '<td>'+report.material_grade+'</td>';
        report_data = report_data + '</tr>';

    });

    report_data = report_data + "</table>";
    return report_data;

  }

function machining_(data)
{
    var report_data = "";
    var serial_number = 1;

    report_data = report_data + '<table>'+
                '<tr class="heading">'+
                    '<th>S.No</th>'+
                    '<th>Date</th>'+
                    '<th>Work Order Number</th>'+
                    '<th>Item</th>'+
                    '<th>Heat No</th>'+
                    '<th>Quantity</th>'+
                    '<th>Machine Name</th>'+
                    '<th>Grade</th>'+
                    '<th>Weight</th>'+
                '</tr>';

    $.each(data,function(key,report){

        report_data = report_data + '<tr>' +
        '<td>'+ serial_number++ +'</td>'+     
        '<td>'+report.date+'</td>'+
        '<td>'+report.work_order_no+'</td>'+
        '<td>'+report.item+'</td>'+
        '<td>'+report.heat_no+'</td>'+
        '<td>'+report.quantity+'</td>'+
        '<td>'+report.machine_name+'</td>'+
        '<td>'+report.grade+'</td>'+
        '<td>'+report.weight+'</td>';
        report_data = report_data + '</tr>';

    });

    report_data = report_data + "</table>";
    return report_data;

  }

function drilling_(data)
{
    var report_data = "";
    var serial_number = 1;

    report_data = report_data + '<table>'+
                '<tr class="heading">'+
                    '<th>S.No</th>'+
                    '<th>Date</th>'+
                    '<th>Work Order Number</th>'+
                    '<th>Item</th>'+
                    '<th>Heat No</th>'+
                    '<th>Quantity</th>'+
                    '<th>Machine Name</th>'+
                    '<th>Grade</th>'+
                    '<th>Weight</th>'+
                '</tr>';

    $.each(data,function(key,report){

        report_data = report_data + '<tr>' +
        '<td>'+ serial_number++ +'</td>'+     
        '<td>'+report.date+'</td>'+
        '<td>'+report.work_order_no+'</td>'+
        '<td>'+report.item+'</td>'+
        '<td>'+report.heat_no+'</td>'+
        '<td>'+report.quantity+'</td>'+
        '<td>'+report.machine_name+'</td>'+
        '<td>'+report.grade+'</td>'+
        '<td>'+report.weight+'</td>';
        report_data = report_data + '</tr>';

    });

    report_data = report_data + "</table>";
    return report_data;

  }

  function serration_(data)
  {
    var report_data = "";
    var serial_number = 1;

    report_data = report_data + '<table>'+
                '<tr class="heading">'+
                    '<th>S.No</th>'+
                    '<th>Date</th>'+
                    '<th>Work Order Number</th>'+
                    '<th>Item</th>'+
                    '<th>Heat No</th>'+
                    '<th>Quantity</th>'+
                    '<th>Machine Name</th>'+
                    '<th>Grade</th>'+
                    '<th>Weight</th>'+
                '</tr>';

    $.each(data,function(key,report){

       report_data = report_data + '<tr>' +
        '<td>'+serial_number++ +'</td>'+     
        '<td>'+report.date+'</td>'+
        '<td>'+report.work_order_no+'</td>'+
        '<td>'+report.item+'</td>'+
        '<td>'+report.heat_no+'</td>'+
        '<td>'+report.quantity+'</td>'+
        '<td>'+report.machine_name+'</td>'+
        '<td>'+report.grade+'</td>'+
        '<td>'+report.weight+'</td>';
        report_data = report_data + '</tr>';

    });

    report_data = report_data + "</table>";
    return report_data;

  }