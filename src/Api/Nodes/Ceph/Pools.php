<?php

namespace Proxmox\Api\Template\Container\Ceph;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Pools
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('pools');
    }

    public function list(){
        return $this->request();
    }

    public function create(array $data = []){
        return $this->request(data: $data, method: Request::POST);
    }

    public function delete(){
        return $this->request("", null, Request::DELETE);
    }
}
