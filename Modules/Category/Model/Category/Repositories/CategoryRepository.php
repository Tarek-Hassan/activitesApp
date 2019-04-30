<?php
namespace Modules\Category\Model\Category\Repositories;
use Modules\Category\Model\Category\Category;
use App\User;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\File;

class CategoryRepository 
{
    /**
     * @var Category
     */
    private $Category;
    /**
     * UserRepository constructor.
     * @param Category $Category
     */
    public function __construct(Category $Category)
    {
        $this->Category = $Category;
    }
    /**
     * Return all users
     *
     * @return mixed
     */
   
    public function all()
    {
        return $this->Category->all();
    }

    public function allData()
    {
        return  $this->Category->With('users')->get();
    }


 
    /**
     * Create a new Category
     *
     * @param array $Category
     * @return mixed
     */
    public function create(array $Category)
    {

        return $this->Category->create($Category);
    }

    /**
     * Find Category by id
     *
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {
        return $this->Category->find($id);
    }

    /**
     * Update Category with id
     *
     * @param string $id
     * @param array $Category
     * @return mixed
     */
    public function update(string $id, array $Category)
    {
       
        $CategoryToUpdate = $this->Category->find($id);
        $CategoryToUpdate->update($Category);
        return $CategoryToUpdate->fresh();
    }
    /**
     * Delete Category with id
     *
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->find($id)->delete();
    }
   
}
