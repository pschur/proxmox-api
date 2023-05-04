<?php

namespace Proxmox\Api\Template\Container\ContainerClasses;

use Proxmox\Api\Template\Container\ContainerClasses\Firewall\Ipset;

class Firewall extends \Proxmox\Api\Template\Firewall
{
    public function ipset(): Ipset
    {
        return $this->call(new Ipset());
    }
}
