<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Auth;
use inom\Nominee;
use inom\Office;
use inom\Services\Nomination;
use inom\Tree;
use inom\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NominationTest extends TestCase
{

    use DatabaseTransactions;

    public function __construct()
    {
        $this->nomination = new Nomination();

        $this->nominee = [
            'email' => 'test4@test3.com',
            'firstName' => 'first',
            'lastName' => 'last'
        ];

        $this->office = [
            'partisan' => true,
            'office' => 'Vice President of the Future',
            'district' => ['name' => 'Future', 'scope' => 'spaceAndTime'],
            'filingDeadline' => '03/02/2022',
            'nextElection' => '06/02/2022',
            'notes' => 'Short race with no signatures'
        ];
    }


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateNominee()
    {
        $data = [
            'email' => 'test2@test3.com',
            'firstName' => 'first',
            'lastName' => 'last'
        ];

        $return = $this->nomination->createNominee($data);

        $test = Nominee::where('email', 'test2@test3.com');

        $this->assertSame(1, $test->count(), 'one nominee not created.');
        $this->assertInstanceOf(Nominee::class, $return);
    }

    public function testGetExistingNominee()
    {
        $first = Nominee::create($this->nominee);

        $return = $this->nomination->createNominee($this->nominee);

        $this->assertSame($first->id, $return->id, 'Ids of nominees the same');

    }

    public function testCreateOffice()
    {
        $return = $this->nomination->createOffice($this->office);

        $test = Office::where('office', 'Vice President of the Future')->get();

        $this->assertSame(1, $test->count(), 'one office not created.');
        $this->assertInstanceOf(Office::class, $return);
    }

    public function testFindOffice()
    {

        $first = Office::create($this->office);

        $return = $this->nomination->createOffice($this->office);

        $test = Office::where('office', 'Vice President of the Future')->first();

        $this->assertSame($first->id, $test->id, ' office not the same.');
    }

    public function testCreateTree()
    {

        $nominee = Nominee::create($this->nominee);
        $office = Office::create($this->office);

        $tree = [
            'nominee_id' => $nominee->id,
            'office_id' => $office->id,
        ];

        $return = $this->nomination->createTree($nominee->id, $office->id);

        $test = Tree::where('nominee_id', $nominee->id)->get();

        $this->assertSame(1, $test->count(), 'not one tree created');
        $this->assertInstanceOf(Tree::class, $return, 'instance of Tree class');
    }

    public function testCreateNominations()
    {
        $user = User::create(['name' => 'test', 'email' => 'test@test.com']);
        Auth::loginUsingId($user->id);
        $nominee = Nominee::create($this->nominee);
        $office = Office::create($this->office);
        $tree = $this->nomination->createTree($nominee->id, $office->id);
        $return = $this->nomination->createNomination($nominee->id, $tree);

        $test = \inom\Nomination::where('nominee_id', $nominee->id)->where('tree_id', $tree->id)->get();

        $this->assertInstanceOf(\inom\Nomination::class, $return);
        $this->assertSame(1, $test->count());
    }
}
