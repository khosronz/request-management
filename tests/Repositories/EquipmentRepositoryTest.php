<?php namespace Tests\Repositories;

use App\Models\Equipment;
use App\Repositories\EquipmentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EquipmentRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EquipmentRepository
     */
    protected $equipmentRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->equipmentRepo = \App::make(EquipmentRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_equipment()
    {
        $equipment = factory(Equipment::class)->make()->toArray();

        $createdEquipment = $this->equipmentRepo->create($equipment);

        $createdEquipment = $createdEquipment->toArray();
        $this->assertArrayHasKey('id', $createdEquipment);
        $this->assertNotNull($createdEquipment['id'], 'Created Equipment must have id specified');
        $this->assertNotNull(Equipment::find($createdEquipment['id']), 'Equipment with given id must be in DB');
        $this->assertModelData($equipment, $createdEquipment);
    }

    /**
     * @test read
     */
    public function test_read_equipment()
    {
        $equipment = factory(Equipment::class)->create();

        $dbEquipment = $this->equipmentRepo->find($equipment->id);

        $dbEquipment = $dbEquipment->toArray();
        $this->assertModelData($equipment->toArray(), $dbEquipment);
    }

    /**
     * @test update
     */
    public function test_update_equipment()
    {
        $equipment = factory(Equipment::class)->create();
        $fakeEquipment = factory(Equipment::class)->make()->toArray();

        $updatedEquipment = $this->equipmentRepo->update($fakeEquipment, $equipment->id);

        $this->assertModelData($fakeEquipment, $updatedEquipment->toArray());
        $dbEquipment = $this->equipmentRepo->find($equipment->id);
        $this->assertModelData($fakeEquipment, $dbEquipment->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_equipment()
    {
        $equipment = factory(Equipment::class)->create();

        $resp = $this->equipmentRepo->delete($equipment->id);

        $this->assertTrue($resp);
        $this->assertNull(Equipment::find($equipment->id), 'Equipment should not exist in DB');
    }
}
