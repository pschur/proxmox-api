<?php

/**
 * ProxmoxVE PHP API
 *
 * @copyright 2017 Saleh <Saleh7@protonmail.ch>
 * @license http://opensource.org/licenses/MIT The MIT License.
 */

namespace Proxmox\Api;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Storage
{
    use HasPrefix;
    
    public function __construct()
    {
        $this->setUrl('storage');
    }

    public function index(string $type = null)
    {
        $optional['type'] = !empty($type) ? $type : 0;
        return $this->request(data: $optional);
    }
    
    /**
     * Create a new storage.
     * POST /api2/json
     * @param array        $data
     */
    public function create(array $data = [])
    {
        return $this->request(data: $data, method: Request::POST);
    }
    /**
     * Read storage configuration.
     * GET /api2/json/{storage}
     * @param string     $storage     The storage identifier.
     */
    public function get($storage)
    {
        return $this->request($storage);
    }

    public function update(string $storage, array $data = [])
    {
        return $this->request($storage, $data, Request::PUT);
    }
    /**
     * Delete storage configuration.
     * Delete /api2/json/{storage}
     * @param string     $storage     The storage identifier.
     */
    public function delete($storage)
    {
        return $this->request($storage, method: Request::DELETE);
    }
}
