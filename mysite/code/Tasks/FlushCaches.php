<?php

/**
 * @author Simon 'Sphere' Erkelens
 * This little task clears out the caches for the current website on Twisted Bytes servers with Varnish.
 */
class FlushCaches extends BuildTask
{

    public function __construct()
    {
        $this->description = 'Flush the Varnish and SilverStripe caches on a Twisted Bytes varnish-cached hosting.';
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @inheritdoc
     */
    public function run($request)
    {
        /* Get the protocol and host */
        list($protocol, $host) = explode('://', Director::absoluteBaseURL());
        $host = trim($host, '/\\');
        try {
            echo 'Flushing SSViewer caches<br />';
            SSViewer::flush_template_cache();
            echo 'Removing temp folder ' . TEMP_FOLDER . '<br />';
            exec('rm -rf ' . TEMP_FOLDER);
            echo "Flushing Varnish cache for host $host<br />";
            @exec('flushvarnish -h ' . $host);
            echo 'Done clearing caches, please reload your site: <a href="' . Director::absoluteBaseURL() . '">here</a><br />';
            echo 'Please note, all protocols have the same cache, so not only ' . $protocol . 'is cleared';
        } catch (Exception $e) {
            echo 'Error while clearing caches: ' . $e->getMessage();
        }
    }

}