<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Store;
use App\Models\StoreOwner;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'User',
            'last_name' => 'App',
            'username' => 'user',
            'email' => 'user@app.com',
            'phone_number' => '01002096347',
            'password' => Hash::make('password'),
        ]);

        $superAdmin = User::factory()->create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'username' => 'super_admin',
            'email' => 'super_admin@app.com',
            'phone_number' => '01006026347',
            'password' => Hash::make('password'),
        ]);

        Admin::create([
            'user_id' => $superAdmin->id,
            'type' => 'super-admin',
        ]);

        $storeOwner = User::factory()->create([
            'first_name' => 'Store',
            'last_name' => 'Owner',
            'username' => 'store_owner',
            'email' => 'store_owner@app.com',
            'phone_number' => '01002067347',
            'password' => Hash::make('password'),
        ]);

        $store = Store::create([
            'name' => 'Apple Store',
            'slug' => 'apple-store',
        ]);

        StoreOwner::create([
            'user_id' => $storeOwner->id,
            'type' => 'super-admin',
            'store_id' => $store->id,
        ]);

        User::factory(10)->create();
    }
}
