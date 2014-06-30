AOE_CacheCleaner
===

Removes old cache entries in your Magento instance
---

Magento does not clear old cache entries by itself, therefore the cache will grow and slow down the whole application.

The Aoe_CacheCleaner will clean up old cache-entries by firing `Mage::app()->getCache()->clean(Zend_Cache::CLEANING_MODE_OLD);` in an user-defined interval.

Additionally you're able to clean up other caches as well, such as the Catalog Image Cache and the JavaScript/CSS Cache.

http://www.fabrizio-branca.de/magento-automatic-cache-cleaner.html
