<?php

namespace Modules\Uploads\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Uploads\Model\Uploads\Repositories\UploadsRepository;
use Modules\Uploads\Model\Uploads\Requests\StoreUploadsRequest;
use Modules\Uploads\Model\Uploads\Requests\UpdateUploadsRequest;
use DB;
use Auth;
class APIUploadsController extends Controller
{


    private $uploads;
    /**
     * uploadRepository constructor.
     * @param Uploads $Uploads
     */
    public function __construct(UploadsRepository $uploads)
    {
        $this->uploads = $uploads;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $uploads= $this->uploads->allApiData();
        return response()->json($uploads);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreUploadsRequest $request)
    {
        //
        $uploads= $this->uploads->create($request->all());

        return response()->json([
            'message' => ' success! ',
            'upload' => $uploads
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $uploads= $this->uploads->find($id);
        return response()->json($uploads);
    }
    
    public function favourate()
    {
        $uploads= $this->uploads->allFavourateApiData();
        return response()->json($uploads);
    }
  

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */

    // public function like($id)
    // {
    //     $like=DB::table('uploadlikes')->where('upload_id', $id,'and')->where('user_id',auth()->user()->id)->get();
    //     dd($like);
    //     if($like){
    //         $this->uploads->liked($id);
    //                 return response()->json([
    //                     'message' => 'video '.$id.' is liked! ',
    //                 ]);

    //     }
    //     return $this->uploads->deleteliked($id);
    // }

    // public function favourates($id)
    // {
    //     $fav=DB::table('uploadfavourate')->where('upload_id', $id,'and')->where('user_id',auth()->user()->id)->get();
    //     if($fav){
    //         $this->uploads->favourate($id);
    //         return response()->json([
    //             'message' => 'video '.$id.' is favourted! ',
    //         ]);

    //     }
    //     return $this->uploads->deleteFavourate($id);
    // }
   
    
    
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $this->uploads->delete($id);
        return response()->json([
            'message' => 'Successfully deleted !'
        ]);
    }
    
}
