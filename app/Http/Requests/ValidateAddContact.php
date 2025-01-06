<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAddContact extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|regex:/^[a-zA-Z\s]+$/|max:50',//bắt buộc nhập, chỉ đc ký từ thường và hoa và chỉ nhập đc 50 ký tự
            'email'=>'required|email|max:255',
            'phone'=>'required|digits:10',
            'title'=>'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'content'=>'required|regex:/^[a-zA-Z\s]+$/',
        ];
    }
    public function messages()
{
    return [
            'name.required'=>'không được trống',
            'name.regex'=>'tên không chứa ký đặc biệt va và số',
            'name.max' =>'tối đa chỉ 50 ký tự',

            'email.required' => 'Trường email là bắt buộc.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',

            'phone.required'=>'không được bỏ trống',
            'phone.digits'=>'chỉ đc nhập 10 ký tự số',

            'title.required'=>'không được bỏ trống',
            'title.regex'=>'không được chứa ký tự đặc biệt',
            'title.max'=>'tối đã 255 ký tự',
            
            'content.required'=>'không được bỏ trống',
            'content.regex'=>'không được chứa ký tự đặc biệt',
    ];
}
}
