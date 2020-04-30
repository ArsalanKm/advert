@extends('layouts.adminLayouts')


@section('content')
    <div class="card">

        <div class="col-lg-9" id="tablesInfo" style="text-align: right;max-width: 100%">
            <div class="test">
                <div class="col-lg-3">
                    <div class="content">
                        <i class="icon-user">


                        </i>
                        <p>
                            {{$userCount}}
                        </p>
                        <a>
                            تعداد کل مشتریان
                        </a>

                    </div>
                </div>




                <div class="col-lg-3">
                    <div class="content">
                        <i class="icon-user">


                        </i>
                        <p>
                            {{$advertCount}}
                        </p>
                        <a href="/admin/advert">
                            تعداد کل آگهی ها
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="content">
                        <i class="icon-shopping-cart">


                        </i>
                        <p>
                            {{$orderCount}}
                        </p>
                        <a href="/admin/orders">
                            تعداد کل سفرش ها
                        </a>

                    </div>
                </div>
                <div class="col-lg-3">
                    <?php
                    $totalCash=0;

                    foreach ($orders as $order) {
                        if ($order->status==1){
                            $totalCash+=(int)$order->price;
                        }
                    }

                    ?>

                    <div class="content">
                        <i class="icon-money">
                        </i>
                        <p>
                            {{$totalCash}}
                        </p>
                        <a href="/admin/orders" style="margin-right: 60px">
                           مقدار سود
                        </a>

                    </div>
                </div>
            </div>

        </div>


        <div class="col-lg-9" style="float:left; margin-top: 30px;margin-left: 18px;max-width: 97%">
            <div style="margin-top: 30px;text-align: center;" class="panel panel-default">

                <h3>
                    newest orders
                </h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>order name</th>
                        <th>order date</th>
                        <th>peygiri number</th>
                        <th>price</th>


                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>first Order</td>
                        <td>farvardin</td>
                        <td>323223</td>
                        <td>111110</td>

                    </tr>

                    </tbody>

                </table>

            </div>
        </div>
    </div>
@endsection
