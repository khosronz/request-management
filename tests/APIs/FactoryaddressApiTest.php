<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Factoryaddress;

class FactoryaddressApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_factoryaddress()
    {
        $factoryaddress = factory(Factoryaddress::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/factoryaddresses', $factoryaddress
        );

        $this->assertApiResponse($factoryaddress);
    }

    /**
     * @test
     */
    public function test_read_factoryaddress()
    {
        $factoryaddress = factory(Factoryaddress::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/factoryaddresses/'.$factoryaddress->id
        );

        $this->assertApiResponse($factoryaddress->toArray());
    }

    /**
     * @test
     */
    public function test_update_factoryaddress()
    {
        $factoryaddress = factory(Factoryaddress::class)->create();
        $editedFactoryaddress = factory(Factoryaddress::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/factoryaddresses/'.$factoryaddress->id,
            $editedFactoryaddress
        );

        $this->assertApiResponse($editedFactoryaddress);
    }

    /**
     * @test
     */
    public function test_delete_factoryaddress()
    {
        $factoryaddress = factory(Factoryaddress::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/factoryaddresses/'.$factoryaddress->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/factoryaddresses/'.$factoryaddress->id
        );

        $this->response->assertStatus(404);
    }
}
