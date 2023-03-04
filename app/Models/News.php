<?php
namespace App\Models;

use App\Facades\BuildNewsFacade;

class News
{
    protected int $id;
    protected string $title;
    protected string $description;

    // GET METHODS
    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    // SET METHODS
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    // OPERATIONS
    public function list(): array
    {
        $result = [];

        for ($i = 0; $i <= 10; $i++) {
            $newsBuild = new BuildNewsFacade(new News());
            $id = $i + 1;
            $result[$i] = $newsBuild->build(
                $id,
                'Title of ID = ' . $id,
                'description of ID = ' . $id
            );
        }

        return $result;
    }

    public function read(int $id): object
    {
        $this->id = $id;
        $this->title = 'Title of ID = ' . $id;
        $this->description = 'description of ID = ' . $id;

        return $this;
    }
}
