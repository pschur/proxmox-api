<?php

namespace Proxmox\Api\Nodes;

use Proxmox\Api\Template\Container\Ceph\Flags;
use Proxmox\Api\Template\Container\Ceph\Managers;
use Proxmox\Api\Template\Container\Ceph\Monitors;
use Proxmox\Api\Template\Container\Ceph\OSDs;
use Proxmox\Api\Template\Container\Ceph\Pools;
use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Ceph
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('ceph');
    }


    public function index(){
        return $this->request();
    }

    public function flags(): Flags
    {
        return $this->call(new Flags());
    }

    public function manager(): Managers
    {
        return $this->call(new Managers());
    }

    public function monitor(): Monitors
    {
        return $this->call(new Monitors());
    }

    public function osd(): OSDs
    {
        return $this->call(new OSDs());
    }

    public function pool(): Pools
    {
        return $this->call(new Pools());
    }

    public function config(){
        return $this->request("/config");
    }

    public function crush(){
        return $this->request("/crush");
    }

    public function disks(){
        return $this->request("/disks");
    }

    public function init(array $data = []){
        return $this->request("/init", $data, Request::POST);
    }

    public function log($limit = null, $start = null)
    {
        $optional['limit'] = !empty($limit) ? $limit : 50;
        $optional['start'] = !empty($start) ? $start : 0;
        return $this->request("/log", $optional);
    }

    public function start(array $data = []){
        return $this->request("/start", $data, Request::POST);
    }

    public function stop(array $data = []){
        return $this->request("/stop", $data, Request::POST);
    }

    public function status(){
        return $this->request("/status");
    }
}
