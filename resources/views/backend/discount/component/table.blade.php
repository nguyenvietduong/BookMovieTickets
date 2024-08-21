<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th class="text-center">Mã giảm giá</th>
            <th class="text-center">Số tiền giảm</th>
            <th class="text-center">Số lượng tối đa có thể sử dụng</th>
            <th class="text-center">Số lượng hiện tại đã sử dụng</th>
            <th class="text-center">Bắt đầu áp dụng từ</th>
            <th class="text-center">Kết thúc vào ngày</th>
            <th class="text-center">Tùy chọn</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($discounts) && is_object($discounts))
        @foreach ($discounts as $discount)
        <tr>
            <td>
                <input type="checkbox" value="{{ $discount->id }}" class="input-checkbox checkBoxItem">
            </td>

            <td class="text-center">
                {{ $discount->code }}
            </td>

            <td class="text-center">
                {{ $discount->amount }}
            </td>

            <td class="text-center">
                {{ $discount->max_uses }}
            </td>

            <td class="text-center">
                {{ $discount->used_count }}
            </td>

            <td class="text-center">
                {{ $discount->valid_from }}
            </td>

            <td class="text-center">
                {{ $discount->valid_to }}
            </td>

            <td class="text-center">
                <a href="{{ route('discount.edit', $discount->id) }}" class="btn btn-success"><i
                        class="fa fa-edit"></i></a>
                <a href="{{ route('discount.delete', $discount->id) }}" class="btn btn-danger"><i
                        class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
{{ $discounts->links('pagination::bootstrap-4') }}