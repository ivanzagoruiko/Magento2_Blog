<?php

namespace Mag\Blog\Model;

use Mag\Blog\Api\Data\PostInterface;
use Magento\Framework\Model\AbstractModel;
use Mag\Blog\Model\ResourceModel\Post as PostResource;

/**
 * Class Post
 * @package Mag\Blog\Model
 */
class Post extends AbstractModel implements PostInterface
{
    protected function _construct()
    {
        $this->_init(PostResource::class);
    }
}
