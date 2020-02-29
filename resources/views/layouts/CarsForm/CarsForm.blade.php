<form action="/addcars" method="post">
    {{csrf_field()}}

    @{{category.id}}


    <div class="col-lg-12">

        <div class="col-lg-10">

            <div class="form-group">


                <label for="">شهر</label>

                <select name="city" id="" style="" class="city_select">

                    <option value="" class="form-control">

                    </option>
                </select>


            </div>


        </div>

        <div class="col-lg-10">

            <div class="form-group">


                <label for="">نقشه</label>


            </div>


        </div>


        {{--<div class="col-lg-4">--}}

        {{--<div class="form-group">--}}


        {{--<label for="">در حومه شهر است؟ </label>--}}

        {{--<input type="checkbox" class="form-control" id="city_checkbox">--}}


        {{--</div>--}}


        {{--</div>--}}


        <div class="col-lg-12">

            <div class="form-group">


                <label for="">تصاویر</label>


            </div>


        </div>


        {{--********** brand********--}}
        <div class="col-lg-12" style="margin-top: 220px;">
            <div class="form-group">


                <label for="">برند</label>


                <select id="root_brand" class="form-control" name="brand">
                    <option value=""></option>
                    <option value="ام‌وی‌ام::MVM">ام‌وی‌ام::MVM</option>
                    <option value="بنز::Mercedes-Benz">بنز::Mercedes-Benz</option>
                    <option value="بی‌ام‌و::BMW">بی‌ام‌و::BMW</option>
                    <option value="پراید صندوق‌دار::Pride">پراید صندوق‌دار::Pride</option>
                    <option value="پراید هاچ‌بک::Pride">پراید هاچ‌بک::Pride</option>
                    <option value="پژو ۲۰۶‍::Peugeot 206">پژو ۲۰۶‍::Peugeot 206</option>
                    <option value="پژو ۲۰۶‍ صندوق‌دار::Peugeot 206">پژو ۲۰۶‍ صندوق‌دار::Peugeot 206</option>
                    <option value="پژو ۲۰۷::Peugeot 207">پژو ۲۰۷::Peugeot 207</option>
                    <option value="پژو ۴۰۵::Peugeot 405">پژو ۴۰۵::Peugeot 405</option>
                    <option value="پژو پارس::Peugeot Pars">پژو پارس::Peugeot Pars</option>
                    <option value="پژو روآ / آر‌دی::RD/ROA">پژو روآ / آر‌دی::RD/ROA</option>
                    <option value="پیکان::Peykan">پیکان::Peykan</option>
                    <option value="تندر ۹۰::Tondar 90">تندر ۹۰::Tondar 90</option>
                    <option value="تویوتا::Toyota">تویوتا::Toyota</option>
                    <option value="تیبا::Tiba">تیبا::Tiba</option>
                    <option value="دوو::Daewoo">دوو::Daewoo</option>
                    <option value="رانا::Runna">رانا::Runna</option>
                    <option value="رنو::Renault">رنو::Renault</option>
                    <option value="زانتیا::Citroen Xantia">زانتیا::Citroen Xantia</option>
                    <option value="سمند::Samand">سمند::Samand</option>
                    <option value="کیا::Kia">کیا::Kia</option>
                    <option value="گل::Gol">گل::Gol</option>
                    <option value="لیفان::Lifan">لیفان::Lifan</option>
                    <option value="مزدا::Mazda">مزدا::Mazda</option>
                    <option value="نیسان::Nissan">نیسان::Nissan</option>
                    <option value="وانت">وانت</option>
                    <option value="هیوندای آزرا::Hyundai Azera">هیوندای آزرا::Hyundai Azera</option>
                    <option value="هیوندای سوناتا::Hyundai Sonata">هیوندای سوناتا::Hyundai Sonata</option>
                    <option value="هیوندای (غیره)::Hyundai">هیوندای (غیره)::Hyundai</option>
                    <option value="سایر">سایر</option>
                </select>


            </div>


        </div>

        {{-- sale sakht --}}
        <div class="col-lg-12" style="margin-top: 20px;">
            <div class="form-group">


                <label for="">سال ساخت</label>


                <select id="root_year" class="form-control" name="year">
                    <option value="۱۳۹۷">۱۳۹۷</option>
                    <option value="۱۳۹۶">۱۳۹۶</option>
                    <option value="۱۳۹۵">۱۳۹۵</option>
                    <option value="۱۳۹۴">۱۳۹۴</option>
                    <option value="۱۳۹۳">۱۳۹۳</option>
                    <option value="۱۳۹۲">۱۳۹۲</option>
                    <option value="۱۳۹۱">۱۳۹۱</option>
                    <option value="۱۳۹۰">۱۳۹۰</option>
                    <option value="۱۳۸۹">۱۳۸۹</option>
                    <option value="۱۳۸۸">۱۳۸۸</option>
                    <option value="۱۳۸۷">۱۳۸۷</option>
                    <option value="۱۳۸۶">۱۳۸۶</option>
                    <option value="۱۳۸۵">۱۳۸۵</option>
                    <option value="۱۳۸۴">۱۳۸۴</option>
                    <option value="۱۳۸۳">۱۳۸۳</option>
                    <option value="۱۳۸۲">۱۳۸۲</option>
                    <option value="۱۳۸۱">۱۳۸۱</option>
                    <option value="۱۳۸۰">۱۳۸۰</option>
                    <option value="۱۳۷۹">۱۳۷۹</option>
                    <option value="۱۳۷۸">۱۳۷۸</option>
                    <option value="۱۳۷۷">۱۳۷۷</option>
                    <option value="۱۳۷۶">۱۳۷۶</option>
                    <option value="۱۳۷۵">۱۳۷۵</option>
                    <option value="۱۳۷۴">۱۳۷۴</option>
                    <option value="۱۳۷۳">۱۳۷۳</option>
                    <option value="۱۳۷۲">۱۳۷۲</option>
                    <option value="۱۳۷۱">۱۳۷۱</option>
                    <option value="۱۳۷۰">۱۳۷۰</option>
                    <option value="۱۳۶۹">۱۳۶۹</option>
                    <option value="۱۳۶۸">۱۳۶۸</option>
                    <option value="۱۳۶۷">۱۳۶۷</option>
                    <option value="۱۳۶۶">۱۳۶۶</option>
                    <option value="قبل از ۱۳۶۶">قبل از ۱۳۶۶</option>
                </select>


            </div>


        </div>


        {{--kar kard--}}
        <div class="col-lg-12">
            <div class="form-group">
            <span>
                کارکرد
            </span>
                <input name="run_time" type="text"
                       style="border: 1px solid #cccccc;height: 32px;width: 100%;border-radius: 4px">

            </div>
        </div>

        {{--gheymat --}}
        <div class="col-lg-4" style="float: right;margin-top: 60px">
            <div class="form-group">
                <label for="">قیمت</label>
                <select name="form-control" id="" style="width: 78%;border-radius: 4px">

                    <option value="0">قیمت مورد نظر</option>
                    <option value="1">مجانی</option>
                    <option value="2">توافقی</option>
                </select>

            </div>

        </div>
        <div class="col-lg-8" style="float: left;margin-top: 60px">
            <div class="form-group">
                <input type="text" name="fee" value="" disabled="disabled" style="width: 100%">
            </div>
        </div>

        {{--noe agahi--}}

    <span v-if="category.id== 45">


        <div class="col-lg-12" style="float: right">
            <div class="form-group">
                <span>
                    رنگ
                </span>
                <select name="color" id="" class="form-control">

                    <option value="سفید">
                        سفید
                    </option>
                    <option value="مشکی">
                        مشکی
                    </option>
                    <option value="نوک مدادی">
                        نوک مدادی
                    </option>
                </select>
            </div>
        </div>

