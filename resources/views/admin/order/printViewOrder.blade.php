<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type"  charset="utf-8" content="text/html" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Details to {{ $order->name }}-{{date('Y-m-d:F:Ss')}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js" ></script>
    <script type="text/javascript">
        $(window).ready(function(){
            window.print();
        });
    </script>
    <style>

        #customers {

            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;

        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color:#3399ff;
            color: white;

        }

        #customers .empty, #customers .empty {
            border: 0px solid #ddd;
            padding: 15px;

        }
        #customers .empty{
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background:none;
            color: white;
            border:none;

        }
        #customers .empty{
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background:white;
            color: white;
            border:none;

        }

    </style>
</head>
<body>
    <header style="background: #1c89d2;width: 100% ; padding: 25px 5px ; margin-bottom: 30px">
        <div style="display: flex;  justify-content: space-between; flex-direction: column ; width: 70%; margin: 0 auto; color: white">
            <h3 >This is Templet For Order Details To: <strong style="color: #bfbfbf">{{ $order->name }} </strong> <span class="badge badge-dark">{{date('Y D m')}}</span></h3>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <h6>ORDER DETAILS</h6>
            <hr/>
            <table id="customers">
                <tr>
                    <th colspan="2">ORDER DETAILS : Customer</th>
                    <th class="empty"></th>
                    <th colspan="2">Shipping Details : Shop</th>


                </tr>
                <tr>
                    <td>Name: </td>
                    <td>{{ $order->name }}</td>
                    <td class="empty"></td>

                    <td>Name:</td>
                    <td>{{ $shipping->ship_name }}</td>
                </tr>

                <tr>
                    <td>Phone: </td>
                    <td>{{ $order->phone }}</td>
                    <td class="empty"></td>

                    <td>Phone:</td>
                    <td>{{ $shipping->ship_phone }} </td>
                </tr>
                <tr>
                    <td>Payment Type: </td>
                    <td>{{ $order->payment_type }}</td>
                    <td class="empty"></td>

                    <td>Email:</td>
                    <td>{{ $shipping->ship_email }}</td>
                </tr>
                <tr>
                    <td>Payment Id: </td>
                    <td>{{ $order->payment_id }}</td>
                    <td class="empty"></td>

                    <td>Address:</td>
                    <td>{{ $shipping->ship_address }}</td>
                </tr>
                <tr>
                    <td>Total :</td>
                    <td>{{ $order->total }} $</td>
                    <td class="empty"></td>

                    <td>City :	</td>
                    <td>{{ $shipping->ship_city }}</td>
                </tr>
                <tr>
                    <td>Month:</td>
                    <td> {{ $order->month }} </td>
                    <td class="empty"></td>
                    <td colspan="2">
                        @if($order->status == 0)
                            <span class="badge badge-warning">Pending</span>
                        @elseif($order->status == 1)
                            <span class="badge badge-info">Payment Accept</span>
                        @elseif($order->status == 2)
                            <span class="badge badge-warning">Progress Delevered</span>
                        @elseif($order->status == 3)
                            <span class="badge badge-success">Delevered</span>
                        @else
                            <span class="badge badge-danger">Cancle</span>
                        @endif
                    </td>
                </tr>

                <tr>
                    <td>Date:</td>
                    <td>{{ $order->date }}</td>
                    <td class="empty"></td>
                    <td colspan="2" >
                        <div class="text-center">
                            @if($order->status == 0)
                                <strong class="text-info">Padding</strong>
                            @elseif($order->status == 1)
                                <strong  class="text-info">Payment Accept </strong>
                            @elseif($order->status == 2)
                                <strong  class="text-success">In Delevered </strong>
                            @elseif($order->status == 4)
                                <strong class="text-danger text-center"> This order are not valid Or Cancel Order  </strong>
                            @else
                                <strong class="text-success text-center">This product are successfuly Deleverd  </strong>
                            @endif
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row py-4" style="width: 100%">
            <div class="container"style="width: 100%;margin: 0 auto">
                <div class="card pd-20 pd-sm-40 col-lg-12">
                    <h6 style="margin: 0px;text-align:center;" class="card-title alert badge-primary">Product Details</h6>


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
                                    <td>$ {{ $row->singleprice }}</td>
                                    <td>$ {{ $row->totalprice }}</td>
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
</html>







