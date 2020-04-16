<?php

namespace Mag\Blog\Api;
use Mag\Blog\Api\Data\PostInterface;

/**
 * Interface PostManagementInterface
 * @api
 */
interface PostManagementInterface
{
    /**
     * @return PostInterface
     */
    public function getEmptyObject();

    /**
     * @param PostInterface $post
     * @return void
     */
    public function save(PostInterface $post);
}