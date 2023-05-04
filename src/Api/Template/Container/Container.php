<?php

namespace Proxmox\Api\Template\Container;

use Proxmox\Api\Template\Actions;
use Proxmox\Api\Template\Container\ContainerClasses\Firewall as MainFirewall;
use Proxmox\Api\Template\Container\ContainerClasses\Snapshots;
use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Container
{
    use HasPrefix;

    public function list(){
        return $this->request();
    }

    public function create(array $data = []){
        return $this->request(data: $data, method: Request::POST);
    }

    public function get(int $id){
        return $this->request("/$id");
    }

    public function delete(int $id){
        return $this->request("/$id", method: Request::DELETE);
    }

    public function firewall(int $id): MainFirewall
    {
        return $this->call(new MainFirewall(), $id);
    }

    public function snapshots(int $id): Snapshots
    {
        return $this->call(new Snapshots(), $id);
    }

    public function actions(int $id): Actions
    {
        return $this->call(Actions::class, $id);
    }

    public function clone(int $id, array $data = []){
        return $this->request("$id/clone", $data, Request::POST);
    }

    public function config(int $id){
        return $this->request("$id/clone");
    }

    public function setConfig(int $id, array $data = []){
        return $this->request("$id/clone", $data, "PUT");
    }

    public function feature(int $id){
        return $this->request("$id/feature");
    }

    public function migrate(int $id, array $data = []){
        return $this->request("$id/migrate", $data, Request::POST);
    }

    public function resize(int $id, array $data = []){
        return $this->request("$id/resize", $data, "PUT");
    }

    public function rrd(int $id, string $datasources = null, string $timeframe = null)
    {
        $optional['ds'] = !empty($datasources) ? $datasources : null;
        $optional['timeframe'] = !empty($timeframe) ? $timeframe : null;
        return $this->request("$id/rrd", $optional);
    }

    public function rtdData(int $id, string $timeframe = null){
        $optional['timeframe'] = !empty($timeframe) ? $timeframe : null;
        return $this->request("$id/rrddata", $optional);
    }

    public function spiceproxy(int $id, array $data = []){
        return $this->request("$id/spiceproxy", $data, Request::POST);
    }

    public function template(int $id, array $data = []){
        return $this->request("$id/template", $data, Request::POST);
    }

    public function vncproxy(int $id, array $data = []){
        return $this->request("$id/vncproxy", $data, Request::POST);
    }

    public function vncwebsocket(int $id, int $port = null, string $vncticket = null){
        $optional['port'] = !empty($port) ? $port : null;
        $optional['vncticket'] = !empty($vncticket) ? $vncticket : null;
        return $this->request("$id/vncwebsocket", $optional);
    }
}
