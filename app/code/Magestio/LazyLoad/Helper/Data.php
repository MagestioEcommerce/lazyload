<?php

namespace Magestio\LazyLoad\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_ACTIVE = 'lazyload/general/active';
    const XML_SKIP_AMOUNT = 'lazyload/general/skip_amount';

    public static $ignoreLazyLoad = 0;

    /**
     * If enabled
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_ACTIVE, ScopeInterface::SCOPE_STORE);
    }

    /**
     * Ignore first x amount
     *
     * @return int
     */
    public function getSkipAmount()
    {
        return $this->scopeConfig->getValue(self::XML_SKIP_AMOUNT, ScopeInterface::SCOPE_STORE);
    }

    /**
     * Check ignore amount
     *
     * @return bool
     */
    public function applyLazyLoad()
    {
        if (self::$ignoreLazyLoad < $this->getSkipAmount() * 2) {
            self::$ignoreLazyLoad++;
            return false;
        }

        return true;
    }
}
