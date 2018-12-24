<?php

if (!function_exists('ClientNow')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function ClientNow() 
    {
        $url = Request::root();
        $domain = parse_url($url);
        $subdomain = explode('.', $domain['host'] ,-2);
        if(empty($subdomain))
        {
            $client_now = App\Client::where('client_short', 'error')->first();;
        } else {
            $client_now = App\Client::where('client_short', $subdomain[0])->with('places')->first();
        }

        return $client_now;
    }
}
