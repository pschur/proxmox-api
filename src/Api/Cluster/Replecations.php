<?php

namespace Proxmox\Api\Cluster;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Replecations
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('replecation');
    }

    public function list(){
        return $this->request();
    }

    public function create(array $data = array()){
        return $this->request(data: $data, method: Request::POST);
    }

    public function get(string $id) {
        return $this->request("/$id");
    }

    public function update(string $id, array $data = array()){
        return $this->request("/$id", $data, "PUT");
    }

    public function delete(string $id){
        return $this->request("/$id", null, Request::DELETE);
    }
}
