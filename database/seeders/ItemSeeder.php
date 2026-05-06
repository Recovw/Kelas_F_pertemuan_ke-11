<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\ItemCategory;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriElektronik = ItemCategory::create([
            'category' => 'Elektronik'
        ]);
        
        $kategoriPerabotan = ItemCategory::create([
            'category' => 'Perabotan'
        ]);

        Item::create([
            'name' => 'Laptop Gaming ROG',
            'description' => 'Laptop super kencang untuk rendering dan gaming kelas berat.',
            'stock' => 15,
            'category_id' => $kategoriElektronik->id
        ]);

        Item::create([
            'name' => 'Mouse Wireless Master',
            'description' => 'Mouse tanpa kabel dengan baterai tahan 1 bulan.',
            'stock' => 50,
            'category_id' => $kategoriElektronik->id
        ]);

        Item::create([
            'name' => 'Meja Kerja Minimalis',
            'description' => 'Meja kerja kayu jati kokoh anti rayap.',
            'stock' => 8,
            'category_id' => $kategoriPerabotan->id
        ]);
    }
}