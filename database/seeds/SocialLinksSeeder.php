<?php

use Illuminate\Database\Seeder;

class SocialLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_links')->insert([
              [
                  'additional_classes' => 'fa fa-github',
                  'link'               => 'https://github.com/evgeniy-bublik',
                  'display_order'      => 0,
                  'active'             => 1,
              ],
              [
                  'additional_classes' => 'fa fa-bitbucket',
                  'link'               => 'https://bitbucket.org/jeka_deadline',
                  'display_order'      => 0,
                  'active'             => 1,
              ],
              [
                  'additional_classes' => 'fa fa-twitter',
                  'link'               => 'https://twitter.com/EvgeniyBublik',
                  'display_order'      => 0,
                  'active'             => 1,
              ],
              [
                  'link'               => 'https://www.linkedin.com/in/evgeniy-bublik',
                  'additional_classes' => 'fa fa-linkedin',
                  'display_order'      => 0,
                  'active'             => 1,
              ],
              [
                  'link'               => 'https://vk.com/evgeniy.bublik',
                  'additional_classes' => 'fa fa-vk',
                  'display_order'      => 0,
                  'active'             => 1,
              ],
          ]);
    }
}
