<?php

namespace Proxmox\Api\Nodes;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Disks
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('/disks');
    }

    public function disks(){
        return $this->request();
    }

    public function create(array $data = []) {
        return $this->request(data: $data, method: Request::POST);
    }

    public function list(){
        return $this->request("/list");
    }

    public function smart(string $disk = null){
        $optional['disk'] = !empty($disk) ? $disk : null;
        return $this->request("/smart", $optional);
    }
}
