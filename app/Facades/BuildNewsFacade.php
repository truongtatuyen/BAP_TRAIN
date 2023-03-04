<?php

namespace App\Facades;

use App\Models\News;

class BuildNewsFacade
{
    protected News $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }

    public function build(int $id, string $title, string $description): News
    {
        $this->news->setId($id);
        $this->news->setTitle($title);
        $this->news->setDescription($description);

        return $this->news;
    }
}
