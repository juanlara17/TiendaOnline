<?php
return array(
    // set your paypal credential
    'client_id' => 'AQlqBARmJxiFA4xGe18fvjzlI13B3sYmzxgoUbY3FEWMOGX9G9t9sWFZAqBYVUbTHGioVROcdriKXnlu',
    'secret' => 'ENCT5b5PFhahsQFIDepeCJjzs4_tOOydyKmR2OVhDZI_DhQnNuvZ6UIXj91pRfl44fZGdvL2vM5oBTkb',

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
);
