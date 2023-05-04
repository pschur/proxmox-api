<?php

namespace Proxmox\Api\Template\Firewall;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Aliases
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('aliases');
    }

    public function list(){
        return $this->request();
    }

    public function create($data = [])
    {
        return $this->request(data: $data, method: Request::POST);
    }

    public function get(string $name){
        return $this->request("/$name");
    }

    public function update(string $name, array $data = [])
    {
        return $this->request("/$name", $data, Request::PUT);
    }

    public function delete(string $name)
    {
        return $this->request("/$name", method: Request::DELETE);
    }
}
