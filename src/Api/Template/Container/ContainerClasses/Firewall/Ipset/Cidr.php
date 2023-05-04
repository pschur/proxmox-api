<?php

namespace Proxmox\Api\Template\Container\ContainerClasses\Firewall\Ipset;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Cidr
{
    use HasPrefix;

    public function __construct(string $cidr)
    {
        $this->setUrl($cidr);
    }

    public function get(){
        return $this->request();
    }

    public function update(array $data = []){
        return $this->request(data: $data, method: "PUT");
    }

    public function delete(array $data = []){
        return $this->request(data: $data, method: Request::DELETE);
    }
}
