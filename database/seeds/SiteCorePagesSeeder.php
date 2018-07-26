<?php

use Illuminate\Database\Seeder;

class SiteCorePagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_core_pages')->insert([
            [
                'name'             => 'Главная',
                'url'              => '/',
                'code'             => 'index',
                'meta_title'       => 'Личный сайт Евгения Бублика | {siteName}',
                'meta_description' => 'Я Евгений Бублик, как профессионал своего дела, проведу Вас дорогой, которой прошел сам, чтобы передать Вам те знания, которыми владею я',
                'meta_keywords'    => 'web-developer, веб-программист, Евгений Бублик, программист, профессионал, знания',
            ],
            [
                'name'             => 'Портфолио',
                'url'              => '/portfolio',
                'code'             => 'portfolio',
                'meta_title'       => 'Портфолио | {siteName}',
                'meta_description' => 'Работы, которые я завершил. Создание сайтов на фраемворках yii, yii2, laravel, symfony',
                'meta_keywords'    => 'портфолио, мои работы, работы Евгения Бублика, создание сайтов, создание сайтов с нуля, создание сайтов под ключ, yii, yii2',
            ],
            [
                'name'             => 'Блог',
                'url'              => '/posts',
                'code'             => 'blog',
                'meta_title'       => 'Блог | {siteName}',
                'meta_description' => 'Здесь я публикую статьи, которые могут помочь мне или кому либо другому разобраться с проблемами при создании сайтов',
                'meta_keywords'    => 'блог, yii2, yii, laravel, symfony, linux, сайт, программинг, создание сайтов',
            ],
            [
                'name'             => 'Контакты',
                'url'              => '/contacts',
                'code'             => 'contacts',
                'meta_title'       => 'Мои контактные данные | {siteName}',
                'meta_description' => 'Контактные данные Евгения Бублика',
                'meta_keywords'    => 'Евгений Бублик, evgeniy.bublik1992@gmail.com, +380935994767',
            ],
        ]);
    }
}
