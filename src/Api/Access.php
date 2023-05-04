<?php

/**
 * ProxmoxVE PHP API
 *
 * @copyright 2017 Saleh <Saleh7@protonmail.ch>
 * @license http://opensource.org/licenses/MIT The MIT License.
 */

namespace Proxmox\Api;

use Proxmox\Api\Access\Domain;
use Proxmox\Api\Access\Group;
use Proxmox\Api\Access\Role;
use Proxmox\Request;
use Proxmox\Support\HasPrefix;
use Proxmox\Api\Access\User;

class Access
{
    use HasPrefix;


    public function __construct()
    {
        $this->setUrl('/access');
    }

    public function access()
    {
        return Request::request($this->prefix);
    }

    public function domains(): Domain
    {
        return $this->call(new Domain());
    }

    public function groups(): Group
    {
        return $this->call(new Group());
    }

    public function roles():Role
    {
        return $this->call(new Role());
    }

    public function users():User
    {
          return $this->call(new User());
    }

    public function acl()
    {
        return new class {
            public function get(){
                return Request::request("/access/acl");
            }

            public function update($data = array())
            {
                return Request::request("/access/acl", $data, Request::PUT);
            }
        };
    }


    public function createTicket($data = array())
    {
        return $this->request("/ticket", $data, Request::POST);
    }
}
