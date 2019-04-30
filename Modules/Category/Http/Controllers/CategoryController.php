<?php

namespace Modules\Category\Http\Controllers;

 
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Category\Model\Category\Repositories\CategoryRepository;
use Modules\Category\Model\Category\Requests\StoreCategoryRequest;
use Modules\Category\Model\Category\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;




class CategoryController extends Controller
{
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


  


    public function index()
    {
        $data=$this->Category->all();
        return view('category::Category.index',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
  
    public function create()
    {
        return view('category::Category.create');
    }

    

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreCategoryRequest $request)
    {
       
        
        // $cover = $request->file('image');
        // dd($cover);
        // $imageName=$cover->getClientOriginalName();
        // $extension = $cover->getClientOriginalExtension();
        // Storage::disk('public')->put($imageName.'.'.$extension,  File::get($cover));
        // dd($request->input('title'));
        $this->Category->create($request->all());
        return redirect('category');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('category::Category.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data=$this->Category->find($id);
        return view('category::Category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
       
        //
        $this->Category->update($id,$request->all());
        return redirect('category');
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
        return redirect('category');
    }
}
