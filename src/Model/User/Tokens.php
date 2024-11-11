<?php

declare(strict_types=1);

namespace Pnz\MattermostClient\Model\User;

use Pnz\MattermostClient\Model\ModelCollection;

/**
 * @extends ModelCollection<Token>
 */
final class Tokens extends ModelCollection
{
    protected function createItem(array $data): Token
    {
        return Token::createFromArray($data);
    }
}
