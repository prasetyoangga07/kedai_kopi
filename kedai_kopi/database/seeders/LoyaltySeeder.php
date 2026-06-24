<?php

namespace Database\Seeders;

use App\Models\LoyaltyLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoyaltySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LoyaltyLevel::created([
            [
                'name' => 'Bronze',
                'min_points' => '0',
                'max_points' => '200',
                'primary_color' => '#704a07',
                'secondary_color' => '#b08d57',
                'text_color' => '#ffffff',
            ],
            [
                'name' => 'Silver',
                'min_points' => '201',
                'max_points' => '500',
                'primary_color' => '#c0c0c0',
                'secondary_color' => '#6b6b6b',
                'text_color' => '#ffffff',
            ],
            [
                'name' => 'Gold',
                'min_points' => '501',
                'max_points' => '1000',
                'primary_color' => '#ffd700',
                'secondary_color' => '#ffffff',
                'text_color' => '#857a00',
            ],
            [
                'name' => 'Platinum',
                'min_points' => '1001',
                'max_points' => '2000',
                'primary_color' => '#990094',
                'secondary_color' => '#6b0068',
                'text_color' => '#ffffff',
            ],
            [
                'name' => 'Diamond',
                'min_points' => '2001',
                'max_points' => '9999',
                'primary_color' => '#00dbeb',
                'secondary_color' => '#00b5c2',
                'text_color' => '#ffffff',
            ],
        ]);
    }
}
