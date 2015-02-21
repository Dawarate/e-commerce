<?php 

return array(

	// set your paypal credential
    'client_id' => 'AdcrDm7pt75-5v4nn3XqKeDNV2Onb8JyQEwHQDpj3Z5bZMkW7hpwruChu4pC5meC5HR-SDcC8hxlmqlb',
    'secret'    => 'ECb8igk-MbX59p6mmjkaGqMEVph8rEampf8jcmEMq66dnHDZwK86l3YcdnvvOPaNinokS1Qr755YaFPh',

    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
); ?>
