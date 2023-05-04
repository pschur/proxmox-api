<?php

namespace Proxmox\Api\Template\Container\ContainerClasses\Firewall;

use Proxmox\Api\Template\Container\ContainerClasses\Firewall\Ipset\Cidr;

class Ipset extends \Proxmox\Api\Template\Firewall\Ipset
{
    public function cidr(string $ipset, string $cidr){
        return $this->call(new Cidr($cidr), $ipset);
    }
}
