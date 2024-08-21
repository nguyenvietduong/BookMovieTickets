<?php
return [
    'module' => [
        [
            'title' => 'Admin',
            'icon' => 'fa fa-user-shield',
            'name' => ['feedback'],
            'route' => 'admin'
        ],
        [
            'title' => 'QL Tài Khoản',
            'icon' => 'fa fa-user',
            'name' => ['user', 'admin'],
            'subModule' => [
                [
                    'title' => 'TK Khách Hàng',
                    'route' => 'admin/user/index'
                ],
                [
                    'title' => 'TK Quản Trị Viên',
                    'route' => 'admin/admin/index'
                ]
            ]
        ],
        // [
        //     'title' => 'QL Khách Hàng',
        //     'icon' => 'fa fa-user',
        //     'name' => ['user'],
        //     'route' => 'admin/user/index',
        // ],
        [
            'title' => 'QL Thể Loại',
            'icon' => 'fa fa-ticket',
            'name' => ['category'],
            'route' => 'admin/category/index'
        ],
        [
            'title' => 'QL Quốc Gia',
            'icon' => 'fa fa-globe',
            'name' => ['country'],
            'route' => 'admin/country/index'
        ],
        [
            'title' => 'QL Rạp Phim',
            'icon' => 'fa fa-address-card',
            'name' => ['screen', 'discount'],
            'subModule' => [
                [
                    'title' => 'QL Phòng Chiếu',
                    'route' => 'admin/screen/index'
                ],
                [
                    'title' => 'QL Mã Giảm Giá',
                    'route' => 'admin/discount/index'
                ]
            ]
        ],
        [
            'title' => 'QL Phim',
            'icon' => 'fa fa-film',
            'name' => ['actor', 'showtime', 'movie', 'review'],
            'subModule' => [
                [
                    'title' => 'QL Diễn viên',
                    'route' => 'admin/actor/index'
                ],
                [
                    'title' => 'QL Lịch Chiếu',
                    'route' => 'admin/showtime/index'
                ],
                [
                    'title' => 'Danh sách Phim',
                    'route' => 'admin/movie/index'
                ],
                [
                    'title' => 'QL Đánh giá Phim',
                    'route' => 'admin/review/index'
                ]
            ]
        ],

        // [
        //     'title' => 'QL Bài Viết',
        //     'icon' => 'fa fa-blog',
        //     'name' => ['article'],
        //     'route' => 'admin/article/index'
        // ],
        // [
        //     'title' => 'QL Bình Luận',
        //     'icon' => 'fa fa-comment',
        //     'name' => ['feedback'],
        //     'route' => 'admin/comment/index'
        // ],
        [
            'title' => 'Cấu Hình Chung',
            'icon' => 'fa fa-file',
            'name' => ['system'],
            'subModule' => [
                [
                    'title' => 'Cấu Hình Hệ Thống',
                    'route' => 'admin/system/index'
                ],
            ]
        ]
    ],
];
