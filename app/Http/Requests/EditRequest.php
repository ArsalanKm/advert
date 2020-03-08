<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {

        return [
            'City.required' => 'فیلد خالی را پر کنید ',
            'email.required' => 'فیلد خالی را پر کنید',
            'email.email' => 'فیلد ایمیل غیر مجاز است ',
            'mobile.required' => 'فیلد خالی را پر کنید ',
            'mobile.numeric' => 'فیلد موبایل باید از ارقام باشد . ',
//            'mobile.max' => 'موبایل بیشتر از 11 تا نمیشود باشد.',
            'mobile.regex' => 'فرمت وارده اشتباه است ',
            'deposit.required' => 'فیلد ودیعه را پر کنید',
            'deposit.numeric' => 'فیلد ودیعه باید از ارقام باشد ',

            'rent.required' => 'فیلد خالی را پر کنید ',
            'rent.numeric' => 'فیلد اجاره باید از ارقام باشد ',
            'text.required' => 'فیلد خالی را پر کنید ',
            'text.min' => 'متن حداقل باید شامل 6 کارکتر باشد ',
            'numberRoom.required' => 'فیلد خالی را پر کنید ',
            'area.required' => 'فیلد خالی را پر کنید ',
            'area.numeric' => 'فیلد متراژ باید شامل رقم باشد! ',


        ];

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'city' => 'required',
            'deposit' => 'required|numeric',
            'rent' => 'required|numeric',
            'numberRoom' => 'required',
            'mobile' => 'required|numeric|regex:/[0-9]{11}/',
            'email' => 'required|email',
            'text' => 'required|min:6',
            'subject' => 'required',
            'area' => 'required|numeric'


        ];
    }
}
