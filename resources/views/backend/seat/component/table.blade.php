<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Số ghế</th>
            <th>Loại ghế</th>
            <th class="text-center">Tùy chọn </th>
        </tr>
    </thead>
    <tbody>
        @if (isset($seats) && is_object($seats))
        @php $currentScreen = null; @endphp
        @foreach ($seats as $seat)
        @if ($seat->screen->name !== $currentScreen)
        <tr>
            <td colspan="5"><strong>{{ $seat->screen->name }}</strong></td>
        </tr>
        @php $currentScreen = $seat->screen->name; @endphp
        @endif
        <tr>
            <td>
                <input type="checkbox" value="{{ $seat->id }}" class="input-checkbox checkBoxItem">
            </td>
            <td>{{ $seat->seat_number }}</td>
            <td>
                @foreach (config('apps.setup.seat_types') as $key => $val)
                @if ($seat->seat_type == $key)
                {{ $val }}
                @endif
                @endforeach
            </td>
            <td class="text-center">
                <a href="{{ route('seat.edit', $seat->id) }}" class="btn btn-success">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="{{ route('seat.delete', $seat->id) }}" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
{{ $seats->links('pagination::bootstrap-4') }}