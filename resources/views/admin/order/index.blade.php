
@extends('layouts.adminLayouts')


@section('content')

    <?php
    use Hekmatinasser\Verta\Verta;
   ;

    ?>
    <div class="card">

        <div class="card-header"><h3 style="text-align: center">مشاهده کل سفارش هاا</h3></div>
        <section class="col-lg-12" id="app" style="padding-top: 40px;">


            <div class="panel panel-default">


                <div class="panel-heading"><h3 style="text-align: center">سفارش ها  </h3></div>
                <div style="">
                    <div class="panel-body">

                        <table class="table table-bordered table-striped table-hover"
                               style="text-align: center;direction: rtl">

                            <thead>

                            <tr>
                                <th>شماره سفارش</th>
                                <th>تاریخ سفارش</th>
                                <th>موضوع سقارش</th>
                                <th>ایمیل</th>
                                <th>موبایل</th>
                                <th>شهر</th>
                                <th>قیمت سفارش</th>
                                <th>وضعیت</th>

                                <th>حذف</th>


                            </tr>

                            </thead>
                            <tbody>

                            @foreach($orders as $order)

                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>

                                        <?php
                                        $v = new Verta($order->updated_at);
                                        ?>
                                        {{$v}}
                                    </td>
                                    <td style="cursor: pointer;" data-toggle="modal"
                                        data-target="">{{$order->subject}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->mobile}}</td>
                                    <td>{{$order->city}}</td>
                                    <td>

                                       {{$order->price}}


                                    </td>
                                    <td>

                                        @if($order->check ==1)

                                            <i class="icon icon-ok-circle" style="color: #1c7430;cursor: pointer;"
                                               ></i>

                                        @elseif($order->check ==0)
                                            <i class="icon icon-remove" style="color: red;cursor: pointer;"
                                               ></i>


                                        @endif
                                    </td>
                                    <td>

                                        <form action="/admin/removeorder" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" value="{{$order->id}}" name="order_id">
                                            <button type="submit" style="border: none;box-shadow: none;"><i
                                                    class="icon icon-trash" style="color: red"></i></button>

                                        </form>

                                    </td>

                                    @endforeach


                                </tr>


                            </tbody>


                        </table>

{{--                        {{$orders->links()}}--}}


                    </div>


                </div>


            </div>


        </section>


{{--        @foreach($order as $order)--}}

{{--            <div class="modal " id="Modal{{$order->Id}}" tabindex="-1" role="dialog"--}}
{{--                 aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                <div class="modal-dialog" role="document" style="margin: 1.75rem 18% !important;">--}}
{{--                    <div class="modal-content" style="width: 900px !important;">--}}
{{--                        <div class="modal-header">--}}
{{--                            <h5 class="modal-title" id="exampleModalLabel">{{$order->subject}}</h5>--}}
{{--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                <span aria-hidden="true">&times;</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div class="modal-body">--}}

{{--                            {{Helper::modalcar($order->Id)}}--}}

{{--                            {{Helper::modalstate($order->Id)}}--}}

{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        @endforeach--}}


    </div>

@endsection
