<?php

/**
 * ProxmoxVE PHP API
 *
 * @copyright 2017 Saleh <Saleh7@protonmail.ch>
 * @license http://opensource.org/licenses/MIT The MIT License.
 */

namespace Proxmox\Api;


use Proxmox\Support\HasPrefix;

class Pools
{
    use HasPrefix;

    public function __construct()
    {
        $this->setUrl('pools');
    }

    public function list(){
        return $this->request();
    }

    public function get(string $id){
        return $this->request($id);
    }

    public function log(string $id, array $data = []){
        return $this->request($id, $data, "PUT");
    }
}
