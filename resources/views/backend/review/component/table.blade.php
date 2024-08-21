<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Đánh giá phim</th>
            <th>Nội dung</th>
            <th>Tên phim</th>
            <th class="text-center">Người bình luận</th>
            <th class="text-center">Tùy chọn </th>
        </tr>
    </thead>
    <tbody>
        @if (isset($reviews) && is_object($reviews))
        @foreach ($reviews as $review)
        <tr>
            <td>
                <input type="checkbox" value="{{ $review->id }}" class="input-checkbox checkBoxItem">
            </td>
            <td>
                {{ $review->rating }} / 5
            </td>
            <td>
                {{ $review->comment }}
            </td>

            <td>
                @if ($review->movie)
                <span class="badge text-bg-success">{{ $review->movie->name }}</span>
                <ul>
                    @if ($review->movie && $review->movie->director)
                    <li style="margin-bottom: 5px;">
                        Tác giả - {{ $review->movie->director }}
                    </li>
                    <li style="margin-bottom: 5px;">
                        Năm - {{ $review->movie->year }}
                    </li>
                    <li style="margin-bottom: 5px;">
                        Ngôn ngữ - {{ $review->movie->lang }}
                    </li>
                    @else
                    <li>
                        Không tìm thấy thông tin phim
                    </li>
                    @endif
                </ul>
                @else
                <span class="badge text-bg-success">Null</span>
                @endif
            </td>

            <td>
                @if ($review->user)
                <span class="badge text-bg-success">{{ $review->user->name }}</span>
                <ul>
                    @if ($review->user && $review->user->name)
                    <li style="margin-bottom: 5px;">
                        Email - {{ $review->user->email }}
                    </li>
                    <li style="margin-bottom: 5px;">
                        Phone - {{ $review->user->phone }}
                    </li>
                    <li style="margin-bottom: 5px;">
                        Address - {{ $review->user->address }}
                    </li>
                    @if (Storage::exists($review->user->image) && $review->user->image)
                    <li style="margin-bottom: 5px;">
                        <img src="{{ Storage::url($review->user->image) }}" width="50px" height="50px" alt="{{ $review->user->name }}">
                    </li>
                    @endif
                    @else
                    <li>
                        Không tìm thấy thông tin người bình luận
                    </li>
                    @endif
                </ul>
                @else
                <span class="badge text-bg-success">Null</span>
                @endif
            </td>

            <td class="text-center">
                <a href="{{ route('review.edit', $review->id) }}" class="btn btn-success"><i
                        class="fa fa-edit"></i></a>
                <a href="{{ route('review.delete', $review->id) }}" class="btn btn-danger"><i
                        class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
{{ $reviews->links('pagination::bootstrap-4') }}