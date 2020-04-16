<?php

namespace Mag\Blog\Api;
use Mag\Blog\Api\Data\PostInterface;

/**
 * Interface PostRepositoryInterface
 * @api
 * @package Mag\Blog\Api
 */
interface PostRepositoryInterface
{
    /**
     * @return PostInterface
     */
    public function get();

    /**
     * @param int $pageId
     * @return PostInterface
     */
    public function getByPageId($pageId): PostInterface ;
}