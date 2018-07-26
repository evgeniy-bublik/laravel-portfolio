<?php

use Illuminate\Database\Seeder;
use App\Models\User\AboutMe;

class AboutMeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_me')->insert([
              [
                  'key'   => AboutMe::KEY_PHONES,
                  'value' => json_encode(['+380935994767']),
              ],
              [
                  'key'   => AboutMe::KEY_EMAILS,
                  'value' => json_encode(['evgeniy.bublik1992@gmail.com']),
              ],
              [
                  'key'   => AboutMe::KEY_LOCATION,
                  'value' => 'г. Чернигов',
              ],
              [
                  'key'   => AboutMe::KEY_CV_LINK,
                  'value' => '/files/app/cv.pdf',
              ],
              [
                  'key'   => AboutMe::KEY_FIRST_NAME,
                  'value' => 'Евгений',
              ],
              [
                  'key'   => AboutMe::KEY_LAST_NAME,
                  'value' => 'Бублик',
              ],
              [
                  'key'   => AboutMe::KEY_MIDDLE_NAME,
                  'value' => 'Владимирович',
              ],
              [
                  'key'   => AboutMe::KEY_SHOT_ABOUT_ME,
                  'value' => '',
              ],
              [
                  'key'   => AboutMe::KEY_FULL_ABOUT_ME,
                  'value' => 'Я занимаюсь разработкой сайтов с апреля месяца 2015 года. Сейчас я стремлюсь создавать качественные проекты и в этом мне поможет мой блог, ведь здесь я планирую рассказывать о каждом моем этапе роста себя как профессионала.',
              ],
              [
                  'key'   => AboutMe::KEY_LINK_PHOTO_FOR_POSTS,
                  'value' => '',
              ],
              [
                  'key'   => AboutMe::KEY_LINK_FULL_PHOTO,
                  'value' => '',
              ],
              [
                  'key'   => AboutMe::KEY_LINK_PHOTO_ABOUT_ME,
                  'value' => '',
              ],
              [
                  'key'   => AboutMe::KEY_PROFESSIONAL,
                  'value' => 'Web-developer',
              ],
          ]);
    }
}
