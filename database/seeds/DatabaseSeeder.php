<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PostsSeeder::class);
        $this->call(SocialLinksSeeder::class);
        $this->call(AboutMeSeeder::class);
        $this->call(ProfessionalSkillsSeeder::class);
        $this->call(SiteCorePagesSeeder::class);
        $this->call(UserSeeder::class);
    }
}
