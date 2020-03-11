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
                                        <tr>
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
                                                @if($adverts->status==1)
                                                    <i class="icon icon-ok" style="color: #0b2e13;cursor: pointer"></i>
                                                @else                                                    <i
                                                    class="icon icon-remove" style="color: red;cursor: pointer"></i>

                                                @endif
                                            </td>
                                            <td style="text-align: center"><a style="cursor: pointer;color: red"><i
                                                        class="icon- icon-trash"></i></a></td>
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

    </div>
@endsection
