@extends("layouts.userLayouts")

@section("content")

    <div id="app">

        @if(empty(Session::get('login')))
            <div class="card">
                <div class="form-group" style="margin-top: 65px;position: relative;left: -33.5%" id="send_mobile">
                    <input type="text" value="+98" disabled class="form-control" style="float: left;
margin-left: 244px;
width: 56px;">
                    <input type="text" placeholder="شماره تلفن" v-model="mobilenumber"
                           class="form-control col-lg-4" style="margin-right: 168px;">
                    <button style="position: relative;left: 250px;top: 10px" type="button" class="btn btn-danger"
                            @click="addmobile()">دریافت
                        کد تایید
                    </button>

                </div>


                <div id="code_mobile" style="display: none;">
                                    <span class="alert alert-success"
                                          style="width: 100%;position: absolute;top: 4px;right: 0;text-align: center;">کد تایید با پیامک برای شما ارسال شد.</span>

                    <div class="form-group" style="margin-top: 65px;" id="">

                        <input type="text" placeholder="کد تایید 4 رقمی"
                               v-model="codenumber"
                               class="form-control col-lg-4"
                               style="position: relative;right: -33.5%">
                    </div>
                    <div class="form-group" style="text-align: center">

                        <button type="button" class="btn btn-danger col-lg-4"
                                style="border-radius: 4px"
                                @click="verifyCode2()">
                            اعمال کد
                        </button>


                    </div>
                    <div class="form-group" style="text-align: center" id="">

                                        <span class="col-lg-4">
                                            شماره موبایل:
                                            @{{ UserMobile }}
                                        </span>
                    </div>


                    <div class="form-group" style="margin-right: 252px;">


                        <span id="codemobile"></span>
                    </div>


                </div>


            </div>
        @else




            <div class="col-lg-8" style="margin: 0 auto;margin-top: 30px">
                <div class="chat">
                    <div class="chat_navbar col-lg-12">
                        <div class="right">
                    <span>
                    <i class="icon icon-cog" style="color: #ca0600;cursor: pointer" data-toggle="modal"
                       data-target="#myModal"></i>
                   <h5>چت دیوار </h5>
                    </span>
                        </div>
                        <div class="left">
                            <div class="icons">

                                <i class="icon icon-phone" style="margin-left: 5px;color: #ca0600;cursor:pointer;"></i>
                                <i class="icon icon-ellipsis-vertical"
                                   style="margin-left: 15px;color: #ca0600;cursor: pointer"></i>
                            </div>
                            <div class="chat_header" s>
                                <h5>گوشی سامسونگ </h5>
                                <span class="chat_name">alireza</span>

                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4" style="float: right;padding-right: 0">
                        <div class="chat_users" style="border: 1px solid #eeeeee">
                            <div class="chat_header">

                            </div>
                            <div class="show_users">
                                {{$id}}
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <div class="chat_text">
                            <div class="text_header">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>



    {{--  chat setting modal  --}}
    <!-- Trigger the modal with a button -->

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width: 600px !important;;height: 400px !important;">

            <!-- Modal content-->
            <div class="modal-content" style="height: 400px !important;width: 600px !important;">
                <div class="modal-header"
                     style="position:absolute;width: 100%;height: 115px;background: #c00c11 !important;color: white">
                    <i style="cursor:pointer;color: white;position: absolute;right: -20px;top: -18px"
                       class="icon icon-close close" data-dismiss="modal">&times;</i>
                    <h4 class="modal-title" style="right: 20px;top: 5px">پروفایل کاربری </h4>
                    <span style="position: absolute;left: 5px;top: 5px">ویرایش</span>
                    <span
                        style="position: absolute;right: 40px;top: 53px;border-radius: 100%;border: 5px solid white;display: block;width: 50px;height: 50px">
                        <i class="icon icon-user"
                           style="display: block;width: 40px;height: 40px;position:absolute;right: -4px;top: -1px;font-size: 30pt">

                        </i>
                    </span>
                </div>
                <div class="modal-body" style="position:absolute;top: 114px;width: 100%;height: 60%">

                    <div class="setting_phone" style="height: 40px">
                        <i class="icon icon-phone" style="position:absolute;right: 50px;font-size: 15pt;top: 28px"></i>
                        <span style="position: absolute;right: 100px;top: 25px;font-weight: bold;">
                           {{Session::get('login')->mobile}}
                        </span>
                        <span style="position: absolute;right: 100px;color: gray;font-size: 14px;top: 36px">
                            شماره تلفن
                        </span>
                    </div>
                    <div class="line"></div>
                    <div class="chatOptions">
                        <ul>
                            <li>
                                <i class="icon icon-user"></i>
                                <i class="icon icon-remove" style="right: 18px"></i>
                                <span>                                    نمایش مسدود شده ها
</span>
                            </li>
                            <li>
                                <i class="icon icon-user"></i>
                                <i class="icon icon-remove" style="right: 18px"></i>
                                <span>
                                    نمایش مکالمات آگهی های حذف شده
                                </span>
                            </li>
                            <li>
                                <i class="icon icon-bullhorn"></i>
                                <span>نمایش هشدار هنگام حضور در برنامه</span>
                            </li>
                            <li>
                                <i class="icon icon-bullhorn"></i>
                                <span>ارسال پیامک در صورت عدم مراجعه </span>
                            </li>

                        </ul>
                    </div>
                    <div class="line"></div>

                </div>
                <div class="modal-footer" style="position:absolute;bottom: 5px;width: 100%">
                    <i class=" icon icon-signout"></i>
                    <span>ارسال پیامک در صورت عدم مراجعه </span>
                </div>
            </div>

        </div>
    </div>





    @endif


@endsection
