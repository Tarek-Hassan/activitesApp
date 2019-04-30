<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Validator;
use Modules\Category\Model\Category\Repositories\CategoryRepository;

use Auth;
use App\User; 

class CategoryApiController extends Controller
{
    public $successStatus = 200;
/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */


    private $Category;
    /**
     * UserRepository constructor.
     * @param Category $Category
     */
    public function __construct(CategoryRepository $Category)
    {
        $this->Category = $Category;
    }



    public function all()
    {
        
       
        $Categories= $this->Category->allData();
        return response()->json($Categories);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('category::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //
       
        
        $Categories= $this->Category->create($request->all());

        return response()->json([
            'message' => ' success! ',
            'Category' => $Categories
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        
        $Categories= $this->Category->find($id);
        return response()->json([
            'message' => ' category'.$id,
            'Category' => $Categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('category::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update($id,UpdateCategoryRequest $request )
    {
        //
        
        $Categories= $this->Category->update($id,$request->all());
        return response()->json([
            'message' => ' updated! ',
            'Category' => $Categories
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        
        $this->Category->delete($id);
        return response()->json([
            'message' => 'Successfully deleted !'
        ]);
    }
}
