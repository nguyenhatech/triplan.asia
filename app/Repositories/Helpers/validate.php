<?php
'old_password'  => 'required|min:6|max:100',
'password'      => 'required|min:6|max:100|confirmed',

                        'old_password.required' => 'Vui lòng nhập mật khẩu cũ',
                        'old_password.min'      => 'Mật khẩu cũ cần lớn hơn :min kí tự',
                        'old_password.max'      => 'Mật khẩu cũ cần nhỏ hơn :max kí tự',
                        'password.required'     => 'Vui lòng nhập mật khẩu mới',
                        'password.min'          => 'Mật khẩu mới cần lớn hơn :min kí tự',
                        'password.max'          => 'Mật khẩu mới cần nhỏ hơn :max kí tự',
                        'password.confirmed'    => 'Xác nhận mật khẩu mới không chính xác',

'name'          => 'nullable|required|min:1|max:100|in:1,2,3,4',

                        'name.required' => 'Vui lòng nhập họ và tên',
                        'name.min'      => 'Họ và tên cần lớn hơn :min kí tự',
                        'name.max'      => 'Họ và tên cần nhỏ hơn :max kí tự',
                        'name.in'       => 'Họ và tên chỉ nhận giá trị 1,2,3,4',

'phone'         => 'nullable|digits_between:8,12',

                        'phone.digits_between' => 'Số điện thoại có chiều dài từ :min đến :max kí tự',

'birthday'      => 'nullable|date_format:Y-m-d'

                        'birthday.date_format' => 'Ngày sinh cần đúng định dạng :format'

'username'      => 'required|email|min:5|max:100|unique:users,email',

                        'username.required' => 'Vui lòng nhập email',
                        'username.email'    => 'Email không đúng định dạng',
                        'username.unique'   => 'Email đã tồn tại trên hệ thống',
                        'username.min'      => 'Email cần lớn hơn :min kí tự',
                        'username.max'      => 'Email cần nhỏ hơn :max kí tự',

'list_time'     => 'required|array',

                        'list_time.required' => 'Vui lòng nhập danh sách thời gian',
                        'list_time.array'    => 'Danh sách thời gian phải là kiểu mảng',
