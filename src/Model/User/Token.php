<?php

declare(strict_types=1);

namespace Pnz\MattermostClient\Model\User;

use Pnz\MattermostClient\Model\Model;

final class Token extends Model
{
    public function getId(): ?string
    {
        return $this->data['id'];
    }

    public function getUserId(): ?string
    {
        return $this->data['user_id'];
    }

    public function getDescription(): ?string
    {
        return $this->data['description'];
    }

    public function getIsActive(): ?bool
    {
        return $this->data['is_active'];
    }

    protected static function getFields(): array
    {
        return [
            'id',
            'user_id',
            'description',
            'is_active',
        ];
    }
}
