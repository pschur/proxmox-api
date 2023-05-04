<?php

namespace Proxmox\Api\Access;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Domain
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('domains');
    }

    /**
     * Authentication domain index
     * GET /api2/json$this->prefix/domains
     * @throws \Proxmox\ProxmoxException
     */
    public function all()
    {
        return $this->request();
    }

    /**
     * Add an authentication server.
     * POST /api2/json$this->prefix/domains
     * @param array $data
     * @throws \Proxmox\ProxmoxException
     */
    public function add(array $data = [])
    {
        return $this->request(data: $data, method: Request::POST);
    }

    /**
     * Authentication domain index
     * GET /api2/json$this->prefix/domains/{realm}
     * @param string $realm Authentication domain ID
     * @throws \Proxmox\ProxmoxException
     */
    public function realm(string $realm)
    {
        return $this->request("/$realm");
    }

    /**
     * Update authentication server settings.
     * PUT /api2/json$this->prefix/domains/{realm}
     * @param string $realm Authentication domain ID
     * @param array $data
     * @throws \Proxmox\ProxmoxException
     */
    public function update(string $realm, array $data = [])
    {
        return $this->request("/$realm", $data, Request::PUT);
    }

    /**
     * Delete an authentication server
     * DELETE /api2/json$this->prefix/domains/{realm}
     * @param string $realm Authentication domain ID
     * @throws \Proxmox\ProxmoxException
     */
    public function delete(string $realm)
    {
        return $this->request("/$realm", null, Request::DELETE);
    }
}
