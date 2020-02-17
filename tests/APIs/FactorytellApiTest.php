<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Factorytell;

class FactorytellApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_factorytell()
    {
        $factorytell = factory(Factorytell::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/factorytells', $factorytell
        );

        $this->assertApiResponse($factorytell);
    }

    /**
     * @test
     */
    public function test_read_factorytell()
    {
        $factorytell = factory(Factorytell::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/factorytells/'.$factorytell->id
        );

        $this->assertApiResponse($factorytell->toArray());
    }

    /**
     * @test
     */
    public function test_update_factorytell()
    {
        $factorytell = factory(Factorytell::class)->create();
        $editedFactorytell = factory(Factorytell::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/factorytells/'.$factorytell->id,
            $editedFactorytell
        );

        $this->assertApiResponse($editedFactorytell);
    }

    /**
     * @test
     */
    public function test_delete_factorytell()
    {
        $factorytell = factory(Factorytell::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/factorytells/'.$factorytell->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/factorytells/'.$factorytell->id
        );

        $this->response->assertStatus(404);
    }
}
