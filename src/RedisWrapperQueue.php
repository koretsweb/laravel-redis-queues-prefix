<?php
declare(strict_types = 1);

namespace AirSlate\RedisWrapper;

use Illuminate\Queue\RedisQueue;

class RedisWrapperQueue extends RedisQueue
{
    protected const DEFAULT_PREFIX = 'queues';

    /**
     * @var string
     */
    protected $prefix;

    public function setPrefix(string $prefix): void
    {
        $this->prefix = $prefix;
    }

    public function getPrefix(): string
    {
        return $this->prefix ? $this->prefix : self::DEFAULT_PREFIX;
    }

    /**
     * Get the queue or return the default.
     *
     * @param  string|null  $queue
     * @return string
     */
    public function getQueue($queue): string
    {
        return $this->getPrefix() . ':' . ($queue ?: $this->default);
    }
}
