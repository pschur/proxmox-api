<?php

namespace Proxmox\Api\Support;

use Proxmox\Request;

trait HasPrefix
{
    protected string $prefix = '';

    protected string $url = '';

    /**
     * @param string $prefix
     * @return object
     */
    public function setPrefix(string $prefix): object
    {
        $this->prefix = trim($prefix, '/');
        return $this;
    }

    /**
     * @param string $url
     * @return object
     */
    public function setUrl(string $url): object
    {
        $this->url = trim($url, '/');
        return $this;
    }

    public function getUrl(): string
    {
        return $this->prefix.'/'.$this->url;
    }

    protected function request(string $url = null, array $data = [], string $method = Request::GET){
        $url = ($url != null) ? '/'.rtrim($url, '/') : '';
        return Request::request($url, $data, $method);
    }

    public function call(object|string $class, string $between_prefix_and_url = ''):mixed{
        if (is_string($class)){
            $class = new $class;
        }

        if ($between_prefix_and_url != ''){
            $between_prefix_and_url = '/'.rtrim($between_prefix_and_url, '/');
        }

        if (method_exists($class, 'setPrefix')){
            $class->setPrefix($this->getUrl().$between_prefix_and_url);
        }

        return $class;
    }
}
