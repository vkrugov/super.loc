<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InitDefaultData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('user')->insertOrIgnore([
            [
                'name' => 'admin',
                'email' => 'admin@test.co',
                'gender_id' => 1,
                'password' => '$2y$10$4agyPMMSmh65o8Ri/U6QiO/nReFqyy4sJuQb8Yzcfi0W6xF3PxZ1a',
                'created_at' => time()
            ]
        ]);
        DB::table('hero')->insertOrIgnore([
            [
                'id' => 1,
                'nickname' => 'Superman',
                'real_name' => 'Clark Kent',
                'origin_description' => 'Come from Space',
                'catch_phrase' => 'Marta...',
                'updated_at' => time(),
                'last_updater' => 'admin@test.co',
                'created_at' => time()
            ],
            [
                'id' => 2,
                'nickname' => 'BatMan',
                'real_name' => 'Bruce Wayne',
                'origin_description' => 'Come from Earth',
                'catch_phrase' => 'Why you say Marta ?!',
                'last_updater' => 'admin@test.co',
                'updated_at' => time(),
                'created_at' => time()
            ],
            [
                'id' => 3,
                'nickname' => 'Robin',
                'real_name' => 'Batmen bitch',
                'origin_description' => 'Can make tea',
                'catch_phrase' => 'Can I drive ?!',
                'last_updater' => 'admin@test.co',
                'updated_at' => time(),
                'created_at' => time()
            ],
            [
                'id' => 4,
                'nickname' => 'MrsCat',
                'real_name' => 'BatMan Girl',
                'origin_description' => 'like milk',
                'catch_phrase' => 'GO!',
                'last_updater' => 'admin@test.co',
                'updated_at' => time(),
                'created_at' => time()
            ],
            [
                'id' => 5,
                'nickname' => 'Flash',
                'real_name' => 'Barry Allen',
                'origin_description' => 'can fast run',
                'catch_phrase' => 'bla bla',
                'last_updater' => 'admin@test.co',
                'updated_at' => time(),
                'created_at' => time()
            ],
            [
                'id' => 6,
                'nickname' => 'NoName',
                'real_name' => 'TestName',
                'origin_description' => 'Test Desc',
                'catch_phrase' => 'TestPhrase',                'last_updater' => 'admin@test.co',
                'updated_at' => time(),
                'created_at' => time()
            ],
            [
                'id' => 7,
                'nickname' => 'TestName',
                'real_name' => 'TestName',
                'origin_description' => 'Test Desc',
                'catch_phrase' => 'TestPhrase',
                'last_updater' => 'admin@test.co',
                'updated_at' => time(),
                'created_at' => time()
            ],
            [
                'id' => 8,
                'nickname' => 'TestHero',
                'real_name' => 'TestName',
                'origin_description' => 'Test Desc',
                'catch_phrase' => 'TestPhrase',
                'last_updater' => 'admin@test.co',
                'updated_at' => time(),
                'created_at' => time()
            ],
            [
                'id' => 9,
                'nickname' => 'TestNick',
                'real_name' => 'TestName',
                'origin_description' => 'Test Desc',
                'catch_phrase' => 'TestPhrase',
                'last_updater' => 'admin@test.co',
                'updated_at' => time(),
                'created_at' => time()
            ],
            [
                'id' => 10,
                'nickname' => 'Hot Guy',
                'real_name' => 'TestName',
                'origin_description' => 'Test Desc',
                'catch_phrase' => 'TestPhrase',
                'last_updater' => 'admin@test.co',
                'updated_at' => time(),
                'created_at' => time()
            ],
            [
                'id' => 11,
                'nickname' => 'TestGuy',
                'real_name' => 'TestName',
                'origin_description' => 'Test Desc',
                'catch_phrase' => 'TestPhrase',
                'last_updater' => 'admin@test.co',
                'updated_at' => time(),
                'created_at' => time()
            ],
            [
                'id' => 12,
                'nickname' => 'TestSuper',
                'real_name' => 'TestName',
                'origin_description' => 'Test Desc',
                'catch_phrase' => 'TestPhrase',
                'last_updater' => 'admin@test.co',
                'updated_at' => time(),
                'created_at' => time()
            ],
            [
                'id' => 13,
                'nickname' => 'TestSuperHero',
                'real_name' => 'TestName',
                'origin_description' => 'Test Desc',
                'catch_phrase' => 'TestPhrase',
                'last_updater' => 'admin@test.co',
                'updated_at' => time(),
                'created_at' => time()
            ],
            [
                'id' => 14,
                'nickname' => 'BadBoy',
                'real_name' => 'TestName',
                'origin_description' => 'Test Desc',
                'catch_phrase' => 'TestPhrase',
                'last_updater' => 'admin@test.co',
                'updated_at' => time(),
                'created_at' => time()
            ]
        ]);
        DB::table('power')->insertOrIgnore([
            [
                'id' => 1,
                'name' => 'flight',
                'description' => 'Can get a star',
            ],
            [
                'id' => 2,
                'name' => 'solar flare and heat vision',
                'description' => 'Can something more',
            ],
            [
                'id' => 3,
                'name' => 'reach',
                'description' => 'Can by a lot of car',
            ],
            [
                'id' => 4,
                'name' => 'speed',
                'description' => 'Can run fast',
            ],
            [
                'id' => 5,
                'name' => 'invisible',
                'description' => 'Can see more',
            ],
            [
                'id' => 6,
                'name' => 'fire',
                'description' => 'can cook chicken fast',
            ],
            [
                'id' => 7,
                'name' => 'ice',
                'description' => 'perfect for beer',
            ],
            [
                'id' => 8,
                'name' => 'big foot',
                'description' => 'not cool power',
            ],
            [
                'id' => 9,
                'name' => 'milk power',
                'description' => 'cats like you',
            ]
        ]);
        DB::table('hero_power')->insertOrIgnore([
            [
                'hero_id' => 1,
                'power_id' => 1,
            ],
            [
                'hero_id' => 1,
                'power_id' => 2,
            ],
            [
                'hero_id' => 2,
                'power_id' => 3,
            ],
            [
                'hero_id' => 1,
                'power_id' => 4,
            ],
            [
                'hero_id' => 2,
                'power_id' => 4,
            ],
            [
                'hero_id' => 3,
                'power_id' => 5,
            ],
            [
                'hero_id' => 3,
                'power_id' => 8,
            ],
            [
                'hero_id' => 4,
                'power_id' => 3,
            ],
            [
                'hero_id' => 4,
                'power_id' => 5,
            ],
            [
                'hero_id' => 5,
                'power_id' => 1,
            ],
            [
                'hero_id' => 6,
                'power_id' => 6,
            ],
            [
                'hero_id' => 7,
                'power_id' => 7,
            ],
            [
                'hero_id' => 8,
                'power_id' => 5,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('user')->delete();
        DB::table('hero')->delete();
        DB::table('power')->delete();
        DB::table('hero_power')->delete();
    }
}
