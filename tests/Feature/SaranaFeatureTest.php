<?php

namespace Tests\Feature;

use Tests\TestCase;

class SaranaFeatureTest extends TestCase
{
    public function test_admin_sarana_route_exists(): void
    {
        $this->assertTrue(app('router')->has('sarana.index'));
    }
}
