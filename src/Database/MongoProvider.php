<?php

class MongoProvider
{
    /**
     * Get mongo client ready to use
     *
     * @param string $server
     * @param array $options
     * @return mixed
     */
    public static function getClient($server, $options)
    {
        $mongoClass = (version_compare(phpversion('mongo'), '1.3.0', '<')) ? '\Mongo' : '\MongoClient';
        return new $mongoClass($server, $options);
    }

}