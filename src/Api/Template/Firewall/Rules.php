<?php

namespace Proxmox\Api\Template\Firewall;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Rules
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('rules');
    }

    public function list(){
        return $this->request();
    }

    public function create(array $data = array())
    {
        return $this->request(data: $data, method: Request::POST);
    }

    public function get(int $pos)
    {
        return $this->request("/$pos");
    }

    public function update(int $pos, array $data = array())
    {
        return $this->request("/$pos", $data, Request::PUT);
    }

    public function delete(int $pos)
    {
        return $this->request("/$pos", null, Request::DELETE);
    }
}
