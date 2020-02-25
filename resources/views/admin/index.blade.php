@extends('layouts.adminLayouts')


@section('content')
    <div class="card">

        <div class="col-lg-9" style="text-align: right;max-width: 100%">
            <div class="test">
                <div class="col-lg-3">
                    <div class="content">
                        <i class="icon-user">
                            <p>
                                1
                            </p>
                            <span>
                    total users
                </span>

                        </i>

                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="content">
                        <i class="icon-comment">
                            <p>
                                1
                            </p>
                            <span>
                    total comments
                </span>

                        </i>

                    </div>
                </div>


                <div class="col-lg-3">
                    <div class="content">
                        <i class="icon-user">
                            <p>
                                1
                            </p>
                            <span>
total advertisements
                </span>

                        </i>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="content">
                        <i class="icon-shopping-cart">
                            <p>
                                1
                            </p>
                            <span>
                    total orders
                </span>

                        </i>

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