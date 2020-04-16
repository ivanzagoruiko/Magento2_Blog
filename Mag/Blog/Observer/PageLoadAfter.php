<?php

namespace Mag\Blog\Observer;

use Mag\Blog\Api\PostManagementInterface;
use Mag\Blog\Api\PostRepositoryInterface;
use Mag\Blog\Model\Post;
use Magento\Cms\Api\Data\PageInterface;
use Magento\Cms\Block\Page;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class PageLoadAfter
 * @package Mag\Blog\Observer
 */
class PageLoadAfter implements ObserverInterface
{
    /**
     * @var PostRepositoryInterface
     */
    private $postRepository;

    /**
     * PageLoadAfter constructor.
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        /**
         * @var PageInterface|Page $entity
         */
        $entity = $observer->getEvent()->getObject();
        $data = $entity->getData();

        /** @var Post */
        $post = $this->postRepository->getByPageId($entity->getId());

        if ($post->getId()) {
            $entity->setData('author', $post->getData('author'));
            $entity->setData('is_post', $post->getData('is_post'));
            $entity->setData('publish_date', $post->getData('publish_date'));
        }
    }
}