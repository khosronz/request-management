<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Factory;

class FactoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_factory()
    {
        $factory = factory(Factory::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/factories', $factory
        );

        $this->assertApiResponse($factory);
    }

    /**
     * @test
     */
    public function test_read_factory()
    {
        $factory = factory(Factory::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/factories/'.$factory->id
        );

        $this->assertApiResponse($factory->toArray());
    }

    /**
     * @test
     */
    public function test_update_factory()
    {
        $factory = factory(Factory::class)->create();
        $editedFactory = factory(Factory::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/factories/'.$factory->id,
            $editedFactory
        );

        $this->assertApiResponse($editedFactory);
    }

    /**
     * @test
     */
    public function test_delete_factory()
    {
        $factory = factory(Factory::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/factories/'.$factory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/factories/'.$factory->id
        );

        $this->response->assertStatus(404);
    }
}
