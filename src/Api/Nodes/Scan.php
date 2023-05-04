<?php

namespace Proxmox\Api\Nodes;

use Proxmox\Support\HasPrefix;

class Scan
{

    use HasPrefix;

    public function __construct()
    {
        $this->setUrl('scan');
    }

    public function list(){
        return $this->request();
    }

    /**
     * is triggered when invoking inaccessible methods in an object context.
     *
     * @param string $name
     * @param array $arguments
     * @return mixed
     * @link https://php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.methods
     */
    public function __call(string $name, array $arguments)
    {
        $scans = [
            'glusterfs',
            'iscsi',
            'lvm',
            'lvmthin',
            'usb',
            'zfs',
        ];

        if (!isset($scans[$name])){
            return null;
        }

        return $this->request($name, $arguments[0] ?? []);
    }


}
