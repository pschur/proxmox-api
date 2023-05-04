<?php

namespace Proxmox\Api\Nodes;

use Proxmox\Support\HasPrefix;

class Network
{
    use HasPrefix;

    public function __construct()
    {
        $this->setUrl('network');
    }

    public function list(string $type = null){
        return $this->request(data: [
            'type' => $type
        ]);
    }

    public function create(array $data = []){
        return $this->request(data: $data, method: Request::POST);
    }

    public function get(string $interface){
        return $this->request($interface);
    }

    public function update(string $interface, array $data = []){
        return $this->request($interface, $data, "PUT");
    }

    public function delete(string $interface){
        return $this->request($interface, method: Request::DELETE);
    }

    public function revert(){
        return $this->request(method: Request::DELETE);
    }
}
