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

    <div class="col-lg-12" id="app" style="font-family: iran">

        <div class="col-lg-9">
            <div class="advert_title">
                <h3>ارسال رایگان آگهی</h3>
            </div>
            <div class="card" id="card">


                {{--******************************************--}}

                <ul class="send-advert">

                    <li v-for="category in categories" @click="SendAdvert(category.id)" v-if="category.parent_id==0">@{{
                        category.name }}
                    </li>
                </ul>

                <ul class="send-advert1">

                    <li>
                        <i class="icon icon-angle-right"></i>
                        <h5>
                            @{{ advertcat.name }}
                        </h5>
                    </li>

                    <li v-for="submenu in submenus" @click="Sendsubcats(submenu.id)">


                        <span v-show="submenu.parent_id==advertcat.id">
                            @{{ submenu.name }}
                        </span>
                    </li>

                </ul>


                <h5 class="sub_heading">
                    <i class="icon icon-angle-right"></i>

                    @{{ catmenus.name }}
                </h5>


                <span class="cat_menu" v-for="menus in menu">
                <ul class="send-advert2" v-for="submenu in submenus" @click="send_advert2(menus.id)">
                     <li v-show="submenu.id==menus.parent_id">
                            @{{ menus.name }}
                        </li>
                </ul>
        </span>


            </div>
            <div class="send-advert3" style="height: 2200px">


                <div class="card" style="height: 100px;text-align: right;padding: 20px">

                    @{{ category.name}}

                </div>
                <div class="card" style="height: auto;text-align: right;margin-top: 10px">


                    <span v-show="category.parent_id==43">

                    @include ("layouts.FormAdvert.StateForm")

                    </span>

                    <span v-show="category.parent_id==44 ">

                    @include ("layouts.CarsForm.CarsForm")

                    </span>
                    <span v-show="category.parent_id!=43 && category.parent_id!=44">
                        @include("layouts.PublicForm.PublicForm")
                    </span>

                </div>


            </div>

        </div>

    </div>
@endsection