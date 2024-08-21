<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Hình ảnh</th>
            <th>Email</th>
            <th class="text-center">Họ và tên</th>
            <th>SDT</th>
            <th>Địa chỉ</th>
            <th class="text-center">Tùy chọn</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($users) && is_object($users))
        @foreach ($users as $user)
        <tr>
            <td>
                <input type="checkbox" value="{{ $user->id }}" class="input-checkbox checkBoxItem">
            </td>
            <td>
                <img src="{{ Storage::url($user->image) }}" width="50px" height="50px" alt="">
            </td>
            <td>
                {{ $user->email }}
            </td>
            <td class="text-center">
                {{ $user->name }}
            </td>
            <td>
                {{ $user->phone }}
            </td>
            <td>
                {{ $user->address }}
            </td>

            <td class="text-center">
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success"><i
                        class="fa fa-edit"></i></a>
                <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger"><i
                        class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
{{ $users->links('pagination::bootstrap-4') }}