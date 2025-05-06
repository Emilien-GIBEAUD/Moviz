<?php

namespace App\Entity;

use DateTime;

class Review extends Entity{
    protected ?int $review_id = null;
    protected ?string $review = "";
    protected ?\DateTime $date_review = null;
    protected ?float $note = null;
    protected ?bool $approved = null;
    protected ?int $user_id = null;
    protected ?int $movie_id = null;

    // adding of the user and movie attributes without relation with class User and Movie to limit the bdd calls and improve the preformances
    protected ?string $pseudo = "";
    protected ?string $email = "";
    protected ?string $title = "";

    /**
     * Get the value of review_id
     */
    public function getReviewId(): ?int
    {
        return $this->review_id;
    }

    /**
     * Set the value of review_id
     */
    public function setReviewId(?int $review_id): self
    {
        $this->review_id = $review_id;
        return $this;
    }

    /**
     * Get the value of review
     */
    public function getReview(): ?string
    {
        return $this->review;
    }

    /**
     * Set the value of review
     */
    public function setReview(?string $review): self
    {
        $this->review = $review;
        return $this;
    }

    /**
     * Get the value of date_review
     */
    public function getDateReview(): DateTime
    {
        return $this->date_review;
    }

    /**
     * Set the value of date_review
     */
    public function setDateReview(DateTime $date_review): self
    {
        $this->date_review = $date_review;

        return $this;
    }

    /**
     * Get the value of note
     */
    public function getNote(): ?float
    {
        return $this->note;
    }

    /**
     * Set the value of note
     */
    public function setNote(?float $note): self
    {
        $this->note = $note;
        return $this;
    }

    /**
     * Get the value of approved
     */
    public function getApproved(): ?bool
    {
        return $this->approved;
    }

    /**
     * Set the value of approved
     */
    public function setApproved(?bool $approved): self
    {
        $this->approved = $approved;
        return $this;
    }

    /**
     * Get the value of user_id
     */
    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     */
    public function setUserId(?int $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

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
     * Get the value of pseudo
     */
    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     */
    public function setPseudo(?string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;
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
}
