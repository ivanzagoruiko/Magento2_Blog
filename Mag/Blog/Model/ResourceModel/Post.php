<?php

namespace Mag\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Post
 * @package Mag\Blog\Model\ResourceModel
 */
class Post extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('mag_blog_page_post', 'post_id');
    }
}
