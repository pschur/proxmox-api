<?php

namespace Proxmox\Api\Template\Container\Qemu;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Agent
{
    use HasPrefix;

    public function __construct()
    {
        $this->setUrl('agent');
    }

    public function get(array $data = []){
        return Request::request($this->prefix.'/status/agent', $data, Request::POST);
    }

    public function exec(array $data){
        return $this->request('exec', $data, Request::POST);
    }

    public function setUserPasword(array $data){
        return $this->request('set-user-password', $data, Request::POST);
    }
}