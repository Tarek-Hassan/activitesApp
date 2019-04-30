<?php
namespace Modules\Activties\Model\Activties\Repositories;
use Modules\Activties\Model\Activties\Activties;


class ActivtiesRepository 
{
    /**
     * @var Activties
     */
    private $Activties;
    /**
     * UserRepository constructor.
     * @param Activties $Activties
     */
    public function __construct(Activties $Activties)
    {
        $this->Activties = $Activties;
    }
    /**
     * Return all users
     *
     * @return mixed
     */
   
    public function all()
    {
        return $this->Activties->all();
    }

    public function allData()
    {
        return  $this->Activties->With(['users','uploads'])->get();
    }
    public function allApiData()
    {
        return  $this->Activties->withCount('uploads')->get();
    }


 
    /**
     * Create a new Activties
     *
     * @param array $Activties
     * @return mixed
     */
    public function create(array $Activties)
    {

        return $this->Activties->create($Activties);
    }

    /**
     * Find Activties by id
     *
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {
        return $this->Activties->find($id);
    }

    /**
     * Update Activties with id
     *
     * @param string $id
     * @param array $Activties
     * @return mixed
     */
    public function update(string $id, array $Activties)
    {
       
        $ActivtiesToUpdate = $this->Activties->find($id);
        $ActivtiesToUpdate->update($Activties);
        return $ActivtiesToUpdate->fresh();
    }
    /**
     * Delete Activties with id
     *
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->find($id)->delete();
    }
   
}
