<?php

namespace Proxmox\Api\Template\Firewall\Group;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Rules
{
    use HasPrefix;

    public function __construct(string $group){
        $this->setUrl('groups/'.$group);
    }

    public function create(array $data = array())
    {
        return $this->request(data: $data, method: Request::POST);
    }

    public function get(int $pos)
    {
        return $this->request($pos);
    }

    public function update(int $pos, array $data = array())
    {
        return $this->request($pos, $data, Request::PUT);
    }

    public function remove(int $pos)
    {
        return $this->request($pos, null, Request::DELETE);
    }
}
