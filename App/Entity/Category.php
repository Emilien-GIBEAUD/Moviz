<?php

namespace App\Entity;

class Category extends Entity{
    protected ?int $catgegory_id = null;
    protected ?string $name = "";

    /**
     * Get the value of catgegory_id
     */
    public function getCatgegoryId(): ?int
    {
        return $this->catgegory_id;
    }

    /**
     * Set the value of catgegory_id
     */
    public function setCatgegoryId(?int $catgegory_id): self
    {
        $this->catgegory_id = $catgegory_id;

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
