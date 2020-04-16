<?php


namespace Mag\Blog\Model\ResourceModel\Post;

use Mag\Blog\Model\ResourceModel\Post as PostResource;
use Mag\Blog\Model\Post;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Post::class, PostResource::class);
    }
}