<?php
namespace Neos\MarketPlace\Utility;

/*
 * This file is part of the Neos.MarketPlace package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Packagist\Api\Result\Package;
use TYPO3\Flow\Annotations as Flow;

/**
 * Version Number Utility
 */
class VersionNumber
{
    /**
     * @param string $versionNumber
     * @return integer
     */
    public static function toInteger($versionNumber)
    {
        $versionParts = explode('.', $versionNumber);
        $version = $versionParts[0];
        for ($i = 1; $i < 4; $i++) {
            if (!empty($versionParts[$i])) {
                $version .= str_pad((int)$versionParts[$i], 3, '0', STR_PAD_LEFT);
            } else {
                $version .= '000';
            }
        }
        return (int)$version;
    }
}