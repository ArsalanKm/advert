<form action="/addstate" method="post">
    {{csrf_field()}}
    <div class="col-lg-12">

        <div class="col-lg-10">

            <div class="form-group">


                <label for="">شهر</label>

                <select name="city" id="" style="" class="city_select" v-model="city">

                    <option value="ساری" class="form-control">
                        ساری
                    </option>

                    <option value="بابل" class="form-control">
                        بابل
                    </option>

                    <option value="مازندران" class="form-control">
                        مارندران
                    </option>
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

                <input name="countryside" type="checkbox" class="form-control" id="city_checkbox">


            </div>


        </div>


        <div class="col-lg-12">

            <div class="form-group">


                <label for="">تصاویر</label>


            </div>


        </div>


        {{--******************--}}
        <div class="col-lg-12" style="margin-top: 200px;">
            <div class="form-group">


                <label for="">متراژ(مترمربع)</label>


                <input name="area" type="text" class="form-control" >


            </div>


        </div>
        <style>

        </style>
        <div class="col-lg-4">

            <div class="form-group">


                <label for="">نوع آگهی </label>
                <br>

                <span class="check1">
    ارائه
            <input type="radio" class="" :value="1" v-model="TypeAdvert" name="TypeAdvert">
    </span>
                <span class="check2">
            درخواستی

            <input type="radio" class="" value="0" v-model="TypeAdvert" name="TypeAdvert">
            </span>

            </div>


        </div>


        <div class="col-lg-4" style="margin-top: 66px">

            <div class="form-group">


                <label for="">نوع آگهی دهنده</label>
                <br>

                <span class="check1">
    شخصی
                    {{--if value equals to 1 it is personal advert--}}
                    <input name="Advertiser" type="radio" class=""  value="1" style="right: 48px;">

    </span>
                <span class="check2">
            مشاور املاک
                    {{--if value equals to 0 it is from amlak shop--}}

                    <input name="Advertiser" type="radio" class="" value="0"
                           style="right: 123px;top: -20px;">
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
                <input type="text" name="textFee" value="" style="width: 100%" v-model="textFee">
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
            <div class="form-group">
                <input type="text" name="textFee1" value="" style="width: 100%;height:px" v-model="textFee1">
            </div>
        </div>


        <div class="col-lg-12">
            <div class="form-group">
                <label for="">تعداد اتاق</label>

                <select v-model="numberRoom" class="form-control" name="numberRoom" id=""
                        style="width: 100%;border: 1px solid #ccc;border-radius: 4px;height: 34px;">
                    <option value="0">بدون اتاق</option>
                    <option value="1">یک</option>
                    <option value="2">دو</option>
                    <option value="3">سه</option>
                    <option value="4">چهار</option>
                    <option value="5">پنج یا بیشتر</option>
                </select>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="fom-group">
                <label for="">شماره موبایل</label>
                <input type="text" class="form-control" v-model="mobile" name="mobile">
                <span style="font-size: 11px">کد تایید به شماره زیر ارسال خواهد شد.تماس و چت نیز با این شماره انجام میشود.</span>

            </div>
        </div>

        <div class="col-lg-12">

            <div class="form-group">
            <span style="margin-right: 20px">
                          ؟  چت دیوار فعال شود

            </span>
                خیر
                <input type="radio" style="position:relative;width: 2px;top: 2px" :value="0" name="chat">
                بله
                <input type="radio" style="position:relative;width: 2px;top: 2px"  :value="1" name="chat">
            </div>
        </div>

        <div class="col-lg-12">
            <div class="form-group">
                <label for="">ایمیل</label>
                <input type="email" class="form-control" v-model="email" name="email">
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
                <input type="text" class="form-control" v-model="titleAdvert" name="titleAdvert">
                <span style="font-size: 11px">از عنوان های کوتاه و مفید استفاده کنید. اشاره به محله ی ملک و متراژ آن موجب بیشتر شدن آگهی میشود.</span>
            </div>
        </div>


        <div class="col-lg-12" style="margin-top: 30px">
            <div class="form-group">
                <label for="">توضیحات آگهی</label>
                <textarea type="" class="form-control" v-model="text" name="text"></textarea>
                <span style="font-size: 11px">تمام جزئیات و نکات قابل توجه آگهی خود را به صورت کامل و دقیق ذکر کنید. توجه به این مورد به صورت قابل توجهی ابهامات کاربر را برطرف خواهد کرد و شانس موفقیت آگهی شما را افزایش خواهد داد.</span>
            </div>
        </div>
        <div id="boatAddForm">
        </div>
        <div class="col-lg-12" style="margin-top: 30px;text-align: left;margin-bottom: 20px">

            <button type="submit" class="btn btn-danger"
                    style="background-color: #c00c1a;color: white;width: 150px">

                ارسال رایگان آگهی
            </button>
        </div>


    </div>
</form>


<form action="/addimage" method="post" class="dropzone" id="dropzone"
      style="position: absolute;float: right;top: 14%;width: 93%;right: 3%;">
    {{csrf_field()}}
    {{--<input type="file" name="file" />--}}
</form>

