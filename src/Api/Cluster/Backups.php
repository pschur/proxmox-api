<?php

namespace Proxmox\Api\Cluster;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Backups
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('backup');
    }

    /**
     * List vzdump backup schedule.
     * GET /api2/json/cluster/backup
     */
    public function list()
    {
        return $this->request();
    }

    /**
     * Create new vzdump backup job.
     * POST /api2/json/cluster/backup
     * @param array $data
     */
    public function create(array $data = array())
    {
        return $this->request(data: $data, method: Request::POST);
    }

    /**
     * Read vzdump backup job definition.
     * GET /api2/json/cluster/backup/{id}
     * @param string $id    The job ID.
     */
    public function id(string $id)
    {
        return $this->request($id);
    }

    /**
     * Update vzdump backup job definition.
     * PUT /api2/json/cluster/backup/{id}
     * @param string $id    The job ID.
     * @param array $data
     */
    public function update(string $id, array $data = array())
    {
        return $this->request($id, $data, Request::PUT);
    }

    /**
     * Delete vzdump backup job definition.
     * DELETE /api2/json/cluster/backup/{id}
     * @param string $id    The job ID.
     */
    public function delete(string $id)
    {
        return $this->request("/$id", null, Request::DELETE);
    }
}
