/**
 * Copyright © 2016 MageWorkshop. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'jquery',
    'Magento_Customer/js/customer-data',
    'ko',
    // we need this component so that our mixin is loaded only after
    // catalogAddToCart: 'Magento_Catalog/js/catalog-add-to-cart'
    'catalogAddToCart',
    'mageWorkshopShoppingCartNotificationsLib'
], function ($, customerData, ko) {
    'use strict';

    var widgetIsInitializedFlag = false;

    if (!$.hasOwnProperty('mageWorkshop')) {
        $.mageWorkshop = {};
    }

    $.widget('mageWorkshop.shoppingCartNotifications', {

        options: {
            loaderEnabled: 1,
            notificationsEnabled: 1,
            autoHideDelay: 5000,
            messageTypesMapping: {
                'success': 'success',
                'notice' : 'info',
                'error'  : 'error',
                'warning': 'warn',
                'default': 'info'
            }
        },

        _create: function() {
            if (this.options.loaderEnabled) {
                // Update default settings if needed
                if (!widgetIsInitializedFlag) {
                    this._updateDefaults();
                }

                // Original widget is initialized before our code, so we need to update it's options
                var originalWidget = this.element.data("mage-catalogAddToCart");
                if (originalWidget !== undefined) {
                    originalWidget.options.processStart = 'processStart';
                    originalWidget.options.processStop = 'processStop';
                }
            }

            // Enable notifications in the left upper corner of the page
            if (this.options.notificationsEnabled && !widgetIsInitializedFlag) {
                // Subscribe to adding a new message after the shopping cart updates
                this._subscribeToMessagesUpdate();
            }
            widgetIsInitializedFlag = true;
        },
        _updateDefaults: function() {
            $.widget('mage.catalogAddToCart', $.mage.catalogAddToCart, {
                options: {
                    processStart: 'processStart',
                    processStop: 'processStop'
                }
            });
        },
        _subscribeToMessagesUpdate: function() {
            var self = this;
            customerData.get('messages').subscribe(function (newValue) {
                ko.utils.arrayForEach(newValue.messages, function(message) {
                    var type = self.options.messageTypesMapping.hasOwnProperty(message.type)
                        ? message.type
                        : 'default';
                    $.notify(message.text, self.options.messageTypesMapping[type], self.options.autoHideDelay);
                });
            });
        }
    });

    return $.mageWorkshop.shoppingCartNotifications;
});