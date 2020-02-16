<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Equipment;

class EquipmentApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_equipment()
    {
        $equipment = factory(Equipment::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/equipment', $equipment
        );

        $this->assertApiResponse($equipment);
    }

    /**
     * @test
     */
    public function test_read_equipment()
    {
        $equipment = factory(Equipment::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/equipment/'.$equipment->id
        );

        $this->assertApiResponse($equipment->toArray());
    }

    /**
     * @test
     */
    public function test_update_equipment()
    {
        $equipment = factory(Equipment::class)->create();
        $editedEquipment = factory(Equipment::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/equipment/'.$equipment->id,
            $editedEquipment
        );

        $this->assertApiResponse($editedEquipment);
    }

    /**
     * @test
     */
    public function test_delete_equipment()
    {
        $equipment = factory(Equipment::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/equipment/'.$equipment->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/equipment/'.$equipment->id
        );

        $this->response->assertStatus(404);
    }
}
