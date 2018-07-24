<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class AboutMe extends Model
{
    protected $table = 'about_me';

    const KEY_PHONES = 'phones';

    const KEY_EMAILS = 'emails';

    const KEY_LOCATION = 'location';

    const KEY_CV_LINK = 'сurriculum_vitae_link';

    const KEY_FIRST_NAME = 'first_name';

    const KEY_LAST_NAME = 'last_name';

    const KEY_MIDDLE_NAME = 'middle_name';

    const KEY_SHOT_ABOUT_ME = 'short_about_me';

    const KEY_FULL_ABOUT_ME = 'full_about_me';

    const KEY_LINK_PHOTO_FOR_POSTS = 'link_photo_for_posts';

    const KEY_LINK_FULL_PHOTO = 'link_full_photo';

    const KEY_LINK_PHOTO_ABOUT_ME = 'link_photo_about_me';

    const KEY_PROFESSIONAL = 'professional';
}
