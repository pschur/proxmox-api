<?php

namespace Proxmox\Api\Access;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Role
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('roles');
    }

    /**
     * Get roles
     * GET /api2/json/access/roles
     */
    public function all()
    {
        return $this->request();
    }

    /**
     * Create new role.
     * POST /api2/json/access/roles
     * @param array $data
     */
    public function create(array $data = [])
    {
        return $this->request(data: $data, method: Request::POST);
    }

    /**
     * Get role configuration
     * GET /api2/json/access/roles/{roleid}
     * @param string $roleid
     */
    public function id(string $roleid)
    {
        return $this->request("/$roleid");
    }

    /**
     * Get role configuration
     * PUT /api2/json/access/roles/{roleid}
     * @param string $roleid
     * @param array $data
     */
    public function update(string $roleid, array $data = array())
    {
        return $this->request("/$roleid", $data, Request::PUT);
    }
    /**
     * Delete role.
     * DELETE /api2/json/access/roles/{roleid}
     * @param string $roleid
     */
    public function delete(string $roleid)
    {
        return $this->request("/$roleid", null, Request::DELETE);
    }
}
