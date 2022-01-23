<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(StatusUsersSeeder::class);
        $this->call(RolSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(LineSeeder::class);
        $this->call(TypeProductSeeder::class);
        // $this->call(ProductSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(SaleStatusSeeder::class);
        $this->call(ProductStatusSeeder::class);
        $this->call(BorderSeeder::class);
        $this->call(StatusSketchSeeder::class);
        $this->call(ProductFormatSeeder::class);

    }
}
