<?php

namespace Proxmox\Api\Template\Container\Storage;

use Proxmox\Support\HasPrefix;

class Content
{
    use HasPrefix;

    public function __construct()
    {
        $this->setUrl('content');
    }

    public function list(){
        return $this->request();
    }

    public function create($data = array())
    {
        return $this->request(data: $data, method: Request::POST);
    }

    /**
     * Get Volume
     *
     * @param string $volume
     * @return mixed
     */
    public function get(string $volume){
        return $this->request($volume);
    }

    public function copy(string $volume, array $data = []){
        return $this->request($volume, $data, Request::POST);
    }

    public function delete(string $volume){
        return $this->request($volume, method: Request::DELETE);
    }

}
