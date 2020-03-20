<?php

namespace App\HelperFunction;

use App\Advert;
use App\Car;
use App\Estate;
use App\Image;
use Illuminate\Support\Facades\DB;
use Hekmatinasser\Verta\Verta;

class Helper
{

    public static function Estate($id)
    {

        $estate = Estate::where('advert_id', $id)->first();
        if ($estate != null) {
            $typeAdvert = '';
            if ($estate->typeAdvert == 0) {
                $typeAdvert = "فروشی";
            } else if ($estate->typeAdvert == 1) {
                $typeAdvert = "اجاره ای";
            }

            echo "<li class='deposit'><span>مبلغ رهن: </span><p>$estate->deposit</p></li>" .
                "<li class='rent'><span>مبلغ اجاره: </span><p>$estate->rent</p></li>" .
                "<li class='room_number'><span>تعداد اتاق: </span><p>$estate->room_number</p></li>" .
                "<li class='area'><span>متراژ: </span><p>$estate->area</p></li>" .
                "<li class='typeAdvert'><span>نوع آگهی: </span><p>$typeAdvert</p></li>";

        }
    }

    public static function Car($id)
    {

        $car = Car::where('advert_id', $id)->first();
        if ($car != null) {
            $typeAdvert = '';
            if ($car->type == 0) {
                $typeAdvert = 'فروشی';
            } else
                if ($car->type == 1) {
                    $typeAdvert = 'اجاره ای';
                } else
                    if ($car->type == 2) {
                        $typeAdvert = 'درخواستی';
                    }

            echo "<li class='brand'><span>برند : </span><p>$car->brand</p></li>" .
                "<li class='year'><span>سال تولید: </span><p>$car->year</p></li>" .
                "<li class='sunation'><span>میزان کارکرد ماشین: </span><p>$car->sunation</p></li>" .
                "<li class='type'><span>نوع آگهی: </span><p>$typeAdvert</p> </li>" .
                "<li class='fee'><span>قیمت ماشین: </span><p>$car->fee</p></li>" .
                "<li class='color'><span>رنگ: </span><p>$car->color</p></li>";


        }
    }

    public static function Image($id)
    {
        $img = Image::where('advert_id', $id)->first();
        if ($img != null) {

            $image = explode(',', $img->image);
            foreach ($image as $key => $images) {
//                echo nl2br($images."\n");

                echo "<img src='/images/$images' >";

            }

        }


    }

    public static function images($id)
    {
        $img = Image::where('advert_id', $id)->first();
        if ($img != null) {

            $image = explode(',', $img->image);
            foreach ($image as $key => $images) {
//                echo nl2br($images."\n");
                echo " <li><a href='#'><img src='/images/$images' ></a></li>";

            }

        }


    }

    public static function modalcar($id)
    {


        $car = Car::where('advert_id', $id)->first();

        if ($car) {

            if ($car->type == 0) {

                $type = "<span style='color: green;'>فروشی</span>";

            } elseif ($car->type == 1) {
                $type = "<span style='color: darkred;'>اجاره ای</span>";

            } elseif ($car->type == 2) {
                $type = "<span style='color: red;'>درخواستی</span>";


            }

            echo "                        <table class=\"table table-bordered table-striped table-hover\" style=\"text-align: center;\">

                                                <thead>

                                                <tr>

                                                    <th>برند خودرو</th>
                                                    <th>سال ساخت</th>
                                                    <th>کارکرد به کیلومتر</th>
                                                    <th>نوع آگهی</th>
                                                    <th>قیمت</th>
                                                    <th>رنگ</th>
                                                  </tr>

                                                </thead>
                                                <tbody>


                                                <tr>

                                                <td>$car->brand</td>
                                                <td>$car->year</td>
                                                <td>$car->run_time</td>
                                                <td>




                                       $type




                                                </td>
                                                <td>$car->fee</td>
                                                <td>$car->color</td>


                                                    </tr>


                                                </tbody>



                                            </table>
                    ";

        }
    }

    public static function modalstate($id)
    {


        $advert = Estate::where('advert_id', $id)->first();

        if ($advert) {

            echo "                        <table class=\"table table-bordered table-striped table-hover\" style=\"text-align: center;\">

                            <thead>

                            <tr>
                                <th>رهن</th>
                                <th>اجاره</th>
                                <th>تعداد اتاق خواب</th>
                                <th>نوع</th>
                                <th>زیر بنا</th>


                            </tr>

                            </thead>
                            <tbody>


                        <tr>

                        <td>$advert->deposite </td>
                        <td>$advert->rent </td>
                        <td>$advert->number </td>
                        <td>$advert->typeAdvert  </td>
                        <td>$advert->area </td>


</tr>




                            </tbody>



                        </table>
                    ";
        }

    }

    public static function myAdvert($data)
    {

        $adverts = DB::table('adverts')->where('adverts.mobile', "09905304009")
            ->leftJoin('images', 'adverts.Id', "=", "images.advert_id")
            ->leftJoin('estates', 'adverts.Id', "=", "estates.advert_id")
            ->leftjoin('categories', 'adverts.category_id', '=', 'categories.id')
            ->leftJoin('cars', 'adverts.Id', "=", "cars.advert_id")->get();
        foreach ($adverts as $advert) {

            if ($advert->image) {

                $image = "<img src='/images/$advert->image' width='150' height='150'> ";
            } else {
                $image = "<img src='/img/index.png' width='150' height='150'> ";
            }


            if ($advert->chat == 1) {

                $chats = "<p style='width:45px;text-align: center; font-size:11px; height: 24px; border: 1px solid green;border-radius:5px;'>چت</p>";

            } else {
                $chats = "";
            }


            $dt = new \DateTime();
            $v = new Verta($dt);
            $date = $v->formatDifference(Verta::parse($advert->date));

            $telegram = "https://telegram.me/share/url?url=" . url('/') . "&text=$advert->subject";
            $twitter = "https://twitter.com/intent/tweet?url=" . url('/') . "&text=$advert->subject";
            $facebook = "https://www.facebook.com/sharer/sharer.php?u=" . url('/') . "&title=$advert->subject";


            echo "
 <ul class='show_ad'>
                    <li  style='cursor: pointer'>
                        <div class='advert_subject'>
                            <h5>
                               {$advert->name}
                            </h5>
                        </div>
                        <div class='advert_image'>
 {$image}
                        </div>

                        <div class='advert_chat'>
                    {$chats}
                        </div>

                             <div class='advert_date'>

                                {$date}
                        </div>

                        <div class='dropdown' style='text-align: right'>
                        <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown' style='width: 120px'>
                اشتراک
</button>
         <div class='dropdown-menu'>
         <a href=$telegram class='dropdown-item'>اشتراک در تلگرام</a>
         <a href=$facebook class='dropdown-item'>اشتراک در فیسبوک</a>
         <a href=$twitter class='dropdown-item'>اشتراک در توییتر </a>
</div>
</div>
<a href='' style='position:absolute;display: block;left: 30px;bottom: 5px;color: #cccccc'>
<i class='icon icon-trash'></i>
حإف از تاریخچه
</a>



                    </li>

";
        }


    }
}


?>

