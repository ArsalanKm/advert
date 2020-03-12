<?php
use App\HelperFunction\Helper;

?>

@extends('layouts.adminLayouts')


@section('content')
    <div class="card">


        <div class="card-header"><h3 style="text-align: center">مشاهده کل آگهی ها</h3></div>
        <section class="col-lg-12" id="app" style="padding-top: 40px;">


            <div class="panel panel-default">


                <div class="panel-heading"><h3 style="text-align: center">اگهی ها </h3></div>
                <div style="">
                    <div class="panel-body">

                        <table class="table table-bordered table-striped table-hover"
                               style="text-align: center;direction: rtl">

                            <thead>

                            <tr>
                                <th>شماره آگهی</th>
                                <th>موضوع آگهی</th>
                                <th>ایمیل</th>
                                <th>موبایل</th>
                                <th>شهر</th>
                                <th>نوع آگهی</th>
                                <th>وضعیت</th>
                                <th>حذف</th>


                            </tr>

                            </thead>
                            <tbody>

                            @foreach($advert as $adverts)
                                <tr>
                                    <td>{{$adverts->id}}</td>
                                    <td style="cursor: pointer;" data-toggle="modal"
                                        data-target="#Modal{{$adverts->id}}">{{$adverts->subject}}</td>
                                    <td>{{$adverts->email}}</td>
                                    <td>{{$adverts->mobile}}</td>
                                    <td>{{$adverts->city}}</td>
                                    <td>

                                        @if($adverts->type==1)

                                            <span style="color: #1c7430;"> فروشی</span>
                                        @elseif($adverts->type==2)
                                            <span style="color:darkred;"> درخواستی</span>

                                        @endif


                                    </td>
                                    <td>

                                        @if($adverts->check ==1)

                                            <i class="icon icon-ok-circle" style="color: #1c7430;cursor: pointer;"
                                               @click="set_status('{{$adverts->id}}')"></i>

                                        @elseif($adverts->check ==0)
                                            <i class="icon icon-remove" style="color: red;cursor: pointer;"
                                               @click="set_status('{{$adverts->id}}')"></i>


                                        @endif
                                    </td>
                                    <td>

                                        <form action="/admin/removeadvert" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" value="{{$adverts->id}}" name="advert_id">
                                            <button type="submit" style="border: none;box-shadow: none;"><i
                                                    class="icon icon-trash" style="color: red"></i></button>

                                        </form>

                                    </td>

                                    @endforeach


                                </tr>


                            </tbody>


                        </table>

                        {{$advert->links()}}


                    </div>


                </div>


            </div>


        </section>


        @foreach($advert as $adverts)

            <div class="modal " id="Modal{{$adverts->id}}" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style="margin: 1.75rem 18% !important;">
                    <div class="modal-content" style="width: 900px !important;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$adverts->subject}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            {{Helper::modalcar($adverts->id)}}

                            {{Helper::modalstate($adverts->id)}}

                        </div>

                    </div>
                </div>
            </div>

        @endforeach


    </div>

@endsection
