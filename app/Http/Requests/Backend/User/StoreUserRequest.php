<?php

namespace App\Http\Requests\Backend\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email'         => 'required|email|unique:users',
            'name'          => 'required|string',
            'phone'         => 'required|digits_between:10,11|numeric|unique:users',
            'password'      => 'required|string|min:6',
            're_password'   => 'required||string|min:6|same:password',
        ];
    }

    public function messages(): array
    {
        return [

            'email.required'        => 'Bạn chưa nhập vào ô email.',
            'email.email'           => 'Vui lòng nhập đúng định dạng email.',
            'email.unique'          => 'Email đã tồn tại, vui lòng chọn email khác.',

            'name.required'         => 'Bạn chưa nhập vào ô họ tên.',
            'name.string'           => 'Họ tên phải là 1 chuỗi kí tự.',

            'phone.required'        => 'Bạn chưa nhập vào ô số điện thoại.',
            'phone.numeric'         => 'Ô số điện thoại chỉ được nhập số.',
            'phone.digits_between'  => 'Số điện thoại phải có từ 10 đến 11 chữ số.',
            'phone.unique'          => 'Số điện thoại đã tồn tại, vui lòng chọn số điện thoại khác.',

            'password.required'     => 'Bạn chưa nhập vào ô mật khẩu.',
            'password.min'          => 'Mật khẩu phải tối thiểu 6 kí tự.',

            're_password.required'  => 'Bạn chưa nhập vào ô nhập lại mật khẩu.',
            're_password.same'      => 'Mật khẩu và xác nhận mật khẩu không khớp.',
        ];
    }
}