<?php

namespace Spatie\MixedContentScanner;

use Spatie\Crawler\Url;
use Spatie\Crawler\CrawlObserver;

class MixedContentObserver implements CrawlObserver
{
    public function willCrawl(Url $url)
    {

    }

    public function hasBeenCrawled(Url $crawledUrl, $response, Url $foundOnUrl = null)
    {
        $mixedContent = MixedContentExtractor::extract((string)$response->getBody(), $crawledUrl);

        if (! count($mixedContent)) {
            $this->noMixedContentFound($crawledUrl);

            return;
        }

        foreach ($mixedContent as $mixedContentItem) {
            $this->mixedContentFound($mixedContentItem);
        }
    }

    public function mixedContentFound(MixedContent $mixedContent)
    {

    }

    public function noMixedContentFound(Url $crawledUrl)
    {

    }

    public function finishedCrawling()
    {

    }
}