<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')
          ->where('email', 'admin123@andalocy.com')
          ->update(['role' => 'admin']);

        $this->command->info('✅ Admin role mis à jour !');

    }
}
