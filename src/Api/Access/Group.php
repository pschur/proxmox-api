<?php

namespace Proxmox\Api\Access;

use Proxmox\ProxmoxException;
use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Group
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('groups');
    }
    /**
     * Get groups
     * GET /api2/json/access/groups
     * @return mixed
     * @throws \Proxmox\ProxmoxException
     */
    public function all(): mixed
    {
        return $this->request();
    }

    /**
     * Create new group.
     * POST /api2/json/access/groups
     * @param array $data
     * @return mixed
     * @throws \Proxmox\ProxmoxException
     */
    public function create(array $data = array())
    {
        return $this->request(data: $data, method: Request::POST);
    }

    /**
     * Get group configuration
     * GET /api2/json/access/groups/{groupid}
     * @param string $groupid
     * @return mixed
     * @throws \Proxmox\ProxmoxException
     */
    public function id(string $groupid)
    {
        return $this->request("/$groupid");
    }

    /**
     * Update group data.
     * POST /api2/json/access/groups/{groupid}
     * @param string $groupid
     * @param array $data
     * @return mixed
     * @throws \Proxmox\ProxmoxException
     */
    public function update(string $groupid, array $data = array())
    {
        return $this->request("/$groupid", $data, Request::POST);
    }

    /**
     * Delete group.
     * DELETE /api2/json/access/groups/{groupid}
     * @param string $groupid
     * @return mixed
     * @throws \Proxmox\ProxmoxException
     */
    public function delete(string $groupid)
    {
        return $this->request("/$groupid", null, Request::DELETE);
    }
}
