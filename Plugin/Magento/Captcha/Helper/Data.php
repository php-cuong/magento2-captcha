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

 namespace PHPCuong\Captcha\Plugin\Magento\Captcha\Helper;

 use Magento\Framework\App\Filesystem\DirectoryList;
 use Magento\Framework\Filesystem;

 class Data
 {
     /**
      * @var Filesystem
      */
     protected $_filesystem;

     /**
      * @param Filesystem $filesystem
      */
     public function __construct(
         Filesystem $filesystem
     ) {
         $this->_filesystem = $filesystem;
     }

     /**
      * Add a custom captcha font
      *
      * @param \Magento\Captcha\Helper\Data $subject
      * @param array $fonts
      * @return array
      */
     public function afterGetFonts(
         \Magento\Captcha\Helper\Data $subject,
         $fonts
     ) {
         $libDir = $this->_filesystem->getDirectoryRead(DirectoryList::APP);
         $fonts['courier'] = ['label' => 'Courier', 'path' => $libDir->getAbsolutePath('code/PHPCuong/Captcha/view/base/web/fonts/COURIER.ttf')];
         return $fonts;
     }
 }
