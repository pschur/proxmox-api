<?php

namespace Proxmox\Api\Nodes;

use Proxmox\Api\Template\Container\Storage\Content;
use Proxmox\Support\HasPrefix;

class Storages
{
    use HasPrefix;

    public function __construct()
    {
        $this->setUrl('storage');
    }

    public function list(string $content = null, string $storage = null, string $target = null, bool $enabled = null){
        $optional['content']  = !empty($content) ? $content : null;
        $optional['storage']  = !empty($storage) ? $storage : null;
        $optional['target']   = !empty($target) ? $target : null;
        $optional['enabled']  = !empty($enabled) ? $enabled : null;
        return $this->request(data: $optional);
    }

    public function read(string $storage){
        return $this->request($storage);
    }

    public function content(string $storage){
        return $this->call(Content::class, $storage);
    }

    public function rrd(){
        return $this->request('rrd');
    }

    public function rrd_data(){
        return $this->request('rrddata');
    }

    public function status(){
        return $this->request('status');
    }

    public function upload(array $data = []){
        return $this->request('upload', $data, Request::POST);
    }
}
