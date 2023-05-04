<?php

namespace Proxmox\Api\Template\Container\Ceph;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Flags
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('flags');
    }

    public function list(){
        return $this->request();
    }

    public function create(string $flag, array $data = array()){
        return $this->request("/$flag", $data, Request::POST);
    }

    public function delete(string $flag){
        return $this->request("/$flag", null, Request::DELETE);
    }
}
