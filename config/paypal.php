<?php
return array(
    // set your paypal credential
    'client_id' => 'AZvZfbhXEUdb3NDTwtsX4DMeWDnGCuArrmTyurqdA0IAOtd7V08uxL_fzUgJAsSSfOAwywYAazZzgghW',
    'secret' => 'EABHjr8A7-mRLZlmJBUHtPU2mTdlvO_K4PFdTOTtnv2ITpE5kX8hqRpkM58webKRbBw9uC2uVtTh6VBT',
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