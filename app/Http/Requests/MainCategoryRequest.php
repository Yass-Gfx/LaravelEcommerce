<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainCategoryRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // return [
        //     'name' => 'required|max:100|string',
        //     'abbr' => 'required|max:10|string',
        //     'photo' => 'required|mimes:jpg,jpeg,png.bmp',
        //     'active' => 'required|in:0,1',
        // ];
        return [
            'photo' => 'required|mimes:jpg,jpeg,png,bmp',
            'category' => 'required|array|min:1',
            'category.*' => 'required',
            'category.*.name' => 'required|string|max:100',
            'category.*.abbr' => 'required|string|max:10',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',
            'name.string' => 'اسم اللغة لابد ان يكون احرف بدون ارقام',
            'name.max' => 'اسم اللغه لا يمكن ان يزيد عن 100 حرف',
            'in' => 'القيمة المدخلة غير صحيحة',
            'abbr.max' => 'لا يجب ان يزيد الحقل عن 10 احرف',
            'abbr.string' => 'يجب ان يكون المدخلات عباره عن نص',
            'photo.required' => 'صورة القسم مطلوبة',
            'photo.mimes' => 'يجب ان تكون صورة القسم صورة من الامتدادات jpg, jpeg, png, bmp',
            'category.min' => 'يجب يتم ادخال بيانات لغه واحدة على الاقل'
        ];
    }
}