<?php

namespace Database\Seeders;

use App\Models\Award;
use App\Models\Experience;
use App\Models\Portfolio;
use App\Models\Profile;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call(AshrafPortfolioSeeder::class);

        }
}
