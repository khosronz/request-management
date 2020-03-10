<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Prefactor;

class PrefactorApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_prefactor()
    {
        $prefactor = factory(Prefactor::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/prefactors', $prefactor
        );

        $this->assertApiResponse($prefactor);
    }

    /**
     * @test
     */
    public function test_read_prefactor()
    {
        $prefactor = factory(Prefactor::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/prefactors/'.$prefactor->id
        );

        $this->assertApiResponse($prefactor->toArray());
    }

    /**
     * @test
     */
    public function test_update_prefactor()
    {
        $prefactor = factory(Prefactor::class)->create();
        $editedPrefactor = factory(Prefactor::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/prefactors/'.$prefactor->id,
            $editedPrefactor
        );

        $this->assertApiResponse($editedPrefactor);
    }

    /**
     * @test
     */
    public function test_delete_prefactor()
    {
        $prefactor = factory(Prefactor::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/prefactors/'.$prefactor->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/prefactors/'.$prefactor->id
        );

        $this->response->assertStatus(404);
    }
}
