<?php

namespace Magestio\LazyLoad\Plugin\Block\Product;

use Magestio\LazyLoad\Helper\Data as Helper;
use Magento\Catalog\Block\Product\Image;

class ImagePlugin
{
    /**
     * @var Helper
     */
    protected $helper;

    /**
     * ImagePlugin constructor.
     * @param Helper $helper
     */
    public function __construct(
        Helper $helper
    ) {
        $this->helper = $helper;
    }

    public function afterToHtml(Image $subject, $result)
    {
        if ($this->helper->isEnabled() && $this->helper->applyLazyLoad()) {
            $find = ['img class="'];
            $replace = ['img class="lazy swatch-option-loading '];
            return str_replace($find, $replace, $result);
        }

        return $result;
    }

    public function beforeToHtml(Image $subject)
    {
        if ($this->helper->isEnabled() && $this->helper->applyLazyLoad()) {
            $customAttributes = trim($subject->getCustomAttributes() . ' data-original="' . $subject->getImageUrl() . '"');

            //$subject->setImageUrl('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC');
            $subject->setImageUrl('');
            $subject->setCustomAttributes($customAttributes);
        }

        return [$subject];
    }
}
