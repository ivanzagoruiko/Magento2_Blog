<?php

namespace Mag\Blog\Observer;

use Magento\Cms\Block\Page;
use Magento\Cms\Model\ResourceModel\Page\Collection;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Mag\Blog\Model\ResourceModel\Post\CollectionFactory as PostCollectionFactory;

/**
 * Class PageCollectionLoadAfter
 * @package Mag\Blog\Observer
 */
class PageCollectionLoadAfter implements ObserverInterface
{
    /**
     * @var PostCollectionFactory
     */
    private $postCollectionFactory;

    /**
     * @var Collection
     */
    private $collection;

    /**
     * PageCollectionLoadAfter constructor.
     * @param Collection $collection
     * @param PostCollectionFactory $postCollectionFactory
     */
    public function __construct(
        Collection $collection,
        PostCollectionFactory $postCollectionFactory
    )
    {
        $this->collection = $collection;
        $this->postCollectionFactory = $postCollectionFactory;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        /** @var  Collection $entity */
        $collection = $observer->getEvent()->getPageCollection();

        $pageIds = [];
        /** @var Page $item */
        foreach ($collection->getItems() as $item) {
            $pageIds[] = $item->getId();
        }

        $postCollection = $this->postCollectionFactory->create();
        $postCollection->addFieldToFilter('page_id', ['in' => $pageIds]);

        foreach ($postCollection->getItems() as $post) {
            $page = $collection->getItemById($post->getPageId());
            if ($page->getId()) {
                $page->setData('author', $post->getData('author'));
                $page->setData('is_post', $post->getData('is_post'));
                $page->setData('publish_date', $post->getData('publish_date'));
            }
        }
    }
}