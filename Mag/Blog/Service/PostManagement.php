<?php

namespace Mag\Blog\Service;

use Mag\Blog\Api\Data\PostInterface;
use Mag\Blog\Api\PostManagementInterface;
use Mag\Blog\Model\PostFactory;
use Mag\Blog\Model\ResourceModel\Post as PostResource;
use Magento\Framework\Exception\AlreadyExistsException;

/**
 * Class PostManagement
 * @package Mag\Blog\Service
 */
class PostManagement implements PostManagementInterface
{

    /**
     * @var PostFactory
     */
    private $postFactory;

    /**
     * @var PostResource
     */
    private $postResource;

    public function __construct(
        PostFactory $postFactory,
        PostResource $postResource
    )
    {
        $this->postFactory = $postFactory;
        $this->postResource = $postResource;
    }

    /**
     * @return PostInterface
     */
    public function getEmptyObject(): PostInterface
    {
        return $this->postFactory->create();
    }

    /**
     * @param PostInterface $post
     * @throws AlreadyExistsException
     */
    public function save(PostInterface $post)
    {
        $this->postResource->save($post);
    }
}