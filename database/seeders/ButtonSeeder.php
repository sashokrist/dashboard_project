<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Button;

class ButtonSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 9; $i++) {
            Button::create([
                'user_id' => 1,
                'title' => $i % 2 == 0 ? null : "Button $i User 1",
                'link' => $i % 3 == 0 ? null : 'https://example.com',
                'color' => sprintf('#%06X', mt_rand(0, 0xFFFFFF)),
            ]);
        }

        for ($i = 1; $i <= 9; $i++) {
            Button::create([
                'user_id' => 2,
                'title' => $i % 2 == 0 ? null : "Button $i User 2",
                'link' => $i % 3 == 0 ? null : 'https://example.com',
                'color' => sprintf('#%06X', mt_rand(0, 0xFFFFFF)),
            ]);
        }
    }
}
