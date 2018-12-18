<?php

namespace Tests\Feature;

use Tests\TestCase;
use Mockery;

class PhotographsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        // We have no interest in testing Eloquent
        $this->mock = Mockery::mock('Eloquent', 'Photograph');
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testPhotographsList()
    {
        $this->mock
            ->shouldReceive('select')
            ->once();

        $this->app->instance('Photographs', $this->mock);

        $response = $this->call('GET', 'pag');

        $response->assertViewHas('photographs/photographslist', 'pag');
    }

    public function testPhotographEdit()
    {
        $this->mock
            ->shouldReceive('select')
            ->once();

        $this->app->instance('Photographs', $this->mock);

        $response = $this->call('POST', 'photographs');

        $response->assertViewHas('photographedit');
    }

    public function testPhotographDelete()
    {
        $this->app->instance('Photographs', $this->mock);

        $response = $this->call('POST', 'photographs');

        $response->assertViewHas('photographdelete');
    }
}
