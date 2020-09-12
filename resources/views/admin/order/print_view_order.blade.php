
    <div class="container ">
                <div class="pd-20 pd-sm-40">
                    <div class="row">
                        <div class="col-md-6 py-3">
                            <div class="card">
                                <div class="card-header"><strong>Order</strong> Details</div>
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

                        <div class="col-md-6 py-3">
                            <div class="card">
                                <div class="card-header"><strong>Shipping</strong> Details</div>
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
    </div>




