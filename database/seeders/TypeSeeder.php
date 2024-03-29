<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use illuminate\support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $types = ['Front end','Back end','Full stack'];
        foreach ($types as $type) {
        //     // DB::table('types')->insert([
        //     //     'name' => $type
        //     // ]);
            
        
        $new_type = new Type();
        $new_type->name = $type;
        $new_type->slug = Str::slug($new_type->name,'-');
        $new_type->save();  
        }
    }
}
