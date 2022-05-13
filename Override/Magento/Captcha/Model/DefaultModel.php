<?php
/**
 * GiaPhuGroup Co., Ltd.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the GiaPhuGroup.com license that is
 * available through the world-wide-web at this URL:
 * https://www.giaphugroup.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    PHPCuong
 * @package     PHPCuong_Captcha
 * @copyright   Copyright (c) 2017 GiaPhuGroup.com. All rights reserved. (http://www.giaphugroup.com/)
 * @license     https://www.giaphugroup.com/LICENSE.txt
 */

namespace PHPCuong\Captcha\Override\Magento\Captcha\Model;

class DefaultModel extends \Magento\Captcha\Model\DefaultModel
{
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @param \Magento\Framework\Session\SessionManagerInterface $session
     * @param \Magento\Captcha\Helper\Data $captchaData
     * @param ResourceModel\LogFactory $resLogFactory
     * @param string $formId
     * @param \Magento\Framework\Math\Random $randomMath
     * @param \Magento\Authorization\Model\UserContextInterface|null $userContext
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @throws \Laminas\Captcha\Exception\ExtensionNotLoadedException
     */
    public function __construct(
        \Magento\Framework\Session\SessionManagerInterface $session,
        \Magento\Captcha\Helper\Data $captchaData,
        \Magento\Captcha\Model\ResourceModel\LogFactory $resLogFactory,
        $formId,
        \Magento\Framework\Math\Random $randomMath = null,
        \Magento\Authorization\Model\UserContextInterface $userContext = null,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($session, $captchaData, $resLogFactory, $formId, $randomMath, $userContext);
        $this->setDotNoiseLevel($this->scopeConfig->getValue(
            'customer/captcha/dot_noise_level',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        ));
        $this->setLineNoiseLevel($this->scopeConfig->getValue(
            'customer/captcha/line_noise_level',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        ));
    }
}
