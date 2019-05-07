<?php
declare(strict_types = 1);

namespace AirSlate\RedisWrapper\Providers;

use AirSlate\RedisWrapper\RedisWrapperConnector;
use Illuminate\Queue\QueueManager;
use Illuminate\Support\ServiceProvider;

class RedisQueuesPrefixServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /**
         * @var QueueManager $manager
         */
        $manager = $this->app['queue'];

        $manager->addConnector('redis_wrapper', function () {
            return new RedisWrapperConnector($this->app['redis']);
        });
    }
}
