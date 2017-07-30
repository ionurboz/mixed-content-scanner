<?php

namespace Spatie\MixedContentScanner;

use Spatie\Crawler\CrawlAllUrls;
use Spatie\Crawler\Crawler;
use Spatie\Crawler\CrawlProfile;

class MixedContentScanner
{
    /** @var \Spatie\MixedContentScanner\MixedContentObserver */
    public $mixedContentObserver;

    /** @var null|\Spatie\Crawler\CrawlProfile */
    public $crawlProfile;

    public function __construct(MixedContentObserver $mixedContentObserver)
    {
        $this->mixedContentObserver = $mixedContentObserver;
    }

    public function scan(string $url, array $clientOptions = [])
    {
        Crawler::create($clientOptions)
            ->setCrawlProfile($this->crawlProfile ?? new CrawlAllUrls())
            ->setCrawlObserver($this->mixedContentObserver)
            ->startCrawling($url);
    }

    public function setCrawlProfile(CrawlProfile $crawlProfile)
    {
        $this->crawlProfile = $crawlProfile;
    }
}
