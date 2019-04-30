<?php
namespace Modules\Uploads\Model\Uploads\Repositories;
use Modules\Uploads\Model\Uploads\Uploads;
use Modules\Uploads\Entities\Liked;
use Modules\Uploads\Entities\Favourate;
use DB;


class UploadsRepository 
{
    /**
     * @var Uploads
     */
    private $Uploads;
    /**
     * UserRepository constructor.
     * @param Uploads $Uploads
     */
    public function __construct(Uploads $Uploads)
    {
        $this->Uploads = $Uploads;
    }
    /**
     * Return all users
     *
     * @return mixed
     */
   
    public function all()
    {
        return $this->Uploads->all();
    }

    public function allData()
    {
        return  $this->Uploads->With(['schooles','likes','favourate'])->get();
    }
    public function allApiData()
    {
        return  $this->Uploads->With(['schooles','activties','users','favourate'])->withCount('likes')->get();
    }
    public function allFavourateApiData()
    {

        $upload=  $this->Uploads->join('uploadfavourate', 'uploads.id', '=', 'uploadfavourate.upload_id')->with(['schooles','activties','users'])->get('uploads.*');
        // $upload = DB::table('uploads')
        // ->join('uploadfavourate', 'uploads.id', '=', 'uploadfavourate.upload_id')
        // ->select('uploads.id','uploads.title','uploads.link')
        // ->get();
        return $upload;
    }



 
    /**
     * Create a new Uploads
     *
     * @param array $Uploads
     * @return mixed
     */
    public function create(array $Uploads)
    {
        
        $Uploads['stage_id']=implode(',', $Uploads['stage_id']);
        $file=$Uploads['link'];
        $name = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $filename = $file->store('movies','public');
        $Uploads['link']=$filename;
        $createdData=$this->Uploads->create($Uploads);
   
         return $createdData;
        
    }

    /**
     * Find Uploads by id
     *
     * @param string $id
     * @return mixed
     */
    public function find(string $id)
    {
         $editData=$this->Uploads->with('users')->find($id);
        $editData['stage_id']=explode(',',$editData['stage_id']);
        return $editData;
    }

    /**
     * Update Uploads with id
     *
     * @param string $id
     * @param array $Uploads
     * @return mixed
     */
    public function update(string $id, array $Uploads)
    {
        $Uploads['stage_id']=implode(',', $Uploads['stage_id']);
        $UploadsToUpdate = $this->Uploads->find($id);
        $file=$Uploads['link'];
        $name = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $filename = $file->store('movies','public');
        $UploadsToUpdate['link']=$filename;
        $UploadsToUpdate->update();
        return $UploadsToUpdate->fresh();
    }
    public function liked(string $id)
    {
        
        Liked::create();
        $UploadsToUpdate = $this->Uploads->find($id);
        $UploadsToUpdate->likes()->sync($UploadsToUpdate->id);
        $UploadsToUpdate->update();
        return $UploadsToUpdate->fresh();
    }
    public function favourate(string $id)
    {
        Favourate::create();
        $UploadsToUpdate = $this->Uploads->find($id);
        $UploadsToUpdate->favourate()->sync($UploadsToUpdate->id);
        $UploadsToUpdate->update();
        return $UploadsToUpdate->fresh();
    }
    public function deleteFavourate(string $id)
    {
        return  DB::table('favourates')->where('id', $id)->delete();
    }
    public function deleteliked(string $id)
    {
        return  DB::table('likeds')->where('id', $id)->delete();
    }
    /**
     * Delete Uploads with id
     *
     * @param string $id
     * @return mixed
     */
   
    public function delete(string $id)
    {
        return $this->find($id)->delete();
    }
   
}
