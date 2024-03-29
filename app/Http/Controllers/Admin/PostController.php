<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\PostContentModel;
use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        //
        $data = $this->data();
        return View("be/post/index",compact('data'));
    }
    public function data(){
        return PostModel::orderBy('id','desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        //
        $data = null;
        return View("be/post/create",compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
        try {
            DB::beginTransaction();
            $datas = $request->all();
            $datas["gambar_unggulan"] = $this->uploadGambarUnggulan($request);
            $savePost = $this->addPost($datas);
            $this->addPostContents($savePost->id, $request->contents);
            DB::commit();

            return redirect(url("admin/post"))->with('message_success', 'Berhasil menambahkan data');
        }catch (\Exception $e){
            DB::rollBack();
            dd($e);
        }
    }

    function uploadGambarUnggulan(PostRequest $request){
        $datas = $request->all();
        $file = $request->file('gambar_unggulan');
        $pathUpload = "uploads/images";
        $fileNameUpload = implode(".",["gambar-unggulan-".$datas["slug"], $file->getClientOriginalExtension()]);
        $file->move($pathUpload,$fileNameUpload);

        return implode("/",[$pathUpload, $fileNameUpload]);
    }

    function penyesuaianDataPost($datas){
        $datas["short_text"] = Str::limit($datas["short_text"],180);
        $datas["title"] = Str::limit($datas["title"],180);
        $datas["slug"] = Str::limit($datas["slug"],180);
        return $datas;
    }

    function addPost($datas){
        $datas = $this->penyesuaianDataPost($datas);
        return PostModel::create($datas);
    }
    function updatePost($id, $datas){
        $model = PostModel::where('id',$id)->first();

        $datas = $this->penyesuaianDataPost($datas);
        if(!array_key_exists('gambar_unggulan',$datas))
            $datas['gambar_unggulan'] = $model->gambar_unggulan;

        return $model->update($datas);
    }

    function addPostContents($post_id,$contents){
        $index = 1;
        foreach ($contents as $row){
            switch ($row["type"]){
                case "text":
                    $this->savePostText($post_id,$index, $row);
                    break;
                default:
                    break;
            }
            $index += 1;
        }
    }

    function savePostText($post_id, $urutan, $content){
        $model = null;
        if(array_key_exists("id",$content)){
            $model = PostContentModel::findOrFail($content["id"]);
        }else{
            $model = new PostContentModel();
            $model->type = $content['type'];
        }
        $model->post_id = $post_id;
        $model->content = $content['data'];
        $model->urutan = $urutan;
        return $model->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id):View
    {
        //
        try {
            $data = PostModel::find($id);
            return View("be/post/edit", compact('data'));
        }catch (\Exception $e){

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        //
        try {
            DB::beginTransaction();
            $datas = $request->all();

            if($request->gambar_unggulan)
                $datas["gambar_unggulan"] = $this->uploadGambarUnggulan($request);

            $this->updatePost($id, $datas);
            $this->addPostContents($id, $request->contents);
            DB::commit();
            return redirect(url("admin/post"))->with('message_success', 'Berhasil memperbaharui data');
        }catch (\Exception $e){
            DB::rollBack();
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
