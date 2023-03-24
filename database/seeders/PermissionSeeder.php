<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'view_category', 'display_name' => 'Xem danh mục', 'description' => 'Xem danh mục', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'create_category', 'display_name' => 'Thêm danh mục', 'description' => 'thêm danh mục mới', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'store_category', 'display_name' => 'Lưu danh mục', 'description' => 'lưu danh mục', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'edit_category', 'display_name' => 'Sửa danh mục', 'description' => 'Sửa danh mục', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'update_category', 'display_name' => 'Cập nhập danh mục', 'description' => 'Cập nhập danh mục', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'delete_category', 'display_name' => 'Xoá danh mục', 'description' => 'Xoá danh mục', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],

            ['name' => 'view_product', 'display_name' => 'Xem sản phẩm', 'description' => 'Xem sản phẩm', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'create_product', 'display_name' => 'Thêm sản phẩm', 'description' => 'thêm sản phẩm mới', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'store_product', 'display_name' => 'Lưu sản phẩm', 'description' => 'lưu sản phẩm', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'edit_product', 'display_name' => 'Sửa sản phẩm', 'description' => 'Sửa sản phẩm', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'update_product', 'display_name' => 'Cập nhập sản phẩm', 'description' => 'Cập nhập sản phẩm', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'delete_product', 'display_name' => 'Xoá sản phẩm', 'description' => 'Xoá sản phẩm', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],

            ['name' => 'view_order', 'display_name' => 'Xem đơn hàng', 'description' => 'Xem đơn hàng', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'show_order', 'display_name' => 'Xem chi tiết đơn hàng', 'description' => 'Xem chi tiết đơn hàng', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'update_order', 'display_name' => 'Cập nhập đơn hàng', 'description' => 'Cập nhập đơn hàng', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'delete_order', 'display_name' => 'Xoá đơn hàng', 'description' => 'Xoá đơn hàng', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],

            ['name' => 'view_user', 'display_name' => 'Xem tài khoản nhân viên', 'description' => 'Xem tài khoản nhân viên', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'create_user', 'display_name' => 'Thêm tài khoản nhân viên', 'description' => 'thêm tài khoản nhân viên mới', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'store_user', 'display_name' => 'Lưu tài khoản nhân viên', 'description' => 'lưu tài khoản nhân viên', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'edit_user', 'display_name' => 'Sửa tài khoản nhân viên', 'description' => 'Sửa tài khoản nhân viên', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'update_user', 'display_name' => 'Cập nhập tài khoản nhân viên', 'description' => 'Cập nhập tài khoản nhân viên', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'delete_user', 'display_name' => 'Xoá tài khoản nhân viên', 'description' => 'Xoá tài khoản nhân viên', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],

            ['name' => 'view_role', 'display_name' => 'Xem vai trò', 'description' => 'Xem vai trò', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'create_role', 'display_name' => 'Thêm vai trò', 'description' => 'thêm vai trò mới', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'store_role', 'display_name' => 'Lưu vai trò', 'description' => 'lưu vai trò', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'edit_role', 'display_name' => 'Sửa vai trò', 'description' => 'Sửa vai trò', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'update_role', 'display_name' => 'Cập nhập vai trò', 'description' => 'Cập nhập vai trò', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'delete_role', 'display_name' => 'Xoá vai trò', 'description' => 'Xoá vai trò', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],

            ['name' => 'view_contact', 'display_name' => 'Xem lời nhắn hợp tác', 'description' => 'Xem lời nhắn hợp tác', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'delete_contact', 'display_name' => 'Xoá lời nhắn hợp tác', 'description' => 'Xoá lời nhắn hợp tác', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null]
        ]);
    }
}
