<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Áo sơ mi phong cách cổ điển', 'slug' => 'ao-so-mi-phong-cach-co-dien', 'price' => 150000, 'in_stock' => 50, 'description' => 'Áo sơ mi phong cách cổ điển màu nâu', 'image' => 'o67gc04EiE1563Iudk9m1CLpCYqTgr08g257yxXi.jpg', 'category_id' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Áo sơ mi kẻ sọc hàn quốc', 'slug' => 'ao-so-mi-ke-soc-han-quoc', 'price' => 180000, 'in_stock' => 50, 'description' => 'Áo sơ mi kẻ sọc hàn quốc trẻ trung', 'image' => 'kFnSEUXkfbUVO5qq4CpKMJ8ocEahxbj3pFj9iJH3.jpg', 'category_id' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Áo thun mặt cười dáng rộng', 'slug' => 'ao-thun-mat-cuoi-dang-rong', 'price' => 200000, 'in_stock' => 50, 'description' => 'Áo thun mặt cười dáng rộng phong cách trẻ trung mạnh mẽ', 'image' => 'csp3ZjF272ZM5orFDxai9PhcVT1RRmOsOVsdaC1Q.jpg', 'category_id' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Áo thun in hình gấu trúc', 'slug' => 'ao-thun-in-hinh-gau-truc', 'price' => 250000, 'in_stock' => 50, 'description' => 'Áo thun in hình gấu trúc phong cách trung hoa', 'image' => 'o3dNvjlY6ZH9XvmsFBX5OTK5WQin6NEirmPROIAk.jpg', 'category_id' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Áo thun thỏ nasa', 'slug' => 'ao-thun-tho-nasa', 'price' => 220000, 'in_stock' => 50, 'description' => 'Áo thun thỏ nasa đen dáng rộng', 'image' => '2YXxiJLRscPRYwINXt9Bj8dRba2nNmXCqZp70kgb.jpg', 'category_id' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Áo thun made wild', 'slug' => 'ao-thun-made-wild', 'price' => 140000, 'in_stock' => 50, 'description' => 'Một chiếc áo cực chất với phong cách cực ngầu. Xương tay.', 'image' => 'ECWKblEBWEcrYchtfHCJd45pyReCbFmnnxZoL7Ix.jpg', 'category_id' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Áo khoác gió phong cách hàn quốc', 'slug' => 'ao-khoac-gio-phong-cach-han-quoc', 'price' => 180000, 'in_stock' => 50, 'description' => 'Áo khoác gió phong cách hàn quốc woiiagee đen', 'image' => 'XTsD5tzdrMnhpwGEqap7lEVzuARaUU1GtoXs47vF.jpg', 'category_id' => 3, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Áo khoác bomber phong cách bóng chày', 'slug' => 'ao-khoac-bomber-phong-cach-bong-chay', 'price' => 280000, 'in_stock' => 50, 'description' => 'Áo khoác bomber phong cách bóng chày', 'image' => '6bFfd3pejZufsb0NNUdWUEE7gy4ATLZhTdADXJj0.jpg', 'category_id' => 3, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Áo hoodie dáng rộng hàn quốc', 'slug' => 'ao-hoodie-dang-rong-han-quoc', 'price' => 320000, 'in_stock' => 50, 'description' => 'Áo hoodie dáng rộng hàn quốc phong cách retro', 'image' => 'fvSf0wRmO6MRvD20Ce9C4FnQsA0gbbmLQIXhBQGa.jpg', 'category_id' => 4, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Áo hoodie in hoạt hình', 'slug' => 'ao-hoodie-in-hoat-hinh', 'price' => 250000, 'in_stock' => 50, 'description' => 'Áo hoodie in hoạt hình trẻ trung năng động', 'image' => '8NjY4jkp4cPqeDnLIV82yQGW2mbHsHEEMKlwzmiK.jpg', 'category_id' => 4, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Áo nỉ in hình nhạc hoà tấu', 'slug' => 'ao-ni-in-hinh-nhac-hoa-tau', 'price' => 180000, 'in_stock' => 50, 'description' => 'Áo nỉ in hình nhạc hoà tấu màu trắng', 'image' => 'dc8sTP2k5oTtJ1HllNpN6dzHWXfwipNqQ8rz9FnO.jpg', 'category_id' => 5, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],

            ['name' => 'Quần thu đông nam', 'slug' => 'quan-thu-dong-nam', 'price' => 220000, 'in_stock' => 50, 'description' => 'Quần thu đông nam', 'image' => 'JL179tM5IvzwBoMU8UNeIyKuuskcTqkS8P4yXOyy.jpg', 'category_id' => 6, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Quần thể thảo nam kẻ sọc to', 'slug' => 'quan-the-thao-nam-ke-soc-to', 'price' => 170000, 'in_stock' => 50, 'description' => 'Quần thể thao nam kẻ sọc to', 'image' => 'aEwrnmA0lwErANIxNmkj9LhgrluwXa0LDXnYGnRr.jpg', 'category_id' => 6, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Quần nỉ đen sọc đỏ', 'slug' => 'quan-ni-den-soc-do', 'price' => 140000, 'in_stock' => 50, 'description' => 'Quần track pants nỉ đen 1 sọc đỏ zip, phong cách thời trang đường phố, có bigsize cho người béo, chất nỉ da cá, không bị xù, không bị nhăn, không bám bụi.', 'image' => 'Vdkc7eKj9MSrIjXPR5iNKKP77kr5drO6zD1TGsUM.jpg', 'category_id' => 6, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Quần jogger camo', 'slug' => 'quan-jogger-camo', 'price' => 220000, 'in_stock' => 50, 'description' => 'Quần jogger phong cách bộ đội cực ngầu', 'image' => 'At4GdPR655bYKzw2mOWMr8AkEZGFLN9dljPzgQg9.jpg', 'category_id' => 7, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Quần jogger upsoap', 'slug' => 'quan-jogger-upsoap', 'price' => 220000, 'in_stock' => 50, 'description' => 'Quần jogger upsoap năng động', 'image' => 'Kx6REJRC1AP2fFBNjjMnYhjvFvFYTP6tzJaB8yQ9.jpg', 'category_id' => 7, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Quần jean demim', 'slug' => 'quan-jean-demim', 'price' => 220000, 'in_stock' => 50, 'description' => 'Quần jean demim hàn quốc', 'image' => 'JL179tM5IvzwBoMU8UNeIyKuuskcTqkS8P4yXOyy.jpg', 'category_id' => 8, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Quần sóc kẻ sọc', 'slug' => 'quan-soc-ke-soc', 'price' => 220000, 'in_stock' => 50, 'description' => 'Quần sóc kẻ sọc thể thao', 'image' => 'mL6EP3mKhsGxY1wO7r9RMggPzZUQyRv0kWj3LeHA.jpg', 'category_id' => 9, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Quần sóc cá mập', 'slug' => 'quan-soc-ca-map', 'price' => 220000, 'in_stock' => 50, 'description' => 'Quần short cá mập trơn đen', 'image' => 'GvnAa2c3DICTOHpN5DGtoR6rGihoRfSZyiJA8dUy.jpg', 'category_id' => 9, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],

            ['name' => 'Balo cỡ lớn phong cách hàn quốc', 'slug' => 'balo-co-lon-phong-cach-han-quoc', 'price' => 220000, 'in_stock' => 50, 'description' => 'Balo cỡ lớn phong cách hàn quốc', 'image' => 'OxF17Zmh2e20gIM4BnYYMbDGBPKWBMRmv8A0SoXQ.jpg', 'category_id' => 10, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
        ]);
    }
}
