<?php

namespace Proxmox\Api\Cluster;

use Proxmox\Support\HasPrefix;

class HaGroup
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('/ha/groups');
    }

    public function list() {
        return $this->request();
    }

    public function get($group) {
        return $this->request("/$group");
    }

}
