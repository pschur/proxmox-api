<?php

namespace Proxmox\Api\Nodes;

use Proxmox\Api\Template\Actions;
use Proxmox\Api\Template\Container\Container;
use Proxmox\Api\Template\Container\Qemu\Agent;

class Qemu extends Container#
{
    public function __construct()
    {
        $this->setUrl('quemu');
    }

    public function actions(int $id): Actions
    {
        return $this->call(new Actions([
            'resume',
            'shutdown',
            'reset',
            'start',
            'stop',
            'reboot',
            'suspend',
            'agent'
        ]), $id);
    }

    public function agent(int $id): Agent
    {
        return $this->call(Agent::class, $id);
    }

    public function monitor(int $id, array $data = []){
        return $this->request("$id/monitor", $data, Request::POST);
    }

    public function move_disk(int $id, array $data = []){
        return $this->request("$id/move_disk", $data, Request::POST);
    }

    public function pending(int $id)
    {
        return $this->request("$id/pending");
    }

    public function sendkey(int $id, array $data = []){
        return $this->request("$id/sendkey", $data, Request::PUT);
    }

    public function unlink(int $id, array $data = []){
        return $this->request("$id/unlink", $data, Request::PUT);
    }

    public function createConfig(int $id, array $data = []){
        return $this->request("$id/config", $data, Request::POST);
    }
}