<?php

namespace Proxmox\Api\Template\Container\ContainerClasses;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Snapshots
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('snapshot');
    }

    public function list(){
        return $this->request();
    }

    public function create(array $data = []){
        return $this->request(data: $data, method: Request::POST);
    }

    public function get(string $name){
        return $this->request($name);
    }

    public function delete(string $name){
        return $this->request($name, method: Request::DELETE);
    }

    public function config(string $name){
        $this->request("$name/config");
    }

    public function setConfig(string $name, array $data = []){
        $this->request("$name/config", $data, Request::PUT);
    }

    public function rollback(string $name, array $data){
        $this->request("$name/rollback", $data, Request::POST);
    }
}
