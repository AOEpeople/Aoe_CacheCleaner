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
	
}
