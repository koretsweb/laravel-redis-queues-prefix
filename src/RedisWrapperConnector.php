<?php
declare(strict_types = 1);

namespace AirSlate\RedisWrapper;

use Illuminate\Queue\Connectors\RedisConnector;

class RedisWrapperConnector extends RedisConnector
{
    /**
     * Establish a queue connection.
     *
     * @param  array  $config
     * @return \Illuminate\Contracts\Queue\Queue
     */
    public function connect(array $config)
    {
        $queue = new RedisWrapperQueue(
            $this->redis,
            $config['queue'],
            $config['connection'] ?? $this->connection,
            $config['retry_after'] ?? 60,
            $config['block_for'] ?? null
        );

        $queue->setPrefix($config['prefix']);

        return $queue;
    }
}
