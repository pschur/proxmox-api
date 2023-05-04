<?php

namespace Proxmox\Api\Template\Firewall;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Ipset
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('ipset');
    }

    public function list(){
        return $this->request();
    }

    public function create(array $data = array())
    {
        return $this->request(data: $data, method: Request::POST);
    }

    public function get(string $name)
    {
        return $this->request("/$name");
    }

    public function update(string $name, array $data = array())
    {
        return $this->request("/$name", $data, Request::POST);
    }

    public function delete(string $name)
    {
        return $this->request("/$name", null, Request::DELETE);
    }
}
