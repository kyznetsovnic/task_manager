<?php

namespace App\Dto;

class ListTaskDto
{
    private int|null $status = null;
    private string|null $expiration = null;

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int|null $status
     * @return $this
     */
    public function setStatus(?int $status): self
    {
        $this->status = $status;

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
