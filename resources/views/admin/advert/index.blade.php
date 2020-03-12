<?php

use App\HelperFunction\Helper;

?>
@extends('layouts.adminLayouts')


@section('content')


    <div class="card">

        <div class="card-header" style="text-align: center">
            see all of the advertisments
        </div>
        <ul id="category_orders">
            <li>
                <section class="col-lg-12" style="position:relative;right: 19px;top: 4%"
                         xmlns:v-on="http://www.w3.org/1999/xhtml">
                    <div class="panel panel-default" style="width: 100%;">
                        <div class="card-header">
                            <h3>
                                adverts </h3>
                        </div>

                        <div style="width: 100%">
                            <div class="panel-body">
                                <table class="table table-bordered table-striped table-hover"
                                       style="direction: rtl;text-align: center">
                                    <thead>

                                    <tr>
                                        <th>شماره آگهی</th>
                                        <th>موضوع آگهی</th>
                                        <th>ایمیل</th>
                                        <th>شماره موبایل</th>
                                        <th>شهر</th>
                                        <th>نوع آگهی</th>
                                        <th>وضعیت</th>
                                        <th>حإف</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($advert as $adverts)
                                        <tr style="cursor: pointer" data-toggle="modal"
                                            data-target="#Modal{{$adverts->id}}">
                                            <td>{{$adverts->id}}</td>

                                            <td>{{$adverts->subject}}</td>
                                            <td>{{$adverts->email}}</td>
                                            <td>{{$adverts->mobile}}</td>
                                            <td>{{$adverts->city}}</td>
                                            <td>
                                                @if($adverts->type==1)
                                                    <span style="color: darkred">فروشی</span>
                                                @elseif($adverts->type==2)
                                                    <span style="color: #4aa0e6">درخواستی</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($adverts->check==1)
                                                    <i class="icon icon-ok-circle"
                                                       @click="set_status('{{$adverts->id}}')"
                                                       style="color: #0b2e13;cursor: pointer"></i>
                                                @elseif($adverts->check==0)
                                                    <i
                                                        class="icon icon-remove-circle"
                                                        @click="set_status('{{$adverts->id}}')"
                                                        style="color: red;cursor: pointer"></i>

                                                @endif
                                            </td>
                                            <td style="text-align: center">
                                                <form action="/admin/removeadvert" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="{{$adverts->id}}" name="advert_id">
                                                    <button type="submit"
                                                            style="cursor: pointer;color: red;background:none;border: none">
                                                        <i
                                                            class="icon- icon-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach()
                                    </tbody>

                                </table>

                                {{$advert->links()}}
                                <button name="btn" type="button" class="btn btn-info" style="margin-top: 5px"
                                        @click="deleteCategory()">
                                    deleteCategory

                                </button>


                            </div>
                        </div>
                    </div>

                </section>

            </li>


        </ul>


        <!-- Modal --><!-- Modal -->


    </div>
    @foreach($advert as $adverts)

        <div class="modal " id="Modal{{$adverts->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
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
@endsection
