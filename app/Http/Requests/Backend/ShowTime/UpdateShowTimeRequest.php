<?php

namespace App\Http\Requests\Backend\ShowTime;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateShowTimeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $movieId = $this->movie_id;
        $screenId = $this->screen_id;
        $showTimeId = $this->route('id'); // giả sử bạn truyền ID của showtime vào route

        return [
            'start_timestamp' => [
                'required',
                'date',
                'before:end_time',
                function ($attribute, $value, $fail) use ($movieId, $screenId, $showTimeId) {
                    $overlapExists = \DB::table('showtimes')
                        ->where('movie_id', $movieId)
                        ->where('screen_id', $screenId)
                        ->where('id', '!=', $showTimeId) // Bỏ qua bản ghi hiện tại
                        ->where(function ($query) use ($value) {
                            $query->where('start_timestamp', '<=', $value)
                                ->where('end_time', '>=', $value);
                        })
                        ->exists();

                    if ($overlapExists) {
                        $fail('Thời gian chiếu bị trùng với thời gian chiếu đã tồn tại.');
                    }
                },
            ],
            'end_time' => 'required|date|after:start_timestamp',
            'price' => 'required|numeric|min:0',
            'movie_id' => 'required|exists:movies,id',
            'screen_id' => 'required|exists:screens,id',
        ];
    }

    public function messages()
    {
        return [
            'start_timestamp.required' => 'Thời gian bắt đầu là bắt buộc.',
            'start_timestamp.date' => 'Thời gian bắt đầu phải là một ngày hợp lệ.',
            'start_timestamp.before' => 'Thời gian bắt đầu phải trước thời gian kết thúc.',
            'end_time.required' => 'Thời gian kết thúc là bắt buộc.',
            'end_time.date' => 'Thời gian kết thúc phải là một ngày hợp lệ.',
            'end_time.after' => 'Thời gian kết thúc phải sau thời gian bắt đầu.',
            'price.required' => 'Giá tiền là bắt buộc.',
            'price.numeric' => 'Giá tiền phải là số.',
            'price.min' => 'Giá tiền phải lớn hơn hoặc bằng 0.',
            'movie_id.required' => 'ID phim là bắt buộc.',
            'movie_id.exists' => 'Phim đã chọn không tồn tại.',
            'screen_id.required' => 'ID phòng chiếu là bắt buộc.',
            'screen_id.exists' => 'Phòng chiếu đã chọn không tồn tại.',
        ];
    }
}
