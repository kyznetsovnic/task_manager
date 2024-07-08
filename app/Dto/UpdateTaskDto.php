<?php

namespace App\Dto;

class UpdateTaskDto extends CreateTaskDto
{
    use IdDtoTrait;

    protected int|null $status = null;

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
}
