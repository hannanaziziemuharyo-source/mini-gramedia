<?php

namespace Database\Seeders;

use App\Models\SubscriptionPackage;
use Illuminate\Database\Seeder;

class SubscriptionPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [
                'name'        => 'NON-FICTION',
                'price'       => 49000,
                'description' => 'PACKAGE / 30 Days',
                'color'       => '#a7f1c6',
            ],
            [
                'name'        => 'FICTION',
                'price'       => 49000,
                'description' => 'PACKAGE / 30 Days',
                'color'       => '#fed7aa',
            ],
            [
                'name'        => 'PREMIUM',
                'price'       => 99000,
                'description' => 'PACKAGE / 30 Days',
                'color'       => '#e9d5ff',
            ],
        ];

        foreach ($packages as $pkg) {
            SubscriptionPackage::firstOrCreate(
                ['name' => $pkg['name']],
                $pkg
            );
        }
    }
}
