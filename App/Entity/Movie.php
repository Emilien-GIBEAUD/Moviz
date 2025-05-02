<?php

namespace App\Entity;

use DateTime;

class Movie extends Entity{
    protected ?int $movie_id = null;
    protected ?string $title = "";
    protected ?string $synopsis = "";
    protected ?string $release_date = "";
    protected ?\DateTime $duration = null;
    protected ?string $image_name = "";

    /**
     * Get the value of movie_id
     */
    public function getMovieId(): ?int
    {
        return $this->movie_id;
    }

    /**
     * Set the value of movie_id
     */
    public function setMovieId(?int $movie_id): self
    {
        $this->movie_id = $movie_id;
        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of synopsis
     */
    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    /**
     * Set the value of synopsis
     */
    public function setSynopsis(?string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get the value of release_date
     */
    public function getReleaseDate(): string|null
    {
        return $this->release_date;
    }

    /**
     * Set the value of release_date
     */
    public function setReleaseDate(string|null $release_date): self
    {
        $this->release_date = $release_date;

        return $this;
    }

    /**
     * Get the value of duration
     */
    public function getDuration(): DateTime|null
    {
        return $this->duration;
    }

    /**
     * Set the value of duration
     */
    public function setDuration(DateTime|null $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get the value of image_name
     */
    public function getImageName(): ?string
    {
        return $this->image_name;
    }

    /**
     * Set the value of image_name
     */
    public function setImageName(?string $image_name): self
    {
        $this->image_name = $image_name;

        return $this;
    }

    public function getImagePath(){
        if (!$this->getImageName()) {
            return _ASSETS_IMG_DIR_."default-movie.png";
        }
        return _MOVIES_IMG_DIR_.$this->getImageName();
    }

}
