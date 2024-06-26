<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            [
                'comment' => 'comentario 1',
                'user_id' => 1,
                'order_id' => 50,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
