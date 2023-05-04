<?php

namespace Proxmox\Api\Template\Container\Ceph;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Monitors
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('mon');
    }

    public function list(){
        return $this->request();
    }

    public function create(array $data = []){
        return $this->request(data: $data, method: Request::POST);
    }

    public function delete(string $id){
        return $this->request("/$id", null, Request::DELETE);
    }
}
