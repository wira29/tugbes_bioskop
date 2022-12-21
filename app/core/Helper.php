<?php 

class Helper 
{
    private $base_url = "http://localhost/tugbes-bioskop/";

    /**
     * Define mutators for site base url
     *
     * @param string $url
     * @return string
     */

    public function baseUrl(string $url = null): string
    {
        return $this->base_url . $url;
    }
}