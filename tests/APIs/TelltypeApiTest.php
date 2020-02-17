<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Telltype;

class TelltypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_telltype()
    {
        $telltype = factory(Telltype::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/telltypes', $telltype
        );

        $this->assertApiResponse($telltype);
    }

    /**
     * @test
     */
    public function test_read_telltype()
    {
        $telltype = factory(Telltype::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/telltypes/'.$telltype->id
        );

        $this->assertApiResponse($telltype->toArray());
    }

    /**
     * @test
     */
    public function test_update_telltype()
    {
        $telltype = factory(Telltype::class)->create();
        $editedTelltype = factory(Telltype::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/telltypes/'.$telltype->id,
            $editedTelltype
        );

        $this->assertApiResponse($editedTelltype);
    }

    /**
     * @test
     */
    public function test_delete_telltype()
    {
        $telltype = factory(Telltype::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/telltypes/'.$telltype->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/telltypes/'.$telltype->id
        );

        $this->response->assertStatus(404);
    }
}
