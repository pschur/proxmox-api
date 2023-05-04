<?php

namespace Proxmox;

class Proxmox
{
    public static function api(): \Proxmox\Api\Proxmox
    {
        return new \Proxmox\Api\Proxmox();
    }
}