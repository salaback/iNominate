<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 3/9/17
 * Time: 3:27 PM
 */

namespace inom\Services;


use Illuminate\Support\Facades\Auth;
use inom\Nominee;
use inom\Office;
use inom\Tree;

class Nomination
{
    public function nominate($data)
    {
        // get nominee ID
        $nominee = $this->createNominee($data);

        // get office ID
        $office = $this->createOffice($data);

        // get tree ID
        $tree = $this->createTree($nominee->id, $office->id);

        // create nomination
        $nomination = $this->createNomination($nominee->id, $tree);

        // return nomination

        return $nomination;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function createNominee($data)
    {
        $nominee = Nominee::firstOrNew([
            'email' => $data['email']
        ]);

        if(!$nominee->exists)
        {
            $nominee->firstName = $data['firstName'];
            $nominee->lastName = $data['lastName'];
            $nominee->save();
        }

        return $nominee;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function createOffice($data)
    {
        $office = Office::where('office', $data['office'])
            ->where('district->name', $data['district']['name'])
            ->where('district->scope', $data['district']['scope'])
            ->first();

        if($office == null)
        {
            $office = Office::create($data);
        }

        return $office;
    }

    /**
     * @param $nominee_id
     * @param $office_id
     * @return mixed
     */
    public function createTree($nominee_id, $office_id)
    {
        $tree = Tree::firstOrCreate(['nominee_id' => $nominee_id, 'office_id' => $office_id]);
        $tree->depth += 1;
        $tree->save();

        return $tree;
    }

    public function createNomination($nominee_id, $tree)
    {
        return \inom\Nomination::create([
            'nominee_id' => $nominee_id,
            'tree_id' => $tree->id,
            'depth' => $tree->depth,
            'user_id' => Auth::Id()
        ]);
    }
}