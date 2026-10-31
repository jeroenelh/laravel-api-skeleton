<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

final class HealthCheckTest extends TestCase
{
    public function test_health_endpoint_returns_ok(): void
    {
        $this->get('/up')->assertOk();
    }

    public function test_unknown_route_returns_json(): void
    {
        $this->get('/does-not-exist')->assertNotFound()->assertHeader('Content-Type', 'application/json');
    }
}
