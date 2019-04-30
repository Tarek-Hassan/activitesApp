<?php
namespace Modules\ManageUsers\Model\ManageUsers\Repositories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\User as ManageUsers;
use Hash;


class ManageUsersRepository 
{
    /**
     * @var ManageUsers
     */
    private $ManageUsers;
    /**
     * UserRepository constructor.
     * @param ManageUsers $ManageUsers
     */
    public function __construct(ManageUsers $ManageUsers)
    {
        $this->ManageUsers = $ManageUsers;
    }
    /**
     * Return all users
     *
     * @return mixed
     */
   
    public function all()
    {
        return $this->ManageUsers->all();
    }

    public function allData()
    {
        return  $this->ManageUsers->With('schooles')->get();
    }


 
    /**
     * Create a new ManageUsers
     *
     * @param array $ManageUsers
     * @return mixed
     */
    public function create(array $ManageUsers)
    {
        $file=$ManageUsers['avatar'];
        $name = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $filename = $file->store('','public');
        $ManageUsers['avatar']=$filename;
        $ManageUsers['password']= Hash::make($ManageUsers['password']);

        $createdData=$this->ManageUsers->create($ManageUsers);
         return $createdData->schooles()->sync($createdData->id);

    }

    /**
     * Find ManageUsers by id
     *
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {
        return $this->ManageUsers->find($id);
    }

    /**
     * Update ManageUsers with id
     *
     * @param string $id
     * @param array $ManageUsers
     * @return mixed
     */
    public function update(string $id, array $ManageUsers)
    {

        $ManageUsersToUpdate = $this->ManageUsers->find($id);
        $file=$ManageUsers['avatar'];
        $name = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $filename = $file->store('','public');
        $ManageUsersToUpdate['avatar']=$filename;
        $ManageUsersToUpdate->update();
        return $ManageUsersToUpdate->fresh();
    }
    /**
     * Delete ManageUsers with id
     *
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->find($id)->delete();
    }
   
}
