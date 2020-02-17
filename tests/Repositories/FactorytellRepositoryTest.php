<?php namespace Tests\Repositories;

use App\Models\Factorytell;
use App\Repositories\FactorytellRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FactorytellRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FactorytellRepository
     */
    protected $factorytellRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->factorytellRepo = \App::make(FactorytellRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_factorytell()
    {
        $factorytell = factory(Factorytell::class)->make()->toArray();

        $createdFactorytell = $this->factorytellRepo->create($factorytell);

        $createdFactorytell = $createdFactorytell->toArray();
        $this->assertArrayHasKey('id', $createdFactorytell);
        $this->assertNotNull($createdFactorytell['id'], 'Created Factorytell must have id specified');
        $this->assertNotNull(Factorytell::find($createdFactorytell['id']), 'Factorytell with given id must be in DB');
        $this->assertModelData($factorytell, $createdFactorytell);
    }

    /**
     * @test read
     */
    public function test_read_factorytell()
    {
        $factorytell = factory(Factorytell::class)->create();

        $dbFactorytell = $this->factorytellRepo->find($factorytell->id);

        $dbFactorytell = $dbFactorytell->toArray();
        $this->assertModelData($factorytell->toArray(), $dbFactorytell);
    }

    /**
     * @test update
     */
    public function test_update_factorytell()
    {
        $factorytell = factory(Factorytell::class)->create();
        $fakeFactorytell = factory(Factorytell::class)->make()->toArray();

        $updatedFactorytell = $this->factorytellRepo->update($fakeFactorytell, $factorytell->id);

        $this->assertModelData($fakeFactorytell, $updatedFactorytell->toArray());
        $dbFactorytell = $this->factorytellRepo->find($factorytell->id);
        $this->assertModelData($fakeFactorytell, $dbFactorytell->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_factorytell()
    {
        $factorytell = factory(Factorytell::class)->create();

        $resp = $this->factorytellRepo->delete($factorytell->id);

        $this->assertTrue($resp);
        $this->assertNull(Factorytell::find($factorytell->id), 'Factorytell should not exist in DB');
    }
}
