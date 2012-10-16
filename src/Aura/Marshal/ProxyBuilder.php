<?php
namespace Aura\Marshal;

class ProxyBuilder
{
    public function newInstance($relation)
    {
        return new Proxy($relation);
    }
}
