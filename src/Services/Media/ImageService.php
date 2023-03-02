<?php

namespace Oukuyun\Admin\Services\Media;

use Oukuyun\Admin\Models\Media\Image;
use Illuminate\Support\Arr;
use App\Exceptions\Universal\ErrorException;
use MediaUploader;

/**
 * Class ImageService.
 */
class ImageService
{
    /** 
     * \App\Repositories\Member\ImageRepository
     * @access protected
     * @var ImageRepository
     * @version 1.0
     * @author Henry
    **/
    protected $ImageRepository;

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(Image $Image) {
        $this->ImageRepository = $Image;
    }

    /**
     * 圖片列表
     * @param array $data
     * @version 1.0
     * @author Henry
     * @return \DataTables
     */
    public function index() {
        return $this->ImageRepository->listQuery([])->orderby('created_at','desc')->get();
    }

    /**
     * 上傳圖片
     * @param  mixed $parent
     * @return object
     */
    public function upload($image) {
        $media = MediaUploader::fromSource($image)->toDirectory('image_uploads')->upload();
        if (!$media) {
            throw new ErrorException(['error'=>__('admin::Admin.error.uploadFail')],__('admin::Admin.error.uploadFail'),500);
        }
        $media->url = $media->getUrl();
        return $media;
    }
    
    /**
     * 多圖片上傳
     * @param  mixed $images
     * @return void
     */
    public function multipleUpload($images) {
        $medias = [];
        foreach($images as $image) {
            $medias[]   =   $this->upload($image);
        }
        return $medias;
    }
    
    /**
     * 刪除圖片
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id) {
        $model = $this->ImageRepository->find($id);
        $result = $model->delete();
        if(!$result){
            throw new ErrorException([],trans('common.DeleteFail'),500);
        }
        return $model;
    }
}