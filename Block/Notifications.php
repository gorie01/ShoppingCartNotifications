<?php
/**
 * Copyright © 2016 MageWorkshop. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace MageWorkshop\ShoppingCartNotifications\Block;

use Magento\Wishlist\Block\AbstractBlock;
use Magento\Store\Model\ScopeInterface;

class Notifications extends AbstractBlock
{
    const XML_PATH_LOADER_ENABLED = 'mage_workshop/shopping_cart_notifications/loader_enabled';

    const XML_PATH_NOTIFICATION_ENABLED = 'mage_workshop/shopping_cart_notifications/notifications_enabled';

    const XML_PATH_AUTO_HIDE_DELAY = 'mage_workshop/shopping_cart_notifications/auto_hide_delay';

    /**
     * @return int
     */
    public function getLoaderEnabled()
    {
        return (int) $this->_scopeConfig->getValue(self::XML_PATH_LOADER_ENABLED, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return int
     */
    public function getNotificationsEnabled()
    {
        return (int) $this->_scopeConfig->getValue(self::XML_PATH_NOTIFICATION_ENABLED, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return int
     */
    public function getAutoHideDelay()
    {
        return (int) $this->_scopeConfig->getValue(self::XML_PATH_AUTO_HIDE_DELAY, ScopeInterface::SCOPE_STORE);
    }
}