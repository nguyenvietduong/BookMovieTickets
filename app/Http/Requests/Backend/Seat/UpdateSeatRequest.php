<?php

namespace App\Http\Requests\Backend\Seat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSeatRequest extends FormRequest
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
        $seatId     = $this->route('id');           // Lấy ID của ghế từ route
        $screenId   = $this->input('screen_id');    // Lấy ID của phòng chiếu từ input

        return [
            'seat_number' => [
                'required',
                Rule::unique('seats')
                    ->ignore($seatId)
                    ->where(function ($query) use ($screenId) {
                        return $query->where('screen_id', $screenId);
                    }),
            ],
            'seat_type' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'seat_number.required' => 'Bạn chưa nhập vào ô số ghế.',
            'seat_number.unique' => 'Số ghế đã tồn tại trong phòng chiếu này, vui lòng chọn số ghế khác.',
            'seat_type.required' => 'Bạn chưa chọn loại ghế.',
        ];
    }
}
