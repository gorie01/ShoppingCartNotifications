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
    const XML_PATH_LOADER_ENABLED                 = 'mageworkshop_shoppingcartnotifications/general/loader_enabled';

    const XML_PATH_NOTIFICATION_ENABLED           = 'mageworkshop_shoppingcartnotifications/general/notifications_enabled';

    const XML_PATH_AUTO_HIDE_DELAY                = 'mageworkshop_shoppingcartnotifications/general/auto_hide_delay';

    const XML_PATH_DEFAULT_NOTIFICATIONS_DISABLED = 'mageworkshop_shoppingcartnotifications/general/default_notifications_disabled';


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

    /**
     * @return bool
     */
    public function getDefaultNotificationIsDisabled()
    {
        return (int) $this->_scopeConfig->getValue(self::XML_PATH_DEFAULT_NOTIFICATIONS_DISABLED, ScopeInterface::SCOPE_STORE);
    }
}