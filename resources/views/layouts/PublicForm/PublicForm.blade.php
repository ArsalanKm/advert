<form action="/addpublic" method="post">
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



        <div class="col-lg-12">

            <div class="form-group">


                <label for="">تصاویر</label>


            </div>


        </div>


        {{--********** brand********--}}
        <div class="col-lg-12" style="margin-top: 220px;">
            <div class="form-group">


                <label for="">سازنده</label>


                <input type="text" class="form-control" name="brand" style="margin-top:20px;">


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


                درخواستی
                <input class="form-control" type="checkbox" name="type[]" value="0" style="margin-top: -16px;
            width: 24px;height: 16px;position: relative;right: 63px;">
            </div>


        </div>
        {{-- shomare mobile --}}
        <div class="col-lg-12" style="margin-top: 30px">
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

        <div class="col-lg-12" style="margin-top: 30px;text-align: left;margin-bottom: 20px;
">

            <button type="submit" class="btn btn-danger" style="background-color: #c00c1a;color: white;width: 150px">

                ارسال رایگان آگهی
            </button>
        </div>


    </div>
    <input type="hidden" v-bind:value="category.id" id="category" name="advert_id">
    <div id="boatAddForm2">

    </div>
</form>


<form action="/addimage" method="post" class="dropzone" id="dropzone2"
      style="position: absolute;float: right;top: 14%;width: 93%;right: 3%;">
    {{csrf_field()}}
    {{--<input type="file" name="file" />--}}
</form>



