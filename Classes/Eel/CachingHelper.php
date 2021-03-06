<?php
namespace Neos\MarketPlace\Eel;

/*
 * This file is part of the Neos.MarketPlace package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\ActionRequest;
use TYPO3\Flow\Utility\Arrays;
use TYPO3\Flow\Utility\Unicode\Functions;
use TYPO3\Neos\TypoScript\Helper\CachingHelper as TypoScriptCachingHelper;

/**
 * Caching helper to make cache tag generation easier.
 */
class CachingHelper extends TypoScriptCachingHelper
{
    /**
     * @param ActionRequest $request
     * @param string $argumentName
     * @return string
     */
    public function paginationCacheKey(ActionRequest $request, $argumentName = '--browse')
    {
        $request = $request->getParentRequest() ? $request->getParentRequest() : $request;
        if (!$request->hasArgument($argumentName)) {
            return null;
        }
        $arguments = $request->getArgument($argumentName);
        $arguments = array_map('trim', array_filter($arguments));
        Arrays::sortKeysRecursively($arguments);
        return md5(json_encode($arguments));
    }

    /**
     * @param string $query
     * @return string
     */
    public function queryCacheKey($query) {
        return md5(Functions::strtolower(trim($query)));
    }
}
