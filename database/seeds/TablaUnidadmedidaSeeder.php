<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TablaUnidadmedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidad_medida')->insert([
            'id' => 1,
            'descripcion' => 'lt',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('unidad_medida')->insert([
            'id' => 2,
            'descripcion' => 'kg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('unidad_medida')->insert([
            'id' => 3,
            'descripcion' => 'uni',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
