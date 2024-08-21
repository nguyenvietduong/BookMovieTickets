<?php

namespace App\Http\Requests\Backend\Discount;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiscountRequest extends FormRequest
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
            'code'          => 'required|unique:discounts,code, ' . $this->id,
            'amount'        => 'required|numeric',
            'max_uses'      => 'required|numeric',
            'used_count'    => 'required|numeric',
            'valid_from'    => 'required|date',
            'valid_to'      => 'required|date|after_or_equal:valid_from',
        ];
    }

    public function messages(): array
    {
        return [

            'code.required'             => 'Bạn chưa nhập vào ô mã giảm giá.',
            'code.unique'               => 'Mã giảm giá đã tồn tại, vui lòng chọn mã giảm giá khác khác.',

            'amount.required'           => 'Bạn chưa nhập vào ô số tiền giảm.',
            'amount.string'             => 'Số tiền giảm phải là số.',

            'max_uses.required'         => 'Bạn chưa nhập vào ô số lượng tối đa có thể sử dụng.',
            'max_uses.string'           => 'Số lượng tối đa có thể sử dụng phải là số.',

            'used_count.required'       => 'Bạn chưa nhập vào ô số lượng hiện tại đã sử dụng.',
            'used_count.string'         => 'Số lượng hiện tại đã sử dụng phải là số.',

            'valid_from.required'       => 'Bạn chưa chọn ngày bắt đầu áp dụng.',
            'valid_from.date'           => 'Ngày bắt đầu áp dụng phải là một ngày hợp lệ.',

            'valid_to.required'         => 'Bạn chưa chọn ngày kết thúc áp dụng.',
            'valid_to.date'             => 'Ngày kết thúc áp dụng phải là một ngày hợp lệ.',
            'valid_to.after_or_equal'   => 'Ngày kết thúc áp dụng phải sau hoặc bằng ngày bắt đầu.',
        ];
    }
}
