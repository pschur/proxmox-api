<?php

namespace Proxmox\Api;

use Proxmox\Api\Access;
use Proxmox\Request;

class Proxmox
{
    /**
     * API version details, including some parts of the global datacenter config.
     *
     * @return mixed
     * @throws \Proxmox\ProxmoxException
     */
    public function version(): mixed
    {
        return Request::request('version');
    }

    public function access(): Access
    {
        return new Access();
    }

    public function cluster(): Cluster
    {
        return new Cluster();
    }

    public function nodes(): Nodes
    {
        return new Nodes();
    }

    public function pools(): Pools
    {
        return new Pools();
    }

    public function storage(): Storage
    {
        return new Storage();
    }
}