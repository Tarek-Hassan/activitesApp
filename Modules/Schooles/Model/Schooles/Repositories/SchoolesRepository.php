<?php
namespace Modules\Schooles\Model\Schooles\Repositories;
use Modules\Schooles\Model\Schooles\Schooles;


class SchoolesRepository 
{
    /**
     * @var Schooles
     */
    private $Schooles;
    /**
     * UserRepository constructor.
     * @param Schooles $Schooles
     */
    public function __construct(Schooles $Schooles)
    {
        $this->Schooles = $Schooles;
    }
    /**
     * Return all users
     *
     * @return mixed
     */
   
    public function all()
    {
        return $this->Schooles->all();
    }

    public function allData()
    {
        // dd( $this->Schooles->With('countries')->get());
        return  $this->Schooles->With(['countries','stages','users',])->get();
    }


 
    /**
     * Create a new Schooles
     *
     * @param array $Schooles
     * @return mixed
     */
    public function create(array $Schooles)
    {
       

        $Schooles['stage_id']=implode(',', $Schooles['stage_id']);
         $createdData=$this->Schooles->create($Schooles);
         return $createdData->users()->sync($createdData->id);
    }

    /**
     * Find Schooles by id
     *
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {
        $editData=$this->Schooles->find($id);
        $editData['stage_id']=explode(',',$editData['stage_id']);
        
        return $editData;
    }

    /**
     * Update Schooles with id
     *
     * @param string $id
     * @param array $Schooles
     * @return mixed
     */
    public function update(string $id, array $Schooles)
    {
        $Schooles['stage_id']=implode(',', $Schooles['stage_id']);
        
        $SchoolesToUpdate = $this->Schooles->find($id);
        // dd($SchoolesToUpdate);
        
        $SchoolesToUpdate->update($Schooles);
        return $SchoolesToUpdate->fresh();
    }
    /**
     * Delete Schooles with id
     *
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->find($id)->delete();
    }
   
}
