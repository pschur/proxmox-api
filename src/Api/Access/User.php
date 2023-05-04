<?php

namespace Proxmox\Api\Access;

use Proxmox\ProxmoxException;
use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class User
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('users');
    }

    /**
     * Get users
     * GET /api2/json/access/users
     * @throws ProxmoxException
     */
    public function all()
    {
        return $this->request();
    }

    /**
     * Create new user.
     * POST /api2/json/access/users
     * @param array $data
     * @throws ProxmoxException
     */
    public function create(array $data = array())
    {
        return $this->request(data: $data, method: Request::POST);
    }

    /**
     * Get user configuration
     * GET /api2/json/access/users/{userid}
     * @param string $userid
     * @throws ProxmoxException
     */
    public function get(string $userid)
    {
        return $this->request($userid);
    }

    /**
     * Update user configuration.
     * PUT /api2/json/access/users/{userid}
     * @param string $userid
     * @param array $data
     * @throws ProxmoxException
     */
    public function update(string $userid, array $data = array())
    {
        return $this->request($userid, $data, Request::PUT);
    }

    /**
     * Delete user.
     * DELETE /api2/json/access/users/{userid}
     * @param string $userid
     * @throws ProxmoxException
     */
    public function delete(string $userid)
    {
        return $this->request($userid, null, Request::DELETE);
    }

    /**
     * Change user password.
     * PUT /api2/json/access/password
     * @param array $data
     * @throws ProxmoxException
     */
    public function changePassword(array $data = array())
    {
        return Request::request("/access/password", $data, Request::PUT);
    }
}
