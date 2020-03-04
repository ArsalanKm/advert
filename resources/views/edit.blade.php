<?php

use App\HelperFunction\Helper;

?>


@extends("layouts.userLayouts")

@section('content')
    <style>
        body {
            background-color: #eeeeee !important;

        }

        header {
            background: white !important;
            font-family: special;
        }

        .card {
            height: 450px;
            width: 100%;
            margin-top: 25px;
            font-family: iran;

        }

        .col-lg-12 {
            float: right;
            margin-top: 55px;

        }

        .col-lg-9 {
            float: right;
            right: 13%;
            direction: rtl;
        }

        .advert_title {
            text-align: right;

        }

        .card .send-advert {
            padding: 0px 45px;
            margin-top: 15px;
        }

        .card .send-advert li {
            text-align: right;
            height: 40px;
            font-size: 10pt;
            line-height: 33px;
            cursor: pointer;
            padding-right: 15px;
            width: 93%;
            border-bottom: 1px solid #eeeeee;
        }

        .card .send-advert li:hover {
            background-color: #eeeeee;

        }

        .send-advert1 {
            display: none;
            font-size: 11pt !important;
            padding: 0px 45px;
            margin-top: 15px;
            font-weight: bold !important;
            font-family: iran;
        }

        .send-advert1 li {

            border-bottom: 2px solid #1b1e21 !important;
            text-align: right;
            height: 40px;
            font-size: 10pt;
            line-height: 33px;
            padding-right: 15px;
            width: 93%;
            border-bottom: 1px solid #eeeeee;
        }

        .send-advert1 i {
            height: 30px;
            display: block;
            float: right;
            position: relative;
            top: 6px;
            font-size: 30px;
            right: -11px;
            border-left: 1px solid #eee;
            width: 30px;
            cursor: pointer;
        }

        .send-advert1 h5 {
            padding: 10px;
        }

        .send-advert1 li:hover {
            background-color: #eeeeee;
            cursor: pointer;

        }

        .send-advert2 {
            display: block;
            font-size: 11pt !important;
            padding: 0px 45px;
            margin-top: 15px;
            font-weight: bold !important;
        }

        .send-advert2 li {

            border-bottom: 2px solid #cccccc !important;
            text-align: right;
            height: 40px;
            font-size: 10pt;
            line-height: 33px;
            padding-right: 15px;
            width: 93%;
            border-bottom: 1px solid #eeeeee;
        }

        .send-advert2 i {
            height: 30px;
            display: block;
            float: right;
            position: relative;
            top: 6px;
            font-size: 30px;
            right: -11px;
            border-left: 1px solid #eee;
            width: 30px;
            cursor: pointer;
        }

        .send-advert2 h5 {
            padding: 10px;
        }

        .send-advert2 li:hover {
            background-color: #eeeeee;
            cursor: pointer;

        }

        .cat_menu {
            position: relative;
        }

        .cat_menu i {
            position: absolute;
            right: 35px;
            top: 14px;
        }

        .send-advert2 p {
            padding: 0px;
            margin: 0px;
            text-align: right;
            font-size: 10px;
        }

        .sub_heading {
            text-align: right;
            padding-right: 40px;
            margin-top: 20px;
            border-bottom: 1px solid #1b1e21;
            line-height: 3;
            display: none;
        }

        .sub_heading i {
            position: relative;
            right: -10px;
        }

        .send-advert1 {
            display: none;
            font-size: 11pt !important;
            padding: 0px 45px;
            margin-top: 15px;
            font-weight: bold !important;
        }

        .submit li {

            border-bottom: 2px solid #1b1e21 !important;
            text-align: right;
            height: 40px;
            font-size: 10pt;
            line-height: 33px;
            padding-right: 15px;
            width: 93%;
            border-bottom: 1px solid #eeeeee;
        }

        .submit i {
            height: 30px;
            display: block;
            float: right;
            position: relative;
            top: 6px;
            font-size: 30px;
            right: -11px;
            border-left: 1px solid #eee;
            width: 30px;
            cursor: pointer;
        }

        .submit h5 {
            padding: 10px;
        }

        .submit li:hover {
            background-color: #eeeeee;
            cursor: pointer;

        }

        .submit {
            display: none;
        }

        .submit-category {
            padding: 20px;
            text-align: right;
        }

        .city_select {
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 23px;
        }

        #city_checkbox {
            width: 15px;
            height: 16px;
            float: right;
            position: relative;
            right: 121px;
            top: 3px;
        }

        .check1 {
            width: 85px;
            height: 16px;
            float: right;
            position: relative;
            right: 20px;
            top: 15px;
        }

        .check2 {
            width: 85px;
            height: 16px;
            float: right;
            position: relative;
            right: 80px;
            top: 16px;
        }

        .check1 input {
            width: 24px;
            width: 24px;
            height: 16px;
            position: relative;
            right: 53px;
            top: 4px;
        }

        .check2 input {
            width: 24px;
            height: 16px;
            position: relative;
            right: 70px;
            top: 6px;
        }

    </style>


    <div class="col-lg-12" id="app" style="font-family: iran;text-align: right">

        <div class="col-lg-9">
            <div class="col-lg-12"
                 style="background: white;margin-bottom: 40px;height: 100px;border-radius: 4px;padding: 30px;">
                <div class="advert_title">
                    <h3>{{$category->name}}</h3>
                </div>
            </div>
            <div class="card" id="card" style="height: 2000px;">

                <form action="/editadvert" method="post">
                    {{csrf_field()}}
                    <div class="col-lg-12">

                        <div class="col-lg-10">

                            <div class="form-group">

                                <label for="">شهر

                                    <select name="city" id="" style="" class="city_select">

                                        <option value="ساری" class="form-control">
                                            ساری
                                        </option>

                                        <option value="بابل" class="form-control">
                                            بابل
                                        </option>

                                        <option value="مازندران" class="form-control">
                                            مارندران
                                        </option>

                                        <option selected data-display="{{$advert->city}}">{{$advert->city}}</option>

                                    </select>


                            </div>


                        </div>

                        <div class="col-lg-10">

                            <div class="form-group">


                                <label for="">نقشه</label>


                            </div>


                        </div>


                        <div class="col-lg-4">

                            <div class="form-group">


                                <label for="">در حومه شهر است؟ </label>

                                <input name="countryside" type="checkbox" class="form-control" id="city_checkbox"
                                       value="1">


                            </div>


                        </div>


                        <div class="col-lg-12">

                            <div class="form-group">


                                <label for="">تصاویر</label>


                            </div>


                        </div>


                        {{--******************--}}
                        @if($state)
                            <div class="col-lg-12" style="margin-top: 200px;">
                                <div class="form-group">


                                    <label for="">متراژ(مترمربع)</label>


                                    <input name="area" type="text" class="form-control" value="{{$state->area}}">


                                </div>


                            </div>
                        @endif
                        <style>

                        </style>
                        <div class="col-lg-4">

                            <div class="form-group">


                                <label for="">نوع آگهی </label>
                                <br>

                                <span class="check1">
    ارائه
            <input type="radio" class="" :value="1" name="TypeAdvert" <?php if ($state->typeAdvert==1) echo "checked"?> )>
    </span>
                                <span class="check2">
            درخواستی

            <input type="radio" class="" value="0" name="TypeAdvert"  <?php if ($state->typeAdvert==0) echo "checked"?>>
            </span>

                            </div>


                        </div>

                        @if($state)
                            <div class="col-lg-4" style="margin-top: 66px">

                                <div class="form-group">


                                    <label for="">نوع آگهی دهنده</label>
                                    <br>

                                    <span class="check1">
    شخصی
                                        {{--if value equals to 1 it is personal advert--}}
                                        <input name="Advertiser" type="radio" class="" value="1"
                                               style="right: 48px;"  <?php if ($state->advertiser==1) echo "checked"?>>

    </span>
                                    <span class="check2">
            مشاور املاک
                                        {{--if value equals to 0 it is from amlak shop--}}

                                        <input name="Advertiser" type="radio" class="" value="0"
                                               style="right: 123px;top: -20px;" <?php if ($state->advertiser==0) echo "checked"?>>>
            </span>

                                </div>
                                <input type="hidden" v-bind:value="category.id" id="category" name="advert_id">

                            </div>
                            <div class="col-lg-4" style="float: right;margin-top: 60px">
                                <div class="form-group">
                                    <label for="">ودیعه (تومان)</label>
                                    <select class="form-control" id="" style="width: 78%;border-radius: 4px">

                                        <option value="0">قیمت مورد نظر</option>
                                        <option value="1">مجانی</option>
                                        <option value="2">توافقی</option>
                                    </select>

                                </div>

                            </div>
                            <div class="col-lg-8" style="float: left;margin-top: 90px">
                                <div class="form-group">
                                    <input type="text" name="deposit" value="{{$state->deposit}}"
                                           style="width: 100%;text-align: center">
                                </div>
                            </div>

                            {{--****************************--}}

                            <div class="col-lg-4" style="float: right;right: -33.4%">
                                <div class="form-group">
                                    <span style="display: block">اجاره (تومان)</span>
                                    <select name="form-control" id=""
                                            style="width: 78%;border-radius: 4px;border: 1px solid #ccc;height: 32px;">

                                        <option value="0">قیمت مورد نظر</option>
                                        <option value="1">مجانی</option>
                                        <option value="2">توافقی</option>
                                    </select>

                                </div>

                            </div>
                            <div class="col-lg-8" style="float: left;position: relative;top: -45px;">
                                <div class="form-group" style="text-align: center">
                                    <input type="text" name="rent" value="{{$state->rent}}"
                                           style="width: 100%;text-align: center"
                                    >
                                </div>
                            </div>



                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">تعداد اتاق</label>

                                    <select class="form-control" name="numberRoom" id=""
                                            style="width: 100%;border: 1px solid #ccc;border-radius: 4px;height: 34px;">
                                        <option selected data-display="{{$state->room_number}}">
                                            {{$state->room_number}}
                                        </option>
                                        <option value="0">بدون اتاق</option>
                                        <option value="1">یک</option>
                                        <option value="2">دو</option>
                                        <option value="3">سه</option>
                                        <option value="4">چهار</option>
                                        <option value="5">پنج یا بیشتر</option>
                                    </select>
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-12">
                            <div class="fom-group">
                                <label for="">شماره موبایل</label>
                                <input type="text" class="form-control" name="mobile" value="{{$advert->mobile}}">
                                <span style="font-size: 11px">کد تایید به شماره زیر ارسال خواهد شد.تماس و چت نیز با این شماره انجام میشود.</span>

                            </div>
                        </div>

                        <div class="col-lg-12">

                            <div class="form-group">
            <span style="margin-right: 20px">
                          ؟  چت دیوار فعال شود

            </span>
                                خیر
                                <input type="radio" style="position:relative;width: 2px;top: 2px" :value="0"
                                       name="chat">
                                بله
                                <input type="radio" style="position:relative;width: 2px;top: 2px" :value="1"
                                       name="chat">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">ایمیل</label>
                                <input type="email" class="form-control" name="email" value="{{$advert->email }}">
                                <span style="font-size: 11px">آدرس ایمیل خود را به درستی وارد کنید .لینک مدیریت آگهی به ایمیل شما ارسال میشود.</span>
                            </div>
                        </div>


                        <div class="col-lg-12">

                            <div class="form-group">
            <span style="margin-right: 20px">
                           ایمیل در آگهی نمایش داده شود.

            </span>
                                بله
                                <input class="" type="radio" style="position:relative;width: 2px;top: 2px"
                                       value="1" name="checkemail">

                                خیر
                                <input class="" type="radio" style="position:relative;width: 2px;top: 2px"
                                       value="0" name="checkemail">
                            </div>
                        </div>
                        <div class="col-lg-12" style="margin-top: 30px">
                            <div class="form-group">
                                <label for="">عنوان آگهی</label>
                                <input type="text" class="form-control" name="subject" value="{{$advert->subject}}">
                                <span style="font-size: 11px">از عنوان های کوتاه و مفید استفاده کنید. اشاره به محله ی ملک و متراژ آن موجب بیشتر شدن آگهی میشود.</span>
                            </div>
                        </div>


                        <div class="col-lg-12" style="margin-top: 30px">
                            <div class="form-group">
                                <label for="">توضیحات آگهی</label>
                                <textarea type="" class="form-control" name="text">{{$advert->text}}</textarea>
                                <span style="font-size: 11px">تمام جزئیات و نکات قابل توجه آگهی خود را به صورت کامل و دقیق ذکر کنید. توجه به این مورد به صورت قابل توجهی ابهامات کاربر را برطرف خواهد کرد و شانس موفقیت آگهی شما را افزایش خواهد داد.</span>
                            </div>
                        </div>
                        <div id="boatAddForm">
                        </div>
                        <div class="col-lg-12" style="margin-top: 30px;text-align: left;margin-bottom: 20px">
                            <input name="advert_id" type="hidden" value="{{$id}}">


                            <button type="submit" class="btn btn-danger"
                                    style="background-color: #c00c1a;color: white;width: 150px">

                                ثبت تغییرات
                            </button>
                        </div>


                    </div>
                    <div id="editimage">
                    </div>
                </form>


                <form action="/editimage" method="post" class="dropzone" id="dropzone5"
                      style="position: absolute;float: right;top: 14%;width: 93%;right: 3%;">
                    {{csrf_field()}}
                    {{--<input type="file" name="file" />--}}
                </form>

            </div>
            <div class="" style="height: 2200px">


            </div>


        </div>
    </div>
@endsection