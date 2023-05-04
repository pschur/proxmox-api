<?php

namespace Proxmox\Api\Template\Container\Ceph;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class OSDs
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('osd');
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

    function in(string $id, array $data = array()){
        return $this->request("/$id/in", $data, Request::POST);
    }

    function out(string $id, array $data = array()){
        return $this->request("/$id/out", $data, Request::POST);
    }
}
