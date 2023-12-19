<?php

declare(strict_types=1);

namespace Pnz\MattermostClient\Model\Post;

use Pnz\MattermostClient\Model\ModelBuilder;
use Pnz\MattermostClient\Model\ModelBuildTargetEnum;

class PostBuilder extends ModelBuilder
{
    public function setMessage(string $message): self
    {
        $this->params['message'] = $message;

        return $this;
    }

    public function setChannelId(string $channelId): self
    {
        $this->params['channel_id'] = $channelId;

        return $this;
    }

    /**
     * Set the post ID to comment on.
     */
    public function setRootId(string $postId): self
    {
        $this->params['root_id'] = $postId;

        return $this;
    }

    /**
     * A list of file IDs to associate with the post.
     *
     * @param string[] $fileIds
     */
    public function setFileIds(array $fileIds): self
    {
        $this->params['file_ids'] = $fileIds;

        return $this;
    }

    /**
     * Set if the post is pinned.
     */
    public function setIsPinned(bool $isPinned): self
    {
        $this->params['is_pinned'] = $isPinned;

        return $this;
    }

    protected function getRequiredFields(ModelBuildTargetEnum $target = ModelBuildTargetEnum::BUILD_FOR_CREATE): array
    {
        return match ($target) {
            ModelBuildTargetEnum::BUILD_FOR_CREATE => ['channel_id', 'message'],
            default => [],
        };
    }
}
