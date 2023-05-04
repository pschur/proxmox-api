<?php

namespace Proxmox\Api\Cluster;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Options
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('options');
    }

    public function get(){
        return $this->request();
    }

    public function set(array $data = array()){
        return $this->request(data: $data, method: Request::PUT);
    }
}
