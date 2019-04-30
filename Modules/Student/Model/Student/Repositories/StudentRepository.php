<?php
namespace Modules\Student\Model\Student\Repositories;
use Modules\Student\Model\Student\Student;


class StudentRepository 
{
    /**
     * @var Student
     */
    private $Student;
    /**
     * UserRepository constructor.
     * @param Student $Student
     */
    public function __construct(Student $Student)
    {
        $this->Student = $Student;
    }
    /**
     * Return all users
     *
     * @return mixed
     */
   
    public function all()
    {
        return $this->Student->all();
    }

    public function allData()
    {
        return  $this->Student->With(['schooles','countries','cities','stages'])->get();
       
    }


 
    /**
     * Create a new Student
     *
     * @param array $Student
     * @return mixed
     */
    public function create(array $Student)
    {
    return $this->Student->create($Student);
    }

    /**
     * Find Student by id
     *
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {
        return $this->Student->find($id);
    }
    public function findCountry(string $id)
    {
        return $this->Student->where('country_id',$id)->With(['schooles','countries','cities','stages'])->get();
    }

    /**
     * Update Student with id
     *
     * @param string $id
     * @param array $Student
     * @return mixed
     */
    public function update(string $id, array $Student)
    {
       
        $StudentToUpdate = $this->Student->find($id);
        $StudentToUpdate->update($Student);
        return $StudentToUpdate->fresh();
    }
    /**
     * Delete Student with id
     *
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->find($id)->delete();
    }
   
}
