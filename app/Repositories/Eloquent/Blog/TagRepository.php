<?php

namespace App\Repositories\Eloquent\Blog;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\Blog\Tag;

class TagRepository extends BaseRepository
{
    /**
     * {@inheritdoc}
     * 
     * @return string
     */
    public function getModelClass()
    {
        return Tag::class;
    }

    /**
     * Find tags by names and plucked by name and id.
     * 
     * @param array $names Array tag names.
     * 
     * @return array
     */
    public function whereNamesInArrayPluckedByNameAndId($names)
    {
        return $this->whereInCollection('name', $names)->pluck('id', 'name')->toArray();
    }
}