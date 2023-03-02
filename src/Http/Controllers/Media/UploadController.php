<?php

namespace Oukuyun\Admin\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use Spatie\MediaLibrary\MediaCollections\FileAdderFactory;
use Oukuyun\Admin\Http\Responses\Universal\ApiResponse;
use Oukuyun\Admin\Http\Requests\Media\TempUploadRequest;

class UploadController extends Controller
{
    // protected $FileAdderFactory;

    // public function __construct(FileAdderFactory $FileAdderFactory)
    // {
    //     $this->FileAdderFactory = $FileAdderFactory;
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
    public function store(TempUploadRequest $request)
    {
        $temp = auth()->user()->addMedia(request()->file('file'))->toMediaCollection('temp');
        return ApiResponse::json(["data"=>$temp]);
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
        
    }
}
