<?php

namespace Proxmox\Api\Template;

use Proxmox\Request;
use Proxmox\Support\HasPrefix;

class Actions
{
    use HasPrefix;

    protected $methods = [];

    public function __construct(array $methods = [])
    {
        $this->setUrl('status');

        $this->methods = $methods ?? [
            'resume',
            'shutdown',
            'start',
            'stop',
            'reboot',
            'suspend'
        ];
    }

    public function list(){
        return $this->request();
    }

    public function status(){
        return $this->request('current');
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
        $methods = $this->methods;

        if (!in_array($name, $methods)) throw new \ErrorException("Function $name not found!");

        return $this->request($name, $arguments[0] ?? [], Request::POST);
    }


}
