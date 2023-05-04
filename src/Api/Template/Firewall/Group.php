<?php

namespace Proxmox\Api\Template\Firewall;

use Proxmox\Api\Template\Firewall\Group\Rules;
use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Group
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('groups');
    }

    public function list(){
        return $this->request();
    }

    public function create(array $data = array())
    {
        return $this->request(data: $data, method: Request::POST);
    }

    public function get(string $group)
    {
        return $this->request("/$group");
    }

    public function delete(string $group)
    {
        return $this->request("/$group", null, Request::DELETE);
    }

    public function rules(string $group){
        return $this->call(new Rules($group));
    }
}
