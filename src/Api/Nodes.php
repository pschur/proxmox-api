<?php

/**
 * ProxmoxVE PHP API
 *
 * @copyright 2017 Saleh <Saleh7@protonmail.ch>
 * @license http://opensource.org/licenses/MIT The MIT License.
 */

namespace Proxmox\Api;

// /api2/json/nodes
use Proxmox\Api\Nodes\Ceph;
use Proxmox\Api\Nodes\Disks;
use Proxmox\Api\Nodes\LXC;
use Proxmox\Api\Nodes\Qemu;
use Proxmox\Api\Nodes\Scan;
use Proxmox\Api\Nodes\Services;
use Proxmox\Api\Nodes\Storages;
use Proxmox\Api\Template\Firewall;
use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Nodes
{
    use HasPrefix;

    public function __construct(){
        $this->setUrl('nodes');
    }

    public function list() {
        return $this->request();
    }

    public function apt(){
        return new class {
            public function list(string $node){
                return Request::request("/nodes/$node/apt");
            }

            public function update(string $node, array $data = []){
                return Request::request("/nodes/$node/apt/update", $data, Request::POST);
            }

            // TODO: Figure out wich one is for what
            public function update1(string $node, array $data = []){
                return Request::request("/nodes/$node/apt/update", $data, Request::POST);
            }
            public function update2($node){
                return Request::request("/nodes/$node/apt/update");
            }
            // ----

            public function changelog(string $node, string $name = null){
                $optional['name'] = !empty($name) ? $name : null;
                return Request::request("/nodes/$node/apt/changelog", $optional);
            }
        };
    }

    public function ceph(string $node): Ceph
    {
        return $this->call(new Ceph, $node);
    }

    public function disks(string $node): Disks
    {
        return $this->call(new Disks, $node);
    }

    public function firewall(string $node): Firewall
    {
        return $this->call(new Firewall, $node);
    }

    public function lxc(string $node): LXC
    {
        return $this->call(LXC::class, $node);
    }

    public function qemu(string $node): Qemu
    {
        return $this->call(Qemu::class, $node);
    }

    public function scan(string $node): Scan
    {
        return $this->call(Scan::class, $node);
    }

    public function services(string $node): Services
    {
        return $this->call(Services::class, $node);
    }

    public function storage(string $node): Storages {
        return $this->call(Storages::class, $node);
    }


  /**
    * Read task list for one node (finished tasks).
    * GET /api2/json/nodes/{node}/tasks
    * @param string   $node     The cluster node name.
    * @param boolean  $errors
    * @param integer  $limit
    * @param integer  $vmid     Only list tasks for this VM.
    * @param integer  $start
  */
  public function Tasks($node, $errors = null, $limit = null, $vmid = null, $start = null)
  {
      $optional['errors']  = !empty($errors) ? $errors : false;
      $optional['limit']   = !empty($limit) ? $limit : null;
      $optional['vmid']    = !empty($vmid) ? $vmid : null;
      $optional['start']   = !empty($start) ? $start : null;
      return Request::request("/nodes/$node/tasks", $optional);
  }
  /**
    * Read task upid
    * GET /api2/json/nodes/{node}/tasks/{upid}
    * @param string   $node     The cluster node name.
    * @param string   $upid
  */
  public function tasksUpid($node, $upid)
  {
      return Request::request("/nodes/$node/tasks/$upid");
  }
  /**
    * Stop a task.
    * DELETE /api2/json/nodes/{node}/tasks/{upid}
    * @param string   $node     The cluster node name.
    * @param string   $upid
  */
  public function tasksStop($node, $upid)
  {
      return Request::request("/nodes/$node/tasks/$upid", null, Request::DELETE);
  }
  /**
    * Read task log.
    * GET /api2/json/nodes/{node}/tasks/{upid}/log
    * @param string   $node     The cluster node name.
    * @param string   $upid
    * @param integer  $limit
    * @param integer  $start
  */
  public function tasksLog($node, $upid, $limit = null, $start = null)
  {
      $optional['limit']   = !empty($limit) ? $limit : null;
      $optional['start']   = !empty($start) ? $start : null;
      return Request::request("/nodes/$node/tasks/$upid/log", $optional);
  }
  /**
    * Read task status.
    * GET /api2/json/nodes/{node}/tasks/{upid}/status
    * @param string   $node     The cluster node name.
    * @param string   $upid
  */
  public function tasksStatus($node, $upid)
  {
      return Request::request("/nodes/$node/tasks/$upid/status");
  }
  /**
    * Create backup.
    * POST /api2/json/nodes/{node}/vzdump
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createVzdump($node, $data = array())
  {
      return Request::request("/nodes/$node/vzdump", $data, Request::POST);
  }
  /**
    * Extract configuration from vzdump backup archive
    * GET /api2/json/nodes/{node}/vzdump/extractconfig
    * @param string   $node     The cluster node name.
  */
  public function VzdumpExtractConfig($node)
  {
      return Request::request("/nodes/$node/vzdump/extractconfig");
  }
  /**
    * Get list of appliances.
    * GET /api2/json/nodes/{node}/aplinfo
    * @param string   $node     The cluster node name.
  */
  public function Aplinfo($node)
  {
      return Request::request("/nodes/$node/aplinfo");
  }
  /**
    * Download appliance templates.
    * POST /api2/json/nodes/{node}/aplinfo
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function downloadTemplate($node, $data = array())
  {
      return Request::request("/nodes/$node/aplinfo", $data, Request::POST);
  }
  /**
    * Get list of appliances.
    * GET /api2/json/nodes/{node}/dns
    * @param string   $node     The cluster node name.
  */
  public function Dns($node)
  {
      return Request::request("/nodes/$node/dns");
  }
  /**
    * Write DNS settings.
    * PUT /api2/json/nodes/{node}/dns
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function setDns($node, $data = array())
  {
      return Request::request("/nodes/$node/dns", $data, "PUT");
  }
  /**
    * Execute multiple commands in order
    * POST /api2/json/nodes/{node}/execute
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function Execute($node, $data = array())
  {
      return Request::request("/nodes/$node/execute", $data, Request::POST);
  }
  /**
    * Migrate all VMs and Containers
    * POST /api2/json/nodes/{node}/migrateall
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function MigrateAll($node, $data = array())
  {
      return Request::request("/nodes/$node/migrateall", $data, Request::POST);
  }
  /**
    * Read tap/vm network device interface counters
    * GET /api2/json/nodes/{node}/netstat
    * @param string   $node     The cluster node name.
  */
  public function Netstat($node)
  {
      return Request::request("/nodes/$node/netstat");
  }
  /**
    * Gather various systems information about a node
    * GET /api2/json/nodes/{node}/report
    * @param string   $node     The cluster node name.
  */
  public function Report($node)
  {
      return Request::request("/nodes/$node/report");
  }
  /**
    * Read node RRD statistics (returns PNG)
    * GET /api2/json/nodes/{node}/rrd
    * @param string   $node         The cluster node name.
    * @param string   $ds           The list of datasources you want to display.
    * @param enum     $timeframe    Specify the time frame you are interested in.
  */
  public function Rrd($node, $ds = null, $timeframe = null)
  {
      $optional['ds'] = !empty($ds) ? $ds : null;
      $optional['timeframe'] = !empty($timeframe) ? $timeframe : null;
      return Request::request("/nodes/$node/rrd", $optional);
  }
  /**
    * Read node RRD statistics
    * GET /api2/json/nodes/{node}/rrddata
    * @param string   $node         The cluster node name.
    * @param enum     $timeframe    Specify the time frame you are interested in.
  */
  public function Rrddata($node, $timeframe = null)
  {
      $optional['timeframe'] = !empty($timeframe) ? $timeframe : null;
      return Request::request("/nodes/$node/rrddata", $optional);
  }
  /**
    * Creates a SPICE shell
    * POST /api2/json/nodes/{node}/spiceshell
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function SpiceShell($node, $data = array())
  {
      return Request::request("/nodes/$node/spiceshell", $data, Request::POST);
  }
  /**
    * Start all VMs and containers (when onboot=1)
    * POST /api2/json/nodes/{node}/startall
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function StartAll($node, $data = array())
  {
      return Request::request("/nodes/$node/startall", $data, Request::POST);
  }
  /**
    * Reboot or shutdown a node
    * POST /api2/json/nodes/{node}/status
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function Reboot($node, $data = array())
  {
      return Request::request("/nodes/$node/status", $data, Request::POST);
  }
  /**
    * Stop all VMs and Containers.
    * POST /api2/json/nodes/{node}/stopall
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function StopAll($node, $data = array())
  {
      return Request::request("/nodes/$node/stopall", $data, Request::POST);
  }
  /**
    * Read subscription info.
    * GET /api2/json/nodes/{node}/subscription
    * @param string   $node     The cluster node name.
  */
  public function Subscription($node)
  {
      return Request::request("/nodes/$node/subscription");
  }
  /**
    * Update subscription info.
    * POST /api2/json/nodes/{node}/subscription
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function updateSubscription($node, $data = array())
  {
      return Request::request("/nodes/$node/subscription", $data, Request::POST);
  }
  /**
    * Set subscription key.
    * PUT /api2/json/nodes/{node}/subscription
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function setSubscription($node, $data = array())
  {
      return Request::request("/nodes/$node/subscription", $data, "PUT");
  }
  /**
    * Read system log
    * GET /api2/json/nodes/{node}/syslog
    * @param string   $node     The cluster node name.
    * @param integer  $limit
    * @param integer  $start
    * @param string   $since    Display all log since this date-time string.
    * @param string   $until    Display all log until this date-time string.
  */
  public function Syslog($node, $limit = null, $start = null, $since = null, $until = null)
  {
      $optional['limit'] = !empty($limit) ? $limit : 50;
      $optional['start'] = !empty($start) ? $start : null;
      $optional['since'] = !empty($since) ? $since : null;
      $optional['until'] = !empty($until) ? $until : null;
      return Request::request("/nodes/$node/syslog", $optional);
  }
  /**
    * Read server time and time zone settings.
    * GET /api2/json/nodes/{node}/time
    * @param string   $node     The cluster node name.
  */
  public function Time($node)
  {
      return Request::request("/nodes/$node/time");
  }
  /**
    * PUT time zone.
    * PUT /api2/json/nodes/{node}/time
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function setTime($node, $data = array())
  {
      return Request::request("/nodes/$node/time", $data, "PUT");
  }
  /**
    * API version details
    * GET /api2/json/nodes/{node}/version
    * @param string   $node     The cluster node name.
  */
  public function Version($node)
  {
      return Request::request("/nodes/$node/version");
  }
  /**
    * Creates a VNC Shell proxy.
    * POST /api2/json/nodes/{node}/vncshell
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createVNCShell($node, $data = array())
  {
      return Request::request("/nodes/$node/vncshell", $data, Request::POST);
  }
  /**
    * Opens a weksocket for VNC traffic.
    * GET /api2/json/nodes/{node}/vncwebsocket
    * @param string   $node       The cluster node name.
    * @param integer  $port       Port number returned by previous vncproxy call.
    * @param string   $vncticket  Ticket from previous call to vncproxy.
  */
  public function VNCWebSocket($node, $port = null, $vncticket = null)
  {
      $optional['port'] = !empty($port) ? $port : null;
      $optional['vncticket'] = !empty($vncticket) ? $vncticket : null;
      return Request::request("/nodes/$node/vncwebsocket", $optional);
  }
}
