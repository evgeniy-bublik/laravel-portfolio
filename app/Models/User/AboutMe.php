<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class AboutMe extends Model
{
    /**
     * {@inheritdoc}
     *
     * @return string
     */
    protected $table = 'about_me';

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    protected $fillable = [
        'value',
    ];

    /**
     * Key phones.
     *
     * @var string
     */
    const KEY_PHONES = 'phones';

    /**
     * Key emails.
     *
     * @var string
     */
    const KEY_EMAILS = 'emails';

    /**
     * Key location.
     *
     * @var string
     */
    const KEY_LOCATION = 'location';

    /**
     * Key cv link.
     *
     * @var string
     */
    const KEY_CV_LINK = 'сurriculum_vitae_link';

    /**
     * Key first name.
     *
     * @var string
     */
    const KEY_FIRST_NAME = 'first_name';

    /**
     * Key last name.
     *
     * @var string
     */
    const KEY_LAST_NAME = 'last_name';

    /**
     * Key middle name.
     *
     * @var string
     */
    const KEY_MIDDLE_NAME = 'middle_name';

    /**
     * Key short about me.
     *
     * @var string
     */
    const KEY_SHOT_ABOUT_ME = 'short_about_me';

    /**
     * Key full about me.
     *
     * @var string
     */
    const KEY_FULL_ABOUT_ME = 'full_about_me';

    /**
     * Key link photo for posts.
     *
     * @var string
     */
    const KEY_LINK_PHOTO_FOR_POSTS = 'link_photo_for_posts';

    /**
     * Key link full photo.
     *
     * @var string
     */
    const KEY_LINK_FULL_PHOTO = 'link_full_photo';

    /**
     * Key link photo for block about me.
     *
     * @var string
     */
    const KEY_LINK_PHOTO_ABOUT_ME = 'link_photo_about_me';

    /**
     * Key professional.
     *
     * @var string
     */
    const KEY_PROFESSIONAL = 'professional';

    /**
     * Human title by key.
     *
     * @return string
     */
    public function getHumanTitleByKeyAttribute()
    {
        switch ($this->key) {
            case self::KEY_PHONES:
                return 'Мои телефоны';
            case self::KEY_EMAILS:
                return 'Мои email\'ы';
            case self::KEY_LOCATION:
                return 'Мое местонахождение';
            case self::KEY_CV_LINK:
                return 'Ссылка на мое резюме';
            case self::KEY_FIRST_NAME:
                return 'Мое имя';
            case self::KEY_LAST_NAME:
                return 'Моя фамилия';
            case self::KEY_MIDDLE_NAME:
                return 'Мое отчество';
            case self::KEY_SHOT_ABOUT_ME:
                return 'Краткая информация обо мне';
            case self::KEY_FULL_ABOUT_ME:
                return 'Полная информация обо мне';
            case self::KEY_LINK_PHOTO_FOR_POSTS:
                return 'Ссылка на фото для блога';
            case self::KEY_LINK_FULL_PHOTO:
                return 'Ссылка на мое большое фото';
            case self::KEY_LINK_PHOTO_ABOUT_ME:
                return 'Ссылка на фото блока "Обо мне"';
            case self::KEY_PROFESSIONAL:
                return 'Моя профессия';
        }
    }

    /**
     * Title for xeditable by key.
     *
     * @return string
     */
    public function getXeditableTitleAttribute()
    {
        switch ($this->key) {
            case self::KEY_PHONES:
                return 'Телефон';
            case self::KEY_EMAILS:
                return 'Email';
            case self::KEY_LOCATION:
                return 'Местонахождение';
            case self::KEY_CV_LINK:
                return 'Ссылка на резюме';
            case self::KEY_FIRST_NAME:
                return 'Имя';
            case self::KEY_LAST_NAME:
                return 'Фамилия';
            case self::KEY_MIDDLE_NAME:
                return 'Отчество';
            case self::KEY_SHOT_ABOUT_ME:
                return 'Краткая информация обо мне';
            case self::KEY_FULL_ABOUT_ME:
                return 'Полная информация обо мне';
            case self::KEY_LINK_PHOTO_FOR_POSTS:
                return 'Ссылка на фото для блога';
            case self::KEY_LINK_FULL_PHOTO:
                return 'Ссылка большое фото';
            case self::KEY_LINK_PHOTO_ABOUT_ME:
                return 'Ссылка на фото блока "Обо мне"';
            case self::KEY_PROFESSIONAL:
                return 'Профессия';
        }
    }

    /**
     * Type for xeditable by key.
     *
     * @return string
     */
    public function getXeditableTypeAttribute()
    {
        switch ($this->key) {
            case self::KEY_PHONES:
            case self::KEY_EMAILS:
            case self::KEY_PROFESSIONAL:
            case self::KEY_FIRST_NAME:
            case self::KEY_LAST_NAME:
            case self::KEY_MIDDLE_NAME:
            case self::KEY_CV_LINK:
            case self::KEY_LINK_PHOTO_FOR_POSTS:
            case self::KEY_LINK_FULL_PHOTO:
            case self::KEY_LINK_PHOTO_ABOUT_ME:
                return 'text';
            case self::KEY_LOCATION:
            case self::KEY_SHOT_ABOUT_ME:
            case self::KEY_FULL_ABOUT_ME:
                return 'textarea';
        }
    }

    /**
     * Get human value.
     *
     * @return string
     */
    public function getHumanValueAttribute()
    {
        if ($this->isKeyPhones()) {
            return $this->getStringPhones();
        }

        if ($this->isKeyEmails()) {
            return $this->getStringEmails();
        }

        return $this->value;
    }

    /**
     * Check if key is phones.
     *
     * @return bool
     */
    public function isKeyPhones()
    {
        return ($this->key === self::KEY_PHONES);
    }

    /**
     * Check if key is emails.
     *
     * @return bool
     */
    public function isKeyEmails()
    {
        return ($this->key === self::KEY_EMAILS);
    }

    /**
     * Get string phones divide by comma separator.
     *
     * @access private
     * @return null|string
     */
    private function getStringPhones()
    {
        if (!$this->isKeyPhones()) {
            return null;
        }

        $phones = json_decode($this->value);

        if ($phones) {
            return implode(',', $phones);
        }

        return null;
    }

    /**
     * Get string emails divide by comma separator.
     *
     * @access private
     * @return null|string
     */
    private function getStringEmails()
    {
        if (!$this->isKeyEmails()) {
            return null;
        }

        $emails = json_decode($this->value);

        if ($emails) {
            return implode(',', $emails);
        }

        return null;
    }
}
