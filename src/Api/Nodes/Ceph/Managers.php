<?php

namespace Proxmox\Api\Template\Container\Ceph;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Managers
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('mgr');
    }


    public function create(array $data = array())
    {
        return $this->request(data: $data, method: Request::POST);
    }

    public function delete(string $id)
    {
        return $this->request("/$id", null, Request::DELETE);
    }
}
