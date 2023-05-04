<?php

namespace Proxmox\Api\Cluster;

use Proxmox\Support\HasPrefix;

class Config
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('config');
    }

    public function get(){
        return $this->request();
    }

    public function listNodes(){
        return $this->request("/nodes");
    }

    public function toItem(){
        return $this->request("/totem");
    }
}
