<?php

/**
 * Cache cleaner
 *
 * @author Fabrizio Branca <fabrizio.branca@aoemedia.de>
 * @since 2011-02-15
 */
class Aoe_CacheCleaner_Model_Cleaner {

	/**
	 * Clean old cache entries.
	 * This method will be called via a Magento crontab task.
	 *
	 * @param void
	 * @return void
	 */
	public function clean() {
		$startTime = time();
		Mage::app()->getCache()->clean(Zend_Cache::CLEANING_MODE_OLD);
		$duration = time() - $startTime;
		Mage::log('[CACHECLEANER] Cleaning cache (duration: '.$duration.')');
	}
	
	/**
	 * Flush Magento Cache
	 *  
	 * @see app/code/core/Mage/Adminhtml/controllers/CacheController.php
	 * @return void
	 */
	public function flushSystem() {
		$startTime = time();
		Mage::app()->cleanCache();
		$duration = time() - $startTime;
		Mage::log('[CACHECLEANER] Flush Magento Cache (duration: '.$duration.')');
	}
	
	/**
	 * Flush all
	 *  
	 * @see app/code/core/Mage/Adminhtml/controllers/CacheController.php
	 * @return void
	 */
	public function flushAll() {
		$startTime = time();
		Mage::app()->getCacheInstance()->flush();
		$duration = time() - $startTime;
		Mage::log('[CACHECLEANER] Flush Cache Storage (duration: '.$duration.')');
	}
	
	/**
	 * Clean images
	 *  
	 * @see app/code/core/Mage/Adminhtml/controllers/CacheController.php
	 * @return void
	 */
	public function cleanImages() {
		$startTime = time();
		Mage::getModel('catalog/product_image')->clearCache();
		Mage::dispatchEvent('clean_catalog_images_cache_after');
		$duration = time() - $startTime;
		Mage::log('[CACHECLEANER] Flush Catalog Images Cache (duration: '.$duration.')');
	}
	
	/**
	 * Clean media
	 *  
	 * @see app/code/core/Mage/Adminhtml/controllers/CacheController.php
	 * @return void
	 */
	public function cleanMedia() {
		$startTime = time();
		Mage::getModel('core/design_package')->cleanMergedJsCss();
		Mage::dispatchEvent('clean_media_cache_after');
		$duration = time() - $startTime;
		Mage::log('[CACHECLEANER] Flush JavaScript/CSS Cache (duration: '.$duration.')');
	}

}
