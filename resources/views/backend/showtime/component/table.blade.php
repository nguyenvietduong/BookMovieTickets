<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Thời gian bắt dầu</th>
            <th>Thời gian kết thúc</th>
            <th>Giá tiền</th>
            <th>Tên phim</th>
            <th class="text-center">Phòng chiếu</th>
            <th class="text-center">Tùy chọn </th>
        </tr>
    </thead>
    <tbody>
        @if (isset($showtimes) && is_object($showtimes))
        @foreach ($showtimes as $showtime)
        <tr>
            <td>
                <input type="checkbox" value="{{ $showtime->id }}" class="input-checkbox checkBoxItem">
            </td>
            <td>
                {{ $showtime->start_timestamp }}
            </td>
            <td>
                {{ $showtime->end_time }}
            </td>
            <td>
                {{ $showtime->price }} đ
            </td>

            <td>
                @if ($showtime->movie)
                <span class="badge text-bg-success">{{ $showtime->movie->name }}</span>
                <ul>
                    @if ($showtime->movie && $showtime->movie->director)
                    <li style="margin-bottom: 5px;">
                        Tác giả - {{ $showtime->movie->director }}
                    </li>
                    <li style="margin-bottom: 5px;">
                        Năm - {{ $showtime->movie->year }}
                    </li>
                    <li style="margin-bottom: 5px;">
                        Ngôn ngữ - {{ $showtime->movie->lang }}
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
                @if ($showtime->screen)
                <span class="badge text-bg-success">{{ $showtime->screen->name }}</span>
                <ul>
                    @if ($showtime->screen && $showtime->screen->name)
                    <li style="margin-bottom: 5px;">
                        {{ $showtime->screen->name }}
                    </li>
                    <li style="margin-bottom: 5px;">
                        Sức chứa - {{ $showtime->screen->seat_capacity }} người
                    </li>
                    <li style="margin-bottom: 5px;">
                        @foreach (config('apps.setup.screen_type') as $key => $val)
                        @if ($showtime->screen->screen_type == $key)
                        {{ $val }}
                        @endif
                        @endforeach
                    </li>
                    @else
                    <li>
                        Không tìm thấy thông tin phòng
                    </li>
                    @endif
                </ul>
                @else
                <span class="badge text-bg-success">Null</span>
                @endif
            </td>

            <td class="text-center">
                <a href="{{ route('showtime.edit', $showtime->id) }}" class="btn btn-success"><i
                        class="fa fa-edit"></i></a>
                <a href="{{ route('showtime.delete', $showtime->id) }}" class="btn btn-danger"><i
                        class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
{{ $showtimes->links('pagination::bootstrap-4') }}