<?php

namespace App\Entity;

class Category extends Entity{
    protected ?int $category_id = null;
    protected ?string $name = "";

    /**
     * Get the value of category_id
     */
    public function getCategoryId(): ?int
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     */
    public function setCategoryId(?int $category_id): self
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
