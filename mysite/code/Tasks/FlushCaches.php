<?php

/**
 * @author Simon 'Sphere' Erkelens
 * This little task clears out the caches for the current website on Twisted Bytes servers with Varnish.
 */
class FlushCaches extends BuildTask
{

    public function __construct()
    {
        $this->title       = 'Flush Varnish and SilverStripe caches.';
        $this->description = 'Flush the Varnish and SilverStripe caches on a (Twisted Bytes) varnish-cached hosting.';
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
            /* Flush via SSViewer, this is a clean flush */
            echo 'Flushing SSViewer caches<br />';
            SSViewer::flush_template_cache();
            /* Remove the entire cache directory forcefully. Hard, unclean flush */
            echo 'Removing temp folder ' . TEMP_FOLDER . '<br />';
            exec('rm -rf ' . TEMP_FOLDER);
            if (!file_exists(TEMP_FOLDER)) {
                /* Show a success-message if the TEMP_FOLDER is gone */
                echo 'Succesfully purged the temporary folder. A rebuild of caches is necessary now.<br />';
            }
            /* Flush Varnish. If it isn't available, this _might_ crash. Previous statements have been executed though */
            echo "Flushing Varnish cache for host $host<br />";
            exec('flushvarnish -h ' . $host);
            /* Be friendly to the user */
            echo 'Done clearing caches, please reload your site: <a href="' . Director::absoluteBaseURL() . '">here</a><br />';
            echo 'Please note, all protocols have the same cache, so not only ' . $protocol . 'is cleared';
        } catch (Exception $e) {
            /* When boom, error out */
            echo 'Error while clearing caches: ' . $e->getMessage();
        }
    }

}