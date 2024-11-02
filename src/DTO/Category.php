<?php

declare(strict_types=1);

namespace App\DTO;

use Symfony\Component\Serializer\Attribute\SerializedName;

class Category
{
    #[SerializedName('doc_count')]
    private int $countBooks = 0;

    #[SerializedName('key')]
    private string $name;

    private mixed $slug;

    /**
     * @var Book[]
     */
    private array $books = [];

    public function getCountBooks(): int
    {
        return $this->countBooks;
    }

    public function setCountBooks(int $countBooks): self
    {
        $this->countBooks = $countBooks;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): mixed
    {
        return $this->slug;
    }

    public function setSlug(mixed $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Book[]
     */
    public function getBooks(): array
    {
        return $this->books;
    }

    /**
     * @param Book[] $books
     */
    public function setBooks(array $books): self
    {
        $this->books = $books;

        return $this;
    }
}
