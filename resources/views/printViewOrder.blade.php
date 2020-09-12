<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>order details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <div class="container ">
        <div class="card-header"><strong>Order</strong> Details</div>
        <div class="row">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tr class="thead-light">
                                <th > Name: </th>
                                <th> {{ $order->name }} </th>
                            </tr>

                            <tr class="thead-default">
                                <th> Phone: </th>
                                <th> {{ $order->phone }} </th>
                            </tr>



                            <tr class="thead-light">
                                <th> Payment Type: </th>
                                <th>{{ $order->payment_type }} </th>
                            </tr>



                            <tr class="thead-default">
                                <th> Payment Id: </th>
                                <th> {{ $order->payment_id }} </th>
                            </tr>


                            <tr class="thead-light">
                                <th> Total : </th>
                                <th> {{ $order->total }} $ </th>
                            </tr>

                            <tr class="thead-default">
                                <th> Month: </th>
                                <th> {{ $order->month }} </th>
                            </tr>

                            <tr class="thead-light">
                                <th> Date: </th>
                                <th> {{ $order->date }} </th>
                            </tr>

                        </table>


                    </div>



                </div>
        </div>
        <hr>
        <div class="card-header"><strong>Shipping</strong> Details</div>
        <div class="row">

                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tr class="thead-light">
                                <th> Name: </th>
                                <th> {{ $shipping->ship_name }} </th>
                            </tr>

                            <tr class="thead-default">
                                <th> Phone: </th>
                                <th> {{ $shipping->ship_phone }} </th>
                            </tr>



                            <tr class="thead-light">
                                <th> Email: </th>
                                <th>{{ $shipping->ship_email }} </th>
                            </tr>



                            <tr class="thead-default">
                                <th> Address: </th>
                                <th> {{ $shipping->ship_address }} </th>
                            </tr>


                            <tr class="thead-light">
                                <th> City : </th>
                                <th> {{ $shipping->ship_city }} </th>
                            </tr>

                            <tr class="thead-default">
                                <th> Status: </th>
                                <th>
                                    @if($order->status == 0)
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($order->status == 1)
                                        <span class="badge badge-info">Payment Accept</span>
                                    @elseif($order->status == 2)
                                        <span class="badge badge-warning">Progress</span>
                                    @elseif($order->status == 3)
                                        <span class="badge badge-success">Delevered</span>
                                    @else
                                        <span class="badge badge-danger">Cancle</span>

                                    @endif

                                </th>

                            </tr>
                            <tr>
                                <th colspan="2">
                                    <div class="text-center">
                                        @if($order->status == 0)
                                            <strong class="text-info">Padding</strong>
                                        @elseif($order->status == 1)
                                            <strong  class="text-info">Process Delevery </strong>
                                        @elseif($order->status == 2)
                                            <strong  class="text-success">Delevery Done </strong>
                                        @elseif($order->status == 4)
                                            <strong class="text-danger text-center"> This order are not valid  </strong>
                                        @else
                                            <strong class="text-success text-center">This product are successfuly Deleverd  </strong>
                                        @endif
                                    </div>
                                </th>

                            </tr>


                        </table>
                    </div>

                </div>

        </div>
        <div class="row">
            <div class="container">
                <div class="card pd-20 pd-sm-40 col-lg-12">
                    <h6 class="card-title">Product Details</h6>


                    <div class="table-wrapper">
                        <table class="table display responsive nowrap">
                            <thead>
                            <tr>
                                <th class="wd-15p">Product ID</th>
                                <th class="wd-15p">Product Name</th>
                                <th class="wd-15p">Image</th>
                                <th class="wd-15p">Color</th>
                                <th class="wd-15p">Size</th>
                                <th class="wd-15p">Quantity</th>
                                <th class="wd-15p">Unit Price</th>
                                <th class="wd-20p">Total</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($details as $row)
                                <tr>
                                    <td>{{ $row->product_code }}</td>
                                    <td>{{ $row->product_name }}</td>

                                    <td> <img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;"> </td>
                                    <td>{{ $row->color }}</td>
                                    <td>{{ $row->size }}</td>
                                    <td>{{ $row->quantity }}</td>
                                    <td>{{ $row->singleprice }}</td>
                                    <td>{{ $row->totalprice }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- table-wrapper -->
                </div><!-- card -->
            </div>
        </div>
</div>
</body>
{{--<body style="width: 80%; margin: 15px auto; ">--}}
{{--    <h3 align="center" style="background: #23a067;padding: 15px ; border-radius: 5px; color: white"><strong>Order</strong> Details</h3>--}}
{{--    <table width="100%" style="border-collapse: collapse; border: 0px;">--}}
{{--        <tr class="thead-light">--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%"> Name: </th>--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%"> {{ $order->name }} </th>--}}
{{--        </tr>--}}

{{--        <tr class="thead-default">--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%"> Phone: </th>--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%"> {{ $order->phone }} </th>--}}
{{--        </tr>--}}



{{--        <tr class="thead-light">--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%"> Payment Type: </th>--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%">{{ $order->payment_type }} </th>--}}
{{--        </tr>--}}



{{--        <tr class="thead-default">--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%"> Payment Id: </th>--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%"> {{ $order->payment_id }} </th>--}}
{{--        </tr>--}}


{{--        <tr class="thead-light">--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%"> Total : </th>--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%"> {{ $order->total }} $ </th>--}}
{{--        </tr>--}}

{{--        <tr class="thead-default">--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%"> Month: </th>--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%"> {{ $order->month }} </th>--}}
{{--        </tr>--}}

{{--        <tr class="thead-light">--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%"> Date: </th>--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%"> {{ $order->date }} </th>--}}
{{--        </tr>--}}

{{--    </table>--}}


{{--    <h3 align="center" style="background: #23a067;padding: 15px ; border-radius: 5px; color: white"><strong>Shipping</strong> Details</h3>--}}
{{--    <table width="100%" style="border-collapse: collapse; border: 0px;">--}}
{{--                            <tr class="thead-light">--}}
{{--                                <th style="border: 1px solid; padding:12px;" width="20%"> Name: </th>--}}
{{--                                <th style="border: 1px solid; padding:12px;" width="20%" > {{ $shipping->ship_name }} </th>--}}
{{--                            </tr>--}}

{{--                            <tr class="thead-default">--}}
{{--                                <th style="border: 1px solid; padding:12px;" width="20%"> Phone: </th>--}}
{{--                                <th style="border: 1px solid; padding:12px;" width="20%"> {{ $shipping->ship_phone }} </th>--}}
{{--                            </tr>--}}



{{--                            <tr class="thead-light">--}}
{{--                                <th style="border: 1px solid; padding:12px;" width="20%"> Email: </th>--}}
{{--                                <th style="border: 1px solid; padding:12px;" width="20%">{{ $shipping->ship_email }} </th>--}}
{{--                            </tr>--}}



{{--                            <tr class="thead-default">--}}
{{--                                <th style="border: 1px solid; padding:12px;" width="20%"> Address: </th>--}}
{{--                                <th style="border: 1px solid; padding:12px;" width="20%"> {{ $shipping->ship_address }} </th>--}}
{{--                            </tr>--}}


{{--                            <tr class="thead-light">--}}
{{--                                <th style="border: 1px solid; padding:12px;" width="20%"> City : </th>--}}
{{--                                <th style="border: 1px solid; padding:12px;" width="20%"> {{ $shipping->ship_city }} </th>--}}
{{--                            </tr>--}}

{{--                            <tr class="thead-default">--}}
{{--                                <th style="border: 1px solid; padding:12px;" width="20%"> Status: </th>--}}
{{--                                <th style="border: 1px solid; padding:12px;" width="20%">--}}
{{--                                    @if($order->status == 0)--}}
{{--                                        <span style="color: white;padding:7px;border-radius:12px; background: #0b7285" >Pending</span>--}}
{{--                                    @elseif($order->status == 1)--}}
{{--                                        <span style="color: white;padding:7px; border-radius:12px;background: #0b7285" >Payment Accept</span>--}}
{{--                                    @elseif($order->status == 2)--}}
{{--                                        <span style="color: white;padding:7px; border-radius:12px;background: #0b7285" >Progress</span>--}}
{{--                                    @elseif($order->status == 3)--}}
{{--                                        <span style="color: white;padding:7px;border-radius:12px; background: #0b7285" >Delevered</span>--}}
{{--                                    @else--}}
{{--                                        <span  style="color: white;padding:7px;border-radius:12px; background: #0b7285" >Cancle</span>--}}

{{--                                    @endif--}}

{{--                                </th>--}}

{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <th style="border: 1px solid; padding:12px;" width="20%"  colspan="2">--}}
{{--                                    <div  align="center" class="text-center">--}}
{{--                                        @if($order->status == 0)--}}
{{--                                            <strong style="color: white;padding:7px;border-radius:12px; background: #0b7285" >Padding</strong>--}}
{{--                                        @elseif($order->status == 1)--}}
{{--                                            <strong  style="color: white;padding:7px;border-radius:12px; background: #0b7285">Process Delevery </strong>--}}
{{--                                        @elseif($order->status == 2)--}}
{{--                                            <strong  style="color: white;padding:7px;border-radius:12px; background: #0b7285">Delevery Done </strong>--}}
{{--                                        @elseif($order->status == 4)--}}
{{--                                            <strong style="color: white;padding:7px;border-radius:12px; background: #0b7285"> This order are not valid  </strong>--}}
{{--                                        @else--}}
{{--                                            <strong style="color: white;padding:7px;border-radius:12px; background: #0b7285">This product are successfuly Deleverd  </strong>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </th>--}}

