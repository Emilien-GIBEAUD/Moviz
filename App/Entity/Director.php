<?php

namespace App\Entity;

class Director extends Entity{
    protected ?int $director_id = null;
    protected ?string $first_name = "";
    protected ?string $last_name = "";

    /**
     * Get the value of director_id
     */
    public function getdirectorId(): ?int
    {
        return $this->director_id;
    }

    /**
     * Set the value of director_id
     */
    public function setdirectorId(?int $director_id): self
    {
        $this->director_id = $director_id;
        return $this;
    }

    /**
     * Get the value of first_name
     */
    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     */
    public function setFirstName(?string $first_name): self
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * Get the value of last_name
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     */
    public function setLastName(?string $last_name): self
    {
        $this->last_name = $last_name;
        return $this;
    }
}
