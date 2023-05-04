<?php

/**
 * ProxmoxVE PHP API
 *
 * @copyright 2017 Saleh <Saleh7@protonmail.ch>
 * @license http://opensource.org/licenses/MIT The MIT License.
 */

namespace Proxmox\Api;

use Proxmox\Api\Cluster\Backups;
use Proxmox\Api\Cluster\Config;
use Proxmox\Api\Cluster\Firewall;
use Proxmox\Api\Cluster\HaGroup;
use Proxmox\Api\Cluster\Options;
use Proxmox\Api\Cluster\Replecations;
use Proxmox\Api\Cluster\ResourceTypes;
use Proxmox\Support\HasPrefix;

class Cluster
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('cluster');
    }

    public function cluster()
    {
        return $this->request();
    }

      public function backups(): Backups
      {
          return $this->call(new Backups());
      }

      public function config(): Config
      {
          return $this->call(new Config());
      }

      public function firewall(): Firewall
      {
          return $this->call(new Firewall());
      }

    public function ha_group(): HaGroup
    {
        return $this->call(new HaGroup());
    }

    public function ha_resources(){
        return $this->request("/ha/resources");
    }

    public function replecation(): Replecations
    {
          return $this->call(new Replecations());
    }

    public function log(int $max = null){
        $optional['max'] = !empty($max) ? $max : null;
        return $this->request("/log", $optional);
    }

    public function nextVmId(int $vmid = null){
        $optional['vmid'] = !empty($vmid) ? $vmid : null;
        return $this->request("/nextid", $optional);
    }

    public function options(): Options
    {
          return $this->call(new Options());
    }

    public function resources(ResourceTypes|null $type = null)
    {
        $optional['type'] = !empty($type) ? $type : null;
        return $this->request("/resources", $optional);
    }

    public function status()
    {
        return $this->request("/status");
    }

    public function tasks()
    {
        return $this->request("/tasks");
    }
}