</span>


        <div class="col-lg-12" style="float:right;">


            <div class="form-group">


                <label>نوع </label>


            </div>


        </div>


        <div class="col-lg-2" style="float:right;">


            <div class="form-group">


                فروشی
                <input class="form-control" type="checkbox" name="type[]" value="0" style="margin-top: -16px;
            width: 24px;height: 16px;position: relative;right: 63px;">
            </div>


        </div>


        <div class="col-lg-3" style="float:right;">


            <div class="form-group">


                اجاره ای
                <input class="form-control" type="checkbox" name="type[]" value="0

" style="margin-top: -16px;width: 24px;
            height: 16px;position: relative;right: 63px;">

            </div>


        </div>


        <div class="col-lg-3" style="float:right;">


            <div class="form-group">


                درخواستی
                <input class="form-control" type="checkbox" name="type[]" value="0" style="margin-top: -16px;
            width: 24px;height: 16px;position: relative;right: 63px;">
            </div>


        </div>
        {{-- shomare mobile --}}
        <div class="col-lg-12" style="margin-top: -10px">
            <div class="fom-group">
                <label for="">شماره موبایل</label>
                <input type="text" class="form-control" name="mobile">
                <span style="font-size: 11px">کد تایید به شماره زیر ارسال خواهد شد.تماس و چت نیز با این شماره انجام میشود.</span>

            </div>
        </div>
        {{--chate divar faal shavad--}}
        <div class="col-lg-12">

            <div class="form-group">
            <span style="margin-right: 20px">
                            چت دیوار فعال شود

            </span>
                <input name="chat" class="form-control" type="checkbox" style="position:relative;width: 2px;top: -30px"
                       value="0">
            </div>
        </div>

        {{--email--}}
        <div class="col-lg-12">
            <div class="form-group">
                <label for="">ایمیل</label>
                <input type="email" class="form-control" name="email">
                <span style="font-size: 11px">آدرس ایمیل خود را به درستی وارد کنید .لینک مدیریت آگهی به ایمیل شما ارسال میشود.</span>
            </div>
        </div>


        <div class="col-lg-12">

            <div class="form-group">
            <span style="margin-right: 20px">
                           ایمیل در آگهی نمایش داده نشود.

            </span>
                <input name="checkemail" class="form-control" type="checkbox"
                       style="position:relative;width: 2px;top: -30px" value="0">
            </div>
        </div>

        {{--onvane agahi--}}
        <div class="col-lg-12" style="margin-top: 30px">
            <div class="form-group">
                <label for="">عنوان آگهی</label>
                <input type="text" class="form-control" name="titleAdvert">
                <span style="font-size: 11px">از عنوان های کوتاه و مفید استفاده کنید. اشاره به محله ی ملک و متراژ آن موجب بیشتر شدن آگهی میشود.</span>
            </div>
        </div>

        {{--tozihate agahi--}}
        <div class="col-lg-12" style="margin-top: 30px">
            <div class="form-group">
                <label for="">توضیحات آگهی</label>
                <textarea type="" class="form-control" name="text"></textarea>
                <span style="font-size: 11px">تمام جزئیات و نکات قابل توجه آگهی خود را به صورت کامل و دقیق ذکر کنید. توجه به این مورد به صورت قابل توجهی ابهامات کاربر را برطرف خواهد کرد و شانس موفقیت آگهی شما را افزایش خواهد داد.</span>
            </div>
        </div>

        <div class="col-lg-12" style="margin-top: 30px;text-align: left">

            <button type="submit" class="btn btn-danger" style="background-color: #c00c1a;color: white;width: 150px">

                ارسال رایگان آگهی
            </button>
        </div>


    </div>
    <input type="hidden" v-bind:value="category.id" id="category" name="advert_id">
    <div id="boatAddForm1">

    </div>
</form>


<form action="/addimage" method="post" class="dropzone" id="dropzone1"
      style="position: absolute;float: right;top: 14%;width: 93%;right: 3%;">
    {{csrf_field()}}
    {{--<input type="file" name="file" />--}}
</form>



