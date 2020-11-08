<?php

namespace App\Http\Controllers;


class DomainValidator
{
    /**
     * Checks if domain matches a whitelist
     * Original version taken from https://gist.github.com/mjangda/1623788
    **/
    public function my_is_valid_domain( $url, $whitelisted_domains ) {
        $domain = parse_url( $url, PHP_URL_HOST );
    
        // Check if we match the domain exactly
        if ( in_array( $domain, $whitelisted_domains ) )
            return true;
    
        $valid = false;
    
        foreach( $whitelisted_domains as $whitelisted_domain ) {
            $whitelisted_domain = '.' . $whitelisted_domain;
            if( strpos( $domain, $whitelisted_domain ) === ( strlen( $domain ) - strlen( $whitelisted_domain ) ) ) {
                $valid = true;
                break;
            }
        }
        return $valid;
    }
}