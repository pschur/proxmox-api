<?php

namespace Proxmox\Api\Nodes;

use Proxmox\Support\HasPrefix;

class Replecations
{
    use HasPrefix;

    public function __construct()
    {
        $this->setUrl('replication');
    }

    public function list(){
        return $this->request();
    }

    public function get(string $id){
        return $this->request($id);
    }

    public function log(string $id){
        return $this->request($id.'/log');
    }

    public function schedule_now(string $id, array $data = []){
        return $this->request("$id/schedule_now", $data, Request::POST);
    }

    public function status(string $id){
        return $this->request($id.'/status');
    }
}
