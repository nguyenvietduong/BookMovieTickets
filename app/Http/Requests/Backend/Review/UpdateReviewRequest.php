<?php

namespace App\Http\Requests\Backend\Review;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateReviewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rating'    => 'required|numeric|min:1|max:5',
            'comment'   => 'required|string|max:500',
            'movie_id'  => 'required|exists:movies,id',
            'user_id'   => 'required|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'rating.required' => 'Bạn cần phải đánh giá phim.',
            'rating.numeric' => 'Đánh giá phải là số.',
            'rating.min' => 'Đánh giá tối thiểu là 1.',
            'rating.max' => 'Đánh giá tối đa là 5.',
            'comment.required' => 'Bạn cần phải viết nhận xét về phim.',
            'comment.string' => 'Nhận xét phải là chuỗi ký tự.',
            'comment.max' => 'Nhận xét không được vượt quá 500 ký tự.',
            'movie_id.required' => 'Phim là bắt buộc.',
            'movie_id.exists' => 'Phim đã chọn không tồn tại.',
            'user_id.required' => 'Người dùng là bắt buộc.',
            'user_id.exists' => 'Người dùng đã chọn không tồn tại.',
        ];
    }
}
