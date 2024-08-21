<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Tên phòng chiếu phim</th>
            <th>Sức chứa</th>
            <th>Loại phòng</th>
            <th class="text-center">Quản lý chỗ ngồi</th>
            <th class="text-center">Tùy chọn </th>
        </tr>
    </thead>
    <tbody>
        @if (isset($screens) && is_object($screens))
        @foreach ($screens as $screen)
        <tr>
            <td>
                <input type="checkbox" value="{{ $screen->id }}" class="input-checkbox checkBoxItem">
            </td>
            <td>
                {{ $screen->name }}
            </td>
            <td>
                {{ $screen->seat_capacity }}
            </td>
            <td>
                @foreach (config('apps.setup.screen_type') as $key => $val)
                @if ($screen->screen_type == $key)
                {{ $val }}
                @endif
                @endforeach
            </td>
            <td class="text-center">
                <a href="{{ route('seat.index', $screen->id ) }}" class="btn btn-success" target="_blank" rel="noopener noreferrer">
                    Xem ngay
                </a>
            </td>
            <td class="text-center">
                <a href="{{ route('screen.edit', $screen->id) }}" class="btn btn-success"><i
                        class="fa fa-edit"></i></a>
                <a href="{{ route('screen.delete', $screen->id) }}" class="btn btn-danger"><i
                        class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
{{ $screens->links('pagination::bootstrap-4') }}