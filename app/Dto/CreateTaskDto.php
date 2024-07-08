<?php

namespace App\Dto;

class CreateTaskDto
{
    protected string|null $title = null;
    protected string|null $description = null;
    protected string|null $expiration = null;

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return $this
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getExpiration(): ?string
    {
        return $this->expiration;
    }

    /**
     * @param string|null $expiration
     * @return $this
     */
    public function setExpiration(?string $expiration): self
    {
        $this->expiration = $expiration;

        return $this;
    }
}
