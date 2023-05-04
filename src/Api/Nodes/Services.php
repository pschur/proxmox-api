<?php

namespace Proxmox\Api\Nodes;

use Proxmox\Api\Template\Actions;
use Proxmox\Support\HasPrefix;

class Services
{
    use HasPrefix;

    public function __construct()
    {
        $this->setUrl('services');
    }

    public function list(){
        return $this->request();
    }

    public function get(string $service){
        return $this->request($service);
    }

    public function actions(string $service): Actions
    {
        $actions = [
            'reload',
            'restart',
            'start',
            'stop'
        ];
        return $this->call(new Actions($actions))->setUrl($service);
    }

    public function state(string $service){
        return $this->request("$service/state");
    }
}
