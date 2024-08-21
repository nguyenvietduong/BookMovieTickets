<?php

namespace App\Http\Requests\Backend\Screen;

use Illuminate\Foundation\Http\FormRequest;

class StoreScreenRequest extends FormRequest
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
            'name'              => 'required|unique:screens',
            'seat_capacity'     => 'required|numeric',
            'screen_type'       => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'             => 'Bạn chưa nhập vào ô tên phòng chiếu.',
            'name.unique'               => 'Tên phòng chiếu đã tồn tại, vui lòng chọn tên phòng chiếu khác.',

            'seat_capacity.required'    => 'Bạn chưa nhập vào ô sức chứa.',
            'seat_capacity.numeric'     => 'Ô sức chứa chỉ được nhập số.',

            'screen_type.required'      => 'Bạn chưa chọn loại phòng chiếu.',
        ];
    }
}
