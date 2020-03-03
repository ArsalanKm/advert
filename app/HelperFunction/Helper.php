<?php

namespace App\HelperFunction;

use App\Car;
use App\Estate;
use App\Image;

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


}

?>

