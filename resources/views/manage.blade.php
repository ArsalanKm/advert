<?php
use App\HelperFunction\Helper;
?>

@extends('layouts.userLayouts')

@section('content')

    <div id="app" style="height: auto">

        <div class="col-lg-12">
            <div class="progress-manage progress col-lg-4" style="width: 492px">

                <ul>
                    <li class="completed">
                        <i style="background-color: #00ff62"></i>
                        <span class="progress" style="background-color: #00ff62">
                </span>
                        <p> ثبت شده
                        </p>
                    </li>
                    @if($advert->status==1)
                        <li class="warning">
                            <i style="background-color: #ffde59"></i>
                            <span id="verifyCode" class="progress">
                </span>
                            <p> تائید شماره
                            </p>

                        </li>
                    @else
                        <li class="warning">
                            <i style="background-color: #ffde59"></i>
                            <span class="progress">
                </span>
                            <p> تائید شماره
                            </p>

                        </li>

                    @endif

                    <li class="red">
                        <i style="background-color: red"></i>
                        <span class="progress" style="background-color: red;display: none">
                </span>
                        <p> در انتظار بررسی
                        </p>
                    </li>
                    <li class="end" style="width: 0px">
                        <i style="background-color: #632c00"></i>
                        <span class="progress" style="background-color: #632c00;display: none">
                </span>
                        <p style="position: relative;right: 5px;top: -2px">انتشار</p>


                    </li>
                </ul>


            </div>
        </div>

        @if($advert->status==1)

            <div class="manage-text col-lg-12"
                 style="font-family: iran;margin-top: 114px;text-align: center;display: none">
                <p style="font-size: 20px"> پیامکی حاوی کد تایید به شما ارسال خواهد شد. لطفا کد را در اینجا وارد کنید
                    .</p>
                <div class="col-lg-2" style="position: relative;right: -42%;">
                    <div class="form-group">
                        <label style="float: right;margin-right: 0">کد تایید</label>

                        <input type="text" class="form-control" name="code" v-model="code">

                        <button class="btn btn-success" type="" style="margin-top: 10px" @click="verifyCode()">تایید
                        </button>

                    </div>

                </div>

            </div>
            <span class="col-lg-12" id="line"
                  style="width: 100%;height: 0px;color: #cccccc;display: block;border: 1px solid #ccc;margin-top: 200px">

    </span>
        @else
            <div class="manage-text col-lg-12" style="font-family: iran;margin-top: 114px;text-align: center;">
                <p style="font-size: 20px"> پیامکی حاوی کد تایید به شما ارسال خواهد شد. لطفا کد را در اینجا وارد کنید
                    .</p>
                <div class="col-lg-2" style="position: relative;right: -42%;">
                    <div class="form-group">
                        <label style="float: right;margin-right: 0">کد تایید</label>

                        <input type="text" class="form-control" name="code" v-model="code">

                        <button class="btn btn-success" type="" style="margin-top: 10px" @click="verifyCode()">تایید
                        </button>

                    </div>

                </div>

            </div>
            <span class="col-lg-12" id="line"
                  style="width: 100%;height: 0px;color: #cccccc;display: block;border: 1px solid #ccc;">

    </span>
        @endif


        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">پیش نمایش</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/edit/{{$category_id}}/{{$id}}">ویرایش</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu2">ارتقاء</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu4">حذف</a>
            </li>
        </ul>


        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane col-lg-12 active" id="home">


                <div class="home_page">


                    <div class="col-lg-8" style="margin-right: 51px;">

                        <div class="card" style="text-align: right;padding-right: 16px;padding-top: 21px;">

                        <span style="font-size: 34px;font-weight: bold;">
                            {{$advert->subject}}

                        </span>

                            <p style="margin-top: 32px;font-size: 18px;">دیروز</p>


                        </div>


                    </div>

                    <div class="col-lg-8" style="margin-right: 51px; margin-top:10px;">

                        <div class="card" style="text-align: right;padding-right: 16px;padding-top: 21px;">

                            <div class="header" style="border-bottom:1px solid #b7b7b7;padding-bottom: 11px;">مشخصات
                            </div>


                            <ul class="information">
                                <li class="email"><span>  ایمیل :  </span>
                                    <p>
                                        {{$advert->email}}
                                    </p>
                                </li>
                                <li class="phone"><span> تلفن :</span>
                                    <p>
                                        {{$advert->mobile}}
                                    </p>
                                </li>
                                <li class="city"><span>شهر:  </span>
                                    <p>
                                        {{$advert->city}}
                                    </p>
                                </li>

                                <li class="active_chat"><span>وضعیت چت :  </span>
                                    <p>
                                        <?php
                                        if ($advert->chat == 1) {
                                            echo "چت فعال است.";
                                        } else if ($advert->chat == 0) {
                                            echo "جت فعال نیست";
                                        }
                                        ?>

                                    </p>
                                </li>
                                <li class="shoe_email"><span>وضعیت نشان دادن ایمیل :  </span>
                                    <p>
                                        <?php
                                        if ($advert->noemail == 1) {
                                            echo "ایمیل شما در آگهی نشان داده میشود.";
                                        } else if ($advert->noemail == 0) {
                                            echo "ایمیل شما در آگهی نشان داده نمیشود.";
                                        }
                                        ?>

                                    </p>
                                </li>

                                {{Helper::Estate($id)}}
                                {{Helper::Car($id)}}
                            </ul>


                        </div>


                    </div>

                    <div class="col-lg-8" style="margin-right: 51px; margin-top:10px;margin-bottom: 50px">

                        <div class="card" style="text-align: right;padding-right: 16px;padding-top: 21px;">
                            <div class="header" style="border-bottom:1px solid #b7b7b7;padding-bottom: 11px;">توضیحات
                            </div>
                            <span style="font-size: 16px;">

                            {{$advert->text}}
                        </span>


                        </div>


                    </div>

                    <div class="col-lg-3" style="position: absolute;left: 90px;top: 0;">


                        <div class="card" style="height:400px;">

                            <div class="slider" style="overflow: hidden">

                                {{Helper::Image($id)}}

                            </div>
                            <ul id="nav_item">

                                {{Helper::images($id)}}


                            </ul>


                        </div>


                    </div>

                </div>
            </div>
            <div class="tab-pane container fade" id="menu1">...</div>
            <div class="tab-pane container fade" id="menu2" style="background: white;top: 22px">
                <div class="col-lg-12">
                    <p>
                        لطفا از لیست زیر موارد را انتخاب و پرداخت نمایید:
                    </p>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>اانتخاب</th>
                            <th>نام هزیننه</th>
                            <th>مبلغ</th>
                            <th>وضعیت</th>
                            <th>کد هدیه</th>
                            <th>توضیحات</th>
                        </tr>

                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>5</td>
                            <td>5</td>
                            <td>5</td>
                            <td>5</td>                        </tr>
                        </tbody>
                    </table>
                </div>


            </div>

            <div class="tab-pane container fade" id="menu4" style="top: 10px;right: -15px">

                <form action="/deleteadvert" method="post">

                    {{csrf_field()}}
                    <input type="text" value="{{$advert->id}}" name="advert_id">
                    <input type="submit" value="حذف" class="btn btn-danger">
                </form>

            </div>


        </div>
    </div>




@endsection
