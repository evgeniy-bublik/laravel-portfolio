<?php

use Illuminate\Database\Seeder;

class ProfessionalSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('professional_skills')->insert([
              [
                  'name'          => 'PHP',
                  'value'         => 80,
                  'color_bar'     => '#11e811',
                  'display_order' => 1,
                  'active'        => 1,
              ],
              [
                  'name'          => 'Git',
                  'value'         => 75,
                  'color_bar'     => '#ea7f23',
                  'display_order' => 1,
                  'active'        => 1,
              ],
              [
                  'name'          => 'Yii/Yii2',
                  'value'         => 75,
                  'color_bar'     => '#ea7f23',
                  'display_order' => 1,
                  'active'        => 1,
              ],
              [
                  'name'          => 'HTML/CSS',
                  'value'         => 60,
                  'color_bar'     => '#d7e820',
                  'display_order' => 1,
                  'active'        => 1,
              ],
              [
                  'name'          => 'JS/JQuery',
                  'value'         => 60,
                  'color_bar'     => '#d7e820',
                  'display_order' => 1,
                  'active'        => 1,
              ],
              [
                  'name'          => 'Mysql',
                  'value'         => 60,
                  'color_bar'     => '#d7e820',
                  'display_order' => 1,
                  'active'        => 1,
              ],
              [
                  'name'          => 'Laravel',
                  'value'         => 50,
                  'color_bar'     => '#23ccf3',
                  'display_order' => 1,
                  'active'        => 1,
              ],
              [
                  'name'          => 'Symfony',
                  'value'         => 20,
                  'color_bar'     => '#aa1b08',
                  'display_order' => 1,
                  'active'        => 1,
              ],
          ]);
    }
}
