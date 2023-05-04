<?php

namespace Proxmox\Api\Nodes;

use Proxmox\Api\Template\Container\Container;

class LXC extends Container
{
    public function __construct()
    {
        $this->setUrl('/lxc');
    }
}
