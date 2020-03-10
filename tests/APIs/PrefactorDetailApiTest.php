<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PrefactorDetail;

class PrefactorDetailApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_prefactor_detail()
    {
        $prefactorDetail = factory(PrefactorDetail::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/prefactor_details', $prefactorDetail
        );

        $this->assertApiResponse($prefactorDetail);
    }

    /**
     * @test
     */
    public function test_read_prefactor_detail()
    {
        $prefactorDetail = factory(PrefactorDetail::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/prefactor_details/'.$prefactorDetail->id
        );

        $this->assertApiResponse($prefactorDetail->toArray());
    }

    /**
     * @test
     */
    public function test_update_prefactor_detail()
    {
        $prefactorDetail = factory(PrefactorDetail::class)->create();
        $editedPrefactorDetail = factory(PrefactorDetail::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/prefactor_details/'.$prefactorDetail->id,
            $editedPrefactorDetail
        );

        $this->assertApiResponse($editedPrefactorDetail);
    }

    /**
     * @test
     */
    public function test_delete_prefactor_detail()
    {
        $prefactorDetail = factory(PrefactorDetail::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/prefactor_details/'.$prefactorDetail->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/prefactor_details/'.$prefactorDetail->id
        );

        $this->response->assertStatus(404);
    }
}
