<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'user_id' => 1,
            'product_type_id' => 1,
            'title' => 'Zilveren Ketting',
            'description' => 'Mooie handgemaakte zilveren ketting met natuurlijke steen',
            'price' => 45,
            'material' => 'Zilver 925',
            'production_time' => '2 weken',
            'is_approved' => true,
        ]);

        Product::create([
            'user_id' => 1,
            'product_type_id' => 2,
            'title' => 'Keramische Beker',
            'description' => 'Handgedraaide keramische koffiebeker met glaze',
            'price' => 30,
            'material' => 'Keramiek',
            'production_time' => '1 week',
            'is_approved' => true,
        ]);

        Product::create([
            'user_id' => 1,
            'product_type_id' => 3,
            'title' => 'Wollen Sjaal',
            'description' => 'Zachte wollen sjaal in warm terracotta',
            'price' => 55,
            'material' => 'Merino Wol',
            'production_time' => '3 weken',
            'is_approved' => true,
        ]);

        Product::create([
            'user_id' => 1,
            'product_type_id' => 4,
            'title' => 'Schilderij Landschap',
            'description' => 'Origineel schilderij met aquarel techniek',
            'price' => 120,
            'material' => 'Papier en Aquarel',
            'production_time' => '2 weken',
            'is_approved' => true,
        ]);

        Product::create([
            'user_id' => 1,
            'product_type_id' => 1,
            'title' => 'Gouden Ring',
            'description' => 'Fijne gouden ring met minimalistisch design',
            'price' => 85,
            'material' => 'Goud 14K',
            'production_time' => '2 weken',
            'is_approved' => true,
        ]);

        Product::create([
            'user_id' => 1,
            'product_type_id' => 2,
            'title' => 'Keramische Schaal',
            'description' => 'Grote decoratieve schaal in natuurlijke kleuren',
            'price' => 65,
            'material' => 'Keramiek',
            'production_time' => '2 weken',
            'is_approved' => true,
        ]);

        Product::create([
            'user_id' => 1,
            'product_type_id' => 3,
            'title' => 'Gebreide Muts',
            'description' => 'Warme wollen muts in natuurlijke tinten',
            'price' => 25,
            'material' => 'Alpaca Wol',
            'production_time' => '1 week',
            'is_approved' => true,
        ]);

        Product::create([
            'user_id' => 1,
            'product_type_id' => 4,
            'title' => 'Print Abstracte Kunst',
            'description' => 'Mooie abstracte kunstprint in limitde oplage',
            'price' => 40,
            'material' => 'Papier',
            'production_time' => '1 week',
            'is_approved' => true,
        ]);
    }
}
