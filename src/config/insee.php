<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Insee API Production Keys
    |--------------------------------------------------------------------------
    |
    | This option defines the default environment variables used when calling
    | the Insee API. You can generate your production keys by creating an
    | app and subscribe it to the Sirene API on https://api.insee.fr.
    |
    */

    'consumer_key'    => env('INSEE_CONSUMER_KEY'),
    'consumer_secret' => env('INSEE_CONSUMER_SECRET'),

];
