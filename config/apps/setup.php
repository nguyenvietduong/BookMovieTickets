<?php
return [
    'web_name'  =>  'Boleto',

    'publish' => [
        '0' => 'Chọn tình trạng',
        '1' => 'Không kích hoạt',
        '2' => 'Kích hoạt',
    ],

    'screen_type'   =>  [
        ''  =>  'Chọn loại phòng chiếu',
        '1' =>  'Phòng Chiếu Thường',
        '2' =>  'Phòng Chiếu VIP',
        '3' =>  'Phòng Chiếu Premium',
    ],

    'seat_types'    =>  [
        ''  =>  'Chọn loại ghế',
        '1' =>  'Ghế Thường',
        '2' =>  'Ghế VIP',
        '3' =>  'Ghế Premium',
    ],

    'movie_types'   =>  [
        ''          =>  'Chọn loại phim',
        'phimngan'  =>  'Phim ngắn',
        'phimbo'    =>  'Phim bộ',
        'movie'     =>  'Movie',
    ],

    'movie_status' => [
        ''          => 'Chọn tình trạng',
        'completed' => 'Hoàn thành',
        'ongoing'   => 'Đang diễn ra',
    ],

    'movie_quality' => [
        ''          => 'Chọn chất lượng phim',
        'FHD'       => 'Full HD',
        'HD'        => 'HD',
    ],

    'status' => [
        '1'     => 'Chờ xác nhận',
        '2'     => 'Đã xác nhận',
        '3'     => 'Đã hoàn thành'
    ],


    'company_status' => [
        'On',
        'Off'
    ],


    'search'        => 'Tìm kiếm',
    'searchInput'   => 'Nhập thông tin tìm kiếm..',
    'perpage'       => 'bản ghi',

    'defaultPublish' => ['publish', '=', 2],
];