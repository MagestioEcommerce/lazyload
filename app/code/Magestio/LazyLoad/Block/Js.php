<?php

namespace Magestio\LazyLoad\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magestio\LazyLoad\Helper\Data as LazyLoadHelper;

/**
 * LazyLoad Page Block
 */
class Js extends Template
{

    /**
     * @var LazyLoadHelper|null
     */
    protected $_lazyLoadHelper = null;

    /**
     * Js constructor.
     * @param Context $context
     * @param LazyLoadHelper $lazyLoadHelper
     * @param array $data
     */
    public function __construct(
        Context $context,
        LazyLoadHelper $lazyLoadHelper,
        array $data = []
    ) {
        $this->_lazyLoadHelper = $lazyLoadHelper;
        parent::__construct($context, $data);
    }

    /**
     * Render tag manager JS
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (!$this->_lazyLoadHelper->isEnabled()) {
            return '';
        }

        return parent::_toHtml();
    }
}
