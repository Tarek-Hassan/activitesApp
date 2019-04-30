<?php
namespace Modules\Stages\Model\Stages\Repositories;
use Modules\Stages\Model\Stages\Stages;


class StagesRepository 
{
    /**
     * @var Stages
     */
    private $Stages;
    /**
     * UserRepository constructor.
     * @param Stages $Stages
     */
    public function __construct(Stages $Stages)
    {
        $this->Stages = $Stages;
    }
    /**
     * Return all users
     *
     * @return mixed
     */
   
    public function all()
    {
        return $this->Stages->all();
    }

    public function allData()
    {
        return  $this->Stages->With('users')->get();
    }


 
    /**
     * Create a new Stages
     *
     * @param array $Stages
     * @return mixed
     */
    public function create(array $Stages)
    {

        return $this->Stages->create($Stages);
    }

    /**
     * Find Stages by id
     *
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {
        return $this->Stages->find($id);
    }

    /**
     * Update Stages with id
     *
     * @param string $id
     * @param array $Stages
     * @return mixed
     */
    public function update(string $id, array $Stages)
    {
       
        $StagesToUpdate = $this->Stages->find($id);
        $StagesToUpdate->update($Stages);
        return $StagesToUpdate->fresh();
    }
    /**
     * Delete Stages with id
     *
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->find($id)->delete();
    }
   
}
