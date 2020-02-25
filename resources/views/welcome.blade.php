@extends("layouts.userLayouts")

@section('content')
    <style>
        .sidebar {
            width: 400px;
            height: 600px;
            float: right;
            background: #cccccc;
            position: relative;
            top: -10px;
            background: #eeeeee;
        }

        .description {
            text-align: center;
            position: relative;
            margin-top: 50px;
            margin-left: 20px;
        }

        .description p {
            text-align: right;
            margin-top: 20px;
            width: 300px;
        }

        .search_icon {
            display: block;
            width: 30px;
            height: 30px;
            position: relative;
            top: -32px;
            right: -5px;

        }

        .button {
            height: 40px;
            line-height: 40px;
            border: 1px solid #c00c1a;
            background-color: white;
            border-radius: 4px;
            color: #c00c1a;
            display: block;
            width: 70px;
            text-align: center;
            margin-left: 15px;
            float: right;
            margin-bottom: 5px;
            margin-top: 10px;
        }

        .button:hover {
            color: white !important;
            background-color: #c00c1a;
        }

        .enamad {
            text-align: center;
        }

        .social {
            text-align: center;
            margin-top: 20px;
            border-top: 1px solid #cccccc;
            float: right;

            position: relative;
            right: 100px;
        }

        .social i {
            margin-left: 4px;
            font-size: 22pt;
        }

        .social a {
            color: white;
            background-color: #c00c1a;
            display: block;
            float: right;
            width: 40px;
            height: 40px;
            margin-left: 27px;
            line-height: 55px;
            padding: 0px;
            border-radius: 4px;
        }

        .social p {
            margin-top: 20px;
        }


    </style>
    <div class="col-lg-12" style="float: right">

        <div class="col-lg-3" style="float: right;position: relative;right: -35px">
            <aside class="sidebar">

                <div class="description">
                    <p>.دیوار پایگاه خرید و فروش بی واسطه</p>
                    <p>اگه دنبال چیزی هستی شهرت انتخاب کن و تو دسته بندی ها دنبالس بگرد.</p>
                    <p>اگه میخوای چیزی بفروشی آگهی بزار</p>
                    <p>امیتونی از اپلیکیشن هم استفاده کنی</p>
                </div>

                <div class="enamad">
                    <img src="img/enamad.jpg" alt="">
                </div>

                <div class="social">

                    <p>دیوار را در شبکه های اجتماعی دنبال کنید.</p>
                    <a href="">
                        <i class="icon icon-twitter"></i>
                    </a>

                    <a href="">
                        <i class=" icon icon-facebook"></i>
                    </a>


                    <a href="">
                        <i class="icon icon-instagram"></i>
                    </a>


                </div>
            </aside>
        </div>
        <div class="col-lg-9" style="float: left;margin-top: 50px">

            <section>
                <div class="col-lg-6" style="margin: 0 auto">
                    <input type="text" class="form-control" placeholder="جست و جوی سریع نام شهر...."
                           style="text-align: right;margin-top: 10px">
                    <i class="icon icon-search search_icon"></i>
                </div>
                <div class="col-lg-6" style="margin: -15px auto;float: right;position: relative;right: 280px">
                    <a href="" class="button">
                        تهران
                    </a><a href="" class="button">
                        تهران
                    </a><a href="" class="button">
                        تهران
                    </a><a href="" class="button">
                        تهران
                    </a><a href="" class="button">
                        تهران
                    </a><a href="" class="button">
                        تهران
                    </a><a href="" class="button">
                        تهران
                    </a><a href="" class="button">
                        تهران
                    </a><a href="" class="button">
                        تهران
                    </a><a href="" class="button">
                        تهران
                    </a>
                </div>
            </section>
        </div>


        <!-- Button trigger modal -->


        <!-- Modal -->

    </div>



@endsection