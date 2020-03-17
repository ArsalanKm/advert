@extends('layouts.userLayouts')

@section('content')
    <?php

    use Hekmatinasser\Verta\Verta;    ?>
    <div id="app">

        <aside id="sidebar">
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


        <section class="col-lg-8" id="Top_filters">

            <div class="filter_advert col-lg-12" style="float: right">
                <ul class="filters col-lg-12">
                    <li class="">
                        <input type="text" class="form-control"
                               placeholder="جست و جو در همه ی آگهی ها">
                    </li>
                    <li class="">
                        {{--                        <select name="" id="" class="form-control">--}}
                        {{--                            <option class=" mainCats" v-for="category in categories" :value="category.id"--}}
                        {{--                                    @click="showCat(category.id)">--}}
                        {{--                                @{{ category.name }}--}}
                        {{--                            </option>--}}
                        {{--                            <option v-for="scat in Scategory">--}}
                        {{--                                @{{ scat .name }}--}}

                        {{--                            </option>--}}
                        {{--                        </select>--}}

                        <div class="dropdown" style="width: 100%;height: 38px;
                             background: white">
                            <button id="btn-default" class="btn btn-primary dropdown-toggle"
                                    type="button" data-toggle="dropdown"
                                    style="width: 100%;height: 38px;background: white">
                                <span id="title" class="caret icon icon-arrow-down"
                                      style="color: #a8a8a8">
                                    دسته بندی ها
                                </span>
                            </button>
                            <ul class="dropdown-menu" style="top: -15px !important;
                            margin: 1px !important;">
                                <span class="mainCats" style="display: block;width: 371px">

                                    <option class="" v-for="category in maincategoires"
                                            :value="category.id"
                                            @click="showCat(category.id)">
                                    @{{ category.name }}
                                    </option>

                                    </span>


                                <span class="SubCats" style="display: none">
                                    <li @click="back()">
                                        <i class="icon icon-circle-arrow-right"
                                        >
                                        </i>
                                        <h5>
                                            همه ی آگهی ها
                                        </h5>
                                    </li>
                                <li v-for="scat in Scategory" @click="send_category(scat.id)">
                                    @{{ scat .name }}
                                </li>
                                    </span>


                                <span class="SecondSubCats" style="display: none">
                                    <li @click="back2()">
                                        <i class="icon icon-circle-arrow-right"
                                        >
                                        </i>
                                        <h5>
                                            همه ی آگهی ها
                                        </h5>
                                    </li>
                                <li v-for="scat in SecondScategory" @click="">
                                    @{{ scat .name }}
                                </li>
                                    </span>


                            </ul>
                        </div>

                    </li>
                    <li class="">
                        <select name="" id="" class="form-control">
                            <option>
                            </option>
                        </select>
                    </li>
                    <li style="position: relative;top: 10px;width: 100%;height: 268px">
                        <div class="col-lg-1" style="position:absolute;right: 1px">
                            <label for="" style="position: relative;right: -6px;top: 5px">متراژ(متر مربع)</label>
                            <input type="text" class="form-control" style="float: right" placeholder="از">
                        </div>
                        <div class="col-lg-1" style="position:absolute;right: 70px;top: 32px">
                            <input type="text" class="form-control" style="float: right" placeholder="تا">
                        </div>
                        <div class="col-lg-2" style="position:absolute;right: 19%;top: -8px">
                            <label for="" style="position: relative;right: -135px;top: 5px">سال:</label>
                            <select type="text" class="form-control" style="float: right">
                                @for($i=1370;$i<=1398;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-lg-2" style=";position:absolute;right: 19%;top: 50px">
                            <label for="" style="position: relative;right: -43%;top: 10px">تا</label>

                            <select type="text" class="form-control" style="float: right" placeholder="تا">

                                @for($i=1370;$i<=1398;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="col-lg-2" style=";position:absolute;right: 36%;top: -10px">
                            <label for="" style="position: relative;right: -43%;top: 10px">قیمت کل : ا</label>

                            <select type="text" class="form-control" style="float: right">
                            </select>
                        </div>


                        <div class="col-lg-1" style="position:absolute;right: 36%;top: 66px">
                            <input type="text" class="form-control" style="float: right" placeholder="از">
                        </div>
                        <div class="col-lg-1" style="position:absolute;right: 43%;top: 66px">
                            <input type="text" class="form-control" style="float: right" placeholder="تا">
                        </div>
                        <div class="col-lg-2" style=";position:absolute;right: 60%;top: -10px">
                            <label for="" style="position: relative;right: -43%;top: 10px">نوع : </label>
                            <ul id="type">
                                <li><label for="">فرقی نمیکند</label>
                                    <input type="radio">
                                </li>
                                <li><label for="">فروشی</label>

                                    <input type="radio">
                                </li>
                                <li>
                                    <label for="">درخواستی</label>
                                    <input type="radio">
                                </li>
                            </ul>


                        </div>


                        <div class="col-lg-2" style=";position:absolute;right: 80%;top: -10px">
                            <label for="" style="position: relative;right: -43%;top: 10px">آگهی دهنده : </label>
                            <ul id="Advertiser">
                                <li><label for="">فرقی نمیکند</label>
                                    <input type="radio">
                                </li>
                                <li><label for="">شخصی</label>

                                    <input type="radio">
                                </li>
                                <li>
                                    <label for="">مشاور املاک</label>
                                    <input type="radio">
                                </li>
                            </ul>


                        </div>
                        <div class="col-lg-2" style=";position:absolute;right: 1px;top: 120px">
                            <label for="" style="position: relative;right: -43%;top: 10px">تعداد اتاق : ا</label>

                            <select type="text" class="form-control" style="float: right">
                                @for($i=0;$i<5;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="col-lg-2" style=";position:absolute;right: 20%;top: 119px">
                            <label for="" style="position: relative;right: -43%;top: 10px">حومه شهر : </label>
                            <ul id="shahr">
                                <li><label for="">فرقی نمیکند</label>
                                    <input type="radio">
                                </li>
                                <li><label for="">نیست</label>

                                    <input type="radio">
                                </li>
                                <li>
                                    <label for="">هستی</label>
                                    <input type="radio">
                                </li>
                            </ul>
                        </div>


                    </li>


                    <li style="margin-top: 25px;">
                        <span class="col-lg-2" style="position:absolute; right: -16px">عکس دار</span>
                        <label class="switch" style="right: 66px">
                            <input type="checkbox" class="danger">
                            <span class="slid round"></span>
                        </label>
                        <span class="col-lg-2" style="position: absolute;right: 100px">فوری</span>
                        <label class="switch " style="right: 180px">
                            <input type="checkbox" class="danger">
                            <span class="slid round"></span>
                        </label>

                    </li>
                    <button class="btn btn-danger"
                            style="color: white;position: relative;top: 40%;height: 37px">جست و جو
                    </button>
                </ul>
            </div>


            <div class="show_adverts_content col-lg-12">
                <ul class="show_ad">
                    <li v-for="adverts in advert" v-if="adverts.city=='{{$city}}'" style="cursor: pointer"
                        @click="ShowAdvert(adverts.Id)">
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
                            <img :src="'/images/'+img" alt="'/images/'+img" width="150"
                                 height="150 ">
                                </span>
                                </span>

                        </div>
                        <div class="advert_date">
                            <?php
                            $dt = new \DateTime();

                            $v = new Verta($dt);
                            ?>
                            @foreach($advert as $adverts)
                                <span v-if="adverts.Id=='{{$adverts->Id}}'">

                            {{ $v->formatDifference(Verta::parse($adverts->date))}}
                                </span>
                            @endforeach
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
                            {{--                            <p>@{{ adverts }}</p>--}}
                            <span v-if="adverts.advert_id==adverts.Id">
                            <p style="text-align: right;padding-right: 10px;float: right">
                                :قیمت کل

                                @{{ adverts.fee }}</p>
                            </span>
                        </div>

                    </li>
                    <infinite-loading @infinite="infiniteHandler">
                        <span slot="no-more">
                            I am CeO Bitches!!!!!
                        </span>
                    </infinite-loading>
                </ul>
            </div>

        </section>


        <div id="show" class="show col-lg-8">
            <div class="header col-lg-12">
                <span class="backbtn col-lg-2">بازگشت</span>
                <span class="advertAddress col-lg-10">
                    همه ی آگهی ها
                </span>
            </div>
            <div class="adContent col-lg-12">
            <span class="col-lg-12" style="display: block;height: 100%" v-for="selectedAd in SelectedAdvert">

                <div class="right col-lg-6">
                <div class="show_header">
              <h2> @{{ selectedAd.subject }}</h2>
                </div>
                <div class="ad_date">

                    <span style="color: #cccccc">
                        @{{ selectedAd.date }}
                    </span>
                </div>
                <div class="ad_option" style="position:relative;">
                    <a class=" mobileInfo btn btn-danger">
                        دریافت اطلاعات تماس
                    </a>

                    <a class="StartChat" href="">

                        شروع چت
                    </a>

                      <a class="makeFavorite" href="">

                       نشان دار کردن
                    </a>
                </div>
                <div class="ad_info col-lg-12">
                    <ul>
                        <li>
                            <span class="info_title">
                                   دسته بندی
                            </span>
                            <span class="info_value">
@{{ selectedAd.name }}
                            </span>

                        </li>

                        <li>
                               <span class="info_title">

                                محل

                            </span>
                            <span class="info_value">
@{{ selectedAd.city }}

                            </span>


                        </li>


                           <li>
                             <span class="info_title">
                                نوع آگهی

                            </span>
                            <span v-if="selectedAd.type==0">
                            <span class="info_value">
                                درخواستی
                            </span>
                                <span v-else-if="selectedAd.type==1 ">
                                 <span class="info_value">
                                فروشی
                            </span>
                                </span>
                            </span>
                        </li>


{{--these three are for estates--}}
                        <li v-if="selectedAd.advertiser">

                             <span class="info_title">
                                آگهی دهنده

                            </span>
                            <span v-if="selectedAd.advertiser==1||selectedAd.advertiser==null">
                            <span class="info_value">
                                شخصی
                            </span>
                                <span v-else>
                                 <span class="info_value">
                                املاک
                            </span>
                                </span>
                            </span>
                        </li>
                        <li v-if="selectedAd.area">
                             <span class="info_title">

                                 متراژ</span>

                                 <span class="info_value">@{{ selectedAd.area }}</span>
                             </li>
                        <li v-if="selectedAd.rent">
                            <span class="info_title">
قیمت ک</span>
                            <span class="info_value">@{{ selectedAd.rent }}
                            </span>
                        </li>
{{--these states are for cars --}}
                        <li v-if="selectedAd.brand">

                             <span class="info_title">
                                برند

                            </span>
                            <span class="info_value">
                                @{{ selectedAd.brand }}
                            </span>

                        </li>
                        <li v-if="selectedAd.sunation">

                             <span class="info_title">
                                کارکرد

                            </span>
                            <span class="info_value">
                                @{{ selectedAd.sunation }}
                            </span>

                        </li>
                        <li v-if="selectedAd.year">

                             <span class="info_title">
                                سال

                            </span>
                            <span class="info_value">
                                @{{ selectedAd.year }}
                            </span>

                        </li>
                        <li v-if="selectedAd.color">

                             <span class="info_title">
                                رنگ

                            </span>
                            <span class="info_value">
                                @{{ selectedAd.color }}
                            </span>

                        </li>
                        <li v-if="selectedAd.fee">

                             <span class="info_title">
                                قیمت

                            </span>
                            <span class="info_value">
                                @{{ selectedAd.fee }}
                            </span>

                        </li>




                    </ul>
                </div>

                    <div class="ad_explain" style="position: relative">
                        <span class="info_title">
توضیحات:
                        </span>
                        <div style="padding-right: 38px;margin-top: 10px">
                            @{{ selectedAd.text }}

                        </div>

                    </div>
                </div>

{{--for image--}}
                <div class="left col-lg-6">
                    <div class="card2" style="height:500px;" v-if="selectedAd.image">

                        <div class="slider2 " style="overflow:hidden ">
                            <span v-for="img in selectedAd.image.split(',').splice(0,1)">

                            <img :src="'/images/'+img"
                                 style="width: 350px;height: 350px;margin-left: 110px;margin-top: 10px">;
                            </span>
                        </div>
                        <ul id="nav_item2">

                            <li v-for="img in selectedAd.image.split(',').splice(0,4)">
     <img :src="'/images/'+img"
          style="width: 50px;height: 50px;margin-left: 10px;">;

</li>

                        </ul>


                    </div>
                       <div class="card2" style="height:500px;" v-else=>

                        <div class="slider2 " style="overflow:hidden ">

                            <img src="/img/index.png"
                                 style="width: 350px;height: 350px;margin-left: 110px;margin-top: 10px">;
                        </div>



                    </div>
                </div>

            </span>

            </div>
        </div>


    </div>
@endsection
