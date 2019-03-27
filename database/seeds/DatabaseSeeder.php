<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('producto')->truncate();
        DB::table('cliente')->truncate();
        $this->call(ProductosSeeder::class);
        $this->call(ClientesSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
