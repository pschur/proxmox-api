<?php

namespace Proxmox\Api\Template;

use Proxmox\Api\Template\Firewall\Aliases;
use Proxmox\Api\Template\Firewall\Group;
use Proxmox\Api\Template\Firewall\Ipset;
use Proxmox\Api\Template\Firewall\Options as FirewallOptions;
use Proxmox\Api\Template\Firewall\Rules;
use Proxmox\Support\HasPrefix;

class Firewall
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('firewall');
    }

    public function list(){
        return $this->request();
    }

    public function aliases(): Aliases
    {
        return $this->call(new Aliases());
    }

    public function groups(): Group
    {
        return $this->call(new Group());
    }

    public function ipset(): Ipset
    {
        return $this->call(new Ipset());
    }

    public function rules(): Rules
    {
        return $this->call(new Rules());
    }

    public function macros()
    {
        return $this->request("/macros");
    }

    public function options(): FirewallOptions{
        return $this->call(new FirewallOptions());
    }

    public function refs()
    {
        return $this->request("/refs");
    }

    public function log(){
        return $this->request("/logs");
    }
}
