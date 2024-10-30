<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Admin::factory(30)->create();
        \App\Models\Produk::factory(30)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'admin_id' => 1,
            ],
            [
                'username' => 'admin1',
                'password' => Hash::make('admin123'),
                'admin_id' => 2,
            ],
            
        ]);

        // DB::table('produk')->insert([
        //     [
        //         'produk' => 'Adidas',
        //         'harga' => 200000,
        //     ],
        //     [
        //         'produk' => 'New Era',
        //         'harga' => 300000,
        //     ],
            
        // ]);

        // DB::table('admin')->insert([
        //     [
        //         'nama' => 'Dewi',
        //         'telephone' => '09877887788',
        //         'alamat' => 'Jangli Semarang',
        //         'shift' => 1,
        //     ],
        //     [
        //         'nama' => 'Anggun',
        //         'telephone' => '0987988999',
        //         'alamat' => 'Slawi Tegal',
        //         'shift' => 2,
        //     ]
            
        // ]);


    }
}
