<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Genre;
use App\Models\Profile;
use App\Models\ArtistMember;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Filler extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $fan_role = Role::create(['name' => 'fan']);
        $artist_role = Role::create(['name' => 'artist']);
        $admin_role = Role::create(['name' => 'admin']);

        // $permission = Permission::create(['name' => 'edit articles']);

        $user = User::factory()->has(
            Profile::factory()
                ->has(ArtistMember::factory(random_int(2, 3)))->state([
                    'type' => 'artist',
                ])->has(Genre::factory(random_int(2, 3)))
        )->create();
    }
}