{{--                            </tr>--}}


{{--                        </table>--}}


{{--    <h6 align="center"style="background: #23a067;padding: 15px ; border-radius: 5px; color: white">Product Details</h6>--}}
{{--    <table width="100%" style="border-collapse: collapse; border: 0px;">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%">Product ID</th>--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%">Product Name</th>--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%">Image</th>--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%">Color</th>--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%">Size</th>--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%">Quantity</th>--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%">Unit Price</th>--}}
{{--            <th style="border: 1px solid; padding:12px;" width="20%">Total</th>--}}

{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($details as $row)--}}
{{--            <tr>--}}
{{--                <td style="border: 1px solid; padding:12px;" >{{ $row->product_code }}</td>--}}
{{--                <td style="border: 1px solid; padding:12px;" >{{ $row->product_name }}</td>--}}

{{--                <td style="border: 1px solid; padding:12px;"> <img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;"> </td>--}}
{{--                <td style="border: 1px solid; padding:12px;">{{ $row->color }}</td>--}}
{{--                <td style="border: 1px solid; padding:12px;">{{ $row->size }}</td>--}}
{{--                <td style="border: 1px solid; padding:12px;">{{ $row->quantity }}</td>--}}
{{--                <td style="border: 1px solid; padding:12px;">{{ $row->singleprice }}</td>--}}
{{--                <td style="border: 1px solid; padding:12px;">{{ $row->totalprice }}</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}


{{--    <table width="100%" style="border-collapse: collapse; border: 0px; height: 30px">--}}
{{--        <tr class="thead-light">--}}
{{--            <th style="background: #23a067;padding: 15px ; border-radius: 5px; color: white ;border: 1px solid; padding:12px;" width="5%">Signature</th>--}}
{{--            <th style="border: 1px solid; padding:12px;" width="45%"></th>--}}
{{--        </tr>--}}
{{--    </table>--}}
{{--</body>--}}

</html>







