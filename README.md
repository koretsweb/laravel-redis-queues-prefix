This simple package was developed to allow you to specify redis queues prefix for all jobs in one place. 

It is well-known problem for redis driver and it can not be solved with built-in laravel's features.

Installation:

1) `composer require airslate/laravel-redis-queues-prefix`
2) Change queue driver env var in your `.env`/`env.ctmpl` from `redis` to `redis_wrapper`
3) Add new driver's config in `config/queue.php`, `connections` section:
```
      'redis' => [
          ...
      ],
      'redis_wrapper' => [
            'prefix' => str_slug(env('APP_NAME', 'default_app_value'), '_') . '_queues',
            'driver' => 'redis_wrapper',
      ],
```
`prefix` and `driver` are only two keys you need to specify. 
Other redis-related config keys like `retry_after`, `block_for` are taken from `redis`. You can override it in `redis_wrapper` aswell, if needed. 

4) Restart workers. Also you may clean application's cache if changes are not visible

That's all. Enjoy!
