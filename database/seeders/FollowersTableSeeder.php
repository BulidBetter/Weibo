<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(User $user)
    {
        $users = $user->all();
        $user = $users->first();
        $user_id = $user->id;
        $followers = $users->slice(1);
        $follower_ids = $followers->pluck('id')->toArray();
        $user->follow($follower_ids);
        foreach ($followers as $follower) {
            $follower->follow($user_id);
        }
    }
}
