@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Work order status</span>
                        </div>
                    </div>

                    <div class="row">
                        <table>
                            <tr class="heading">                                
                                <th>Work Order No</th>
                                <th>Item No</th>
                                <th>Required Delivery Date</th>
                                <th>Machined</th>
                                <th>Drilled</th>
                                <th>Serrated</th>
                            </tr>
                                @for($i = 0;$i < count($data); $i++)
                            <tr>
                                    <td>{{$data[$i]->work_order_no}}</td>
                                    <td>{{$data[$i]->item_no}}</td>
                                    <td>{{date('d-m-Y',strtotime($data[$i]->required_delivery_date))}}</td>
                                    <td>{{$data[$i]->machining_quantity}}</td>
                                    <td>{{$data[$i]->drilling_quantity}}</td>
                                    <td>{{$data[$i]->serration_quantity}}</td>
                            </tr>
                                @endfor
                        </table>

                    </div>		<!-- row conatining form ends here -->

                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->




@stop