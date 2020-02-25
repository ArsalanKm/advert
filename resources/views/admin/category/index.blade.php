@extends('layouts.adminLayouts')


@section('content')
    {{--{{categories}}--}}


    <div class="card">

        <div class="card-header" style="text-align: center">
            add category
        </div>
        <ul id="category_orders">
            <li>
                <section class="col-lg-4" style="position:relative;right: 0px;"
                         xmlns:v-on="http://www.w3.org/1999/xhtml">
                    <div class="panel panel-default" style="width: 100%;">
                        <div class="card-header">
                            <h3>
                                delete category
                            </h3>
                        </div>

                        <div style="width: 100%">
                            <div class="panel-body">
                                <select name="" class="form-control" v-model="p_id">

                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">
                                            {{$category->name }}

                                        </option>
                                    @endforeach

                                </select>
                                <button name="btn" type="button" class="btn btn-info" style="margin-top: 5px"
                                        @click="deleteCategory()">
                                    deleteCategory

                                </button>


                            </div>
                        </div>
                    </div>

                </section>

            </li>
            <li>
                <section class="col-lg-4" style="position:relative;right: 0px;">
                    <div class="panel panel-default" style="width: 100%;">
                        <div class="card-header">
                            <h3>
                                add sub_category
                            </h3>
                        </div>
                        <div style="width: 100%">
                            <div class="panel-body">


                                <div class="form-group">


                                    <input class="form-control" v-model="name" placeholder="دسته مورد نظر را وارد کنید">
                                    {{--<option data-display="دسته اصلی" value="0">--}}
                                    {{--دسته اصلی--}}
                                    {{--</option>--}}

                                    {{--</input>--}}
                                </div>
                                <div class="form-group">
                                    <select class="form-control" v-model="parent_id">
                                        <option data-display=" دسته اصلی" value="0">
                                            دسته اصلی
                                        </option>

                                        <option v-for="x in categories" :value="x.id">
                                            @{{ x.name }}
                                        </option>

                                        {{--@foreach($category as $categories)--}}
                                        {{--<option value="{{$categories->id}}">--}}
                                        {{--{{$categories->name}}--}}
                                        {{--</option>--}}
                                        {{--@endforeach--}}

                                    </select>
                                </div>

                                <div class="form-group">
                                    <butoon name="save" class="btn btn-danger" @click="addCategory()">
                                        save
                                    </butoon>
                                </div>
                            </div>

                        </div>
                    </div>


                </section>
            </li>


        </ul>

    </div>
@endsection