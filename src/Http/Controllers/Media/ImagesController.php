<?php

namespace Oukuyun\Admin\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use Oukuyun\Admin\Http\Responses\Universal\ApiResponse;
use Oukuyun\Admin\Http\Requests\Media\UploadRequest;
use Oukuyun\Admin\Services\Media\ImageService;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    protected $ImageService;

    public function __construct(ImageService $ImageService)
    {
        $this->ImageService = $ImageService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return ApiResponse::json(["data" => $this->ImageService->index([])]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadRequest $request)
    {
        $image = $this->ImageService->upload($request->file('file'));
        return ApiResponse::json([
            "data"  =>  [
                'image' =>  $image
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->ImageService->delete($id);
        return ApiResponse::json([
            "message"  =>  __('admin::Admin.success.deleteSuccess')
        ]);
    }
}
