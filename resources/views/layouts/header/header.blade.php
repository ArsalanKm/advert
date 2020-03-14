<style>
    header {
        background: white;
        box-shadow: 1px -1px 3px;
        position: relative;
        height: 80px;
    }

    .send .btn {
        margin-top: 15px;
        margin-left: 25px;
        border-radius: 4px;
    }

    .link {
        position: absolute;
        top: 58%;
        left: 7%;
    }

    .link a {
        margin-left: 60px;
        color: black;
        text-decoration: none;
        font-size: 11pt;
    }

    .btn-danger {

        font-weight: bold;
        height: 47px;
        font-size: 15px;
    }

    .logo img {
        width: 40px;
        height: 40px;
        position: absolute;
        right: 20px;
        top: 20px;
    }

    .btn-default {
        height: 27px;
        width: 120px;
        display: block;
        border: 1px solid #cccccc;
        box-shadow: inset 0 0 0 1px rgba(34, 36, 38, .15);
        text-align: center;
        text-decoration: none !important;
        color: black;
        border-radius: 4px;
    }

    .SelectorCity {
        position: absolute;
        right: 110px;
        top: 30px;
    }

    .SelectorCity i {
        float: left;
        position: relative;
        top: -26px;
        right: -2px;
        display: block;
        width: 17px;
        height: 24px;
        background: #eee;
        line-height: 22px;
        padding-left: 3px;
    }

    .modal-body .button {
        width: 130px !important;
        height: 30px;
        line-height: 23px;
    }

    .model_cities {
        margin: -15px auto;
        float: right;
        position: relative;
        right: 0px;
        padding-right: 26px;
    }

    .modal-body .col-lg-6 {
        max-width: 97%;
    }

    .modal-body .search_icon {
        display: block;
        width: 30px;
        height: 30px;
        position: relative;
        top: -32px;
        right: -5px;

    }

    .modal-body .button {
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

    .modal-body .button:hover {
        color: white !important;
        background-color: #c00c1a;
    }
    #sendAdvert:hover{
        color: white !important;
        line-height: 20px;

    }


</style>
<header>
    <div class="send">
        <script src="/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <link rel="stylesheet" type="text/css" href="/css/fontawesome.min.css">
        <link rel="stylesheet" type="text/css" href="/font-awesome/css/font-awesome.css">
        <a href="/advert" type="button" class="btn btn-danger" id="sendAdvert">
            ارسال رایگان آگهی

        </a>
    </div>
    <div class="link">
        <a href="">
            دیوار من
        </a>
        <a href="">
            چت
        </a>
        <a href="">
            درباره ما
        </a>
        <a href="">
            بلاگ
        </a>
        <a href="">
            پشتیبانی و قوانین
        </a>
        <a href="">
            تماس با ما
        </a>

    </div>
    <div class="SelectorCity">
        <a href="#" class="btn-default" data-toggle="modal" data-target="#exampleModal">تنخاب شهر</a>
        <i class="icon icon-angle-down"></i>
    </div>
    <div class="logo">

        <img src="img/divar.svg" style="">
    </div>
</header>


<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="direction: rtl">
                <h5 class="modal-title" id="exampleModalLabel" style="float: right">انتخاب شهر</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="float: left;margin-left: -15px">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body col-lg-12">
                <div class="col-lg-6" style="margin: 0 auto">
                    <input type="text" class="form-control" placeholder="جست و جوی سریع نام شهر...."
                           style="text-align: right;margin-top: 10px">
                    <i class="icon icon-search search_icon"></i>
                </div>
                <div class="model_cities">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">fs</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
