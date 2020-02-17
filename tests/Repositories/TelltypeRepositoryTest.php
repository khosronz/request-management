<?php namespace Tests\Repositories;

use App\Models\Telltype;
use App\Repositories\TelltypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TelltypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TelltypeRepository
     */
    protected $telltypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->telltypeRepo = \App::make(TelltypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_telltype()
    {
        $telltype = factory(Telltype::class)->make()->toArray();

        $createdTelltype = $this->telltypeRepo->create($telltype);

        $createdTelltype = $createdTelltype->toArray();
        $this->assertArrayHasKey('id', $createdTelltype);
        $this->assertNotNull($createdTelltype['id'], 'Created Telltype must have id specified');
        $this->assertNotNull(Telltype::find($createdTelltype['id']), 'Telltype with given id must be in DB');
        $this->assertModelData($telltype, $createdTelltype);
    }

    /**
     * @test read
     */
    public function test_read_telltype()
    {
        $telltype = factory(Telltype::class)->create();

        $dbTelltype = $this->telltypeRepo->find($telltype->id);

        $dbTelltype = $dbTelltype->toArray();
        $this->assertModelData($telltype->toArray(), $dbTelltype);
    }

    /**
     * @test update
     */
    public function test_update_telltype()
    {
        $telltype = factory(Telltype::class)->create();
        $fakeTelltype = factory(Telltype::class)->make()->toArray();

        $updatedTelltype = $this->telltypeRepo->update($fakeTelltype, $telltype->id);

        $this->assertModelData($fakeTelltype, $updatedTelltype->toArray());
        $dbTelltype = $this->telltypeRepo->find($telltype->id);
        $this->assertModelData($fakeTelltype, $dbTelltype->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_telltype()
    {
        $telltype = factory(Telltype::class)->create();

        $resp = $this->telltypeRepo->delete($telltype->id);

        $this->assertTrue($resp);
        $this->assertNull(Telltype::find($telltype->id), 'Telltype should not exist in DB');
    }
}
