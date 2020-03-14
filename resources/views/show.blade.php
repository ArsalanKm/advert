@extends('layouts.userLayouts')

@section('content')
    <div id="app">

        <aside>
            <div class="col-lg-2">
                <div class="advert_header">همه ی آگهی ه
                    ا
                </div>
                <ul class="catList">
                    <li>املاک</li>
                    <li>املاک</li>
                    <li>املاک</li>
                    <li>املاک</li>
                    <li>املاک</li>
                </ul>
            </div>
        </aside>

        <section class="col-lg-8"
        >
            <div class="filter_advert col-lg-12" style="float: right">
                <ul class="filters col-lg-12">
                    <li class="">
                        <input type="text" class="form-control" placeholder="جست و جو در همه ی آگهی ها">
                    </li>
                    <li class="">
                        <select name="" id="" class="form-control">
                            <option value="">

                            </option>
                        </select>
                    </li>
                    <li class="">
                        <select name="" id="" class="form-control">
                            <option value="">

                            </option>
                        </select>
                    </li>
                </ul>


                <li style="margin-top: 79px; position: absolute;right: 0%; top: 70%;">
                    <span class="col-lg-2">عکس دار</span>
                    <label class="switch" style="right: 66px">
                        <input type="checkbox" class="danger">
                        <span class="slid round"></span>
                    </label>
                    <span class="col-lg-2" style="margin-right: 47px;">فوری</span>
                    <label class="switch " style="right: 180px">
                        <input type="checkbox" class="danger">
                        <span class="slid round"></span>
                    </label>

                </li>
                <button class="btn btn-danger"
                        style="color: white;position: relative;top: 75px;height: 37px">جست و جو
                </button>
            </div>

            <div class="show_adverts_content col-lg-12">
                <ul class="show_ad">
                    <li v-for="adverts in advert">
                        <div class="advert_subject">
                            <h5>
                                @{{adverts.subject}}
                            </h5>
                        </div>
                        <div class="advert_image">
                            <span v-if="adverts.image==null">
                                <img src="/img/index.png" alt="'/images/'+adverts.image" width="150" height="150 ">
                            </span>
                            <span v-else>
                                <span v-for="img in adverts.image.split(',').splice(0,1)">
                            <img :src="'/images/'+adverts.image" alt="'/images/'+img" width="150"
                                 height="150 ">
                                </span>
                                </span>

                        </div>
                        <div class="advert_date">
                                <span style="color: #cccccc">
                                    دقایقی پیش
                                </span>
                        </div>
                        <div class="advert_chat">
                            <span class="chatbtn" v-if="adverts.chat==1">
                                <p style="border: 1px solid green;border-radius: 5px">
                                    جت
                                </p>
                            </span>
                                <span v-else>

                                </span>
                        </div>
                        <div class="advert_price">
                            <span v-if="adverts.typeAdvert==0">
                            <p style="text-align: right;padding-right: 10px;float: right">

                                @{{adverts.price}}  :قیمت کل
                            </p>
                            </span>
                            <span v-else-if="adverts.typeAdvert==1">
                            <p style="text-align: right;padding-right: 10px;float: right;border-left: 1px solid #cccccc">
                                @{{adverts.rent}}  :قیمت اجاره
                            </p>
                                 <p style="text-align: right;padding-right: 10px;float: right">

                                @{{adverts.deposit}}  :قیمت رهن
                            </p>
                            </span>
                        </div>

                    </li>
                </ul>
            </div>

        </section>
    </div>
@endsection
