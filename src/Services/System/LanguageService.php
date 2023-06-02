<?php

namespace Oukuyun\Admin\Services\System;

use Oukuyun\Admin\Models\System\Language;

/**
 * Class LanguageService.
 */
class LanguageService
{
    /** 
     * \App\Repositories\System\LanguageRepository
     * @access protected
     * @var LanguageRepository
     * @version 1.0
     * @author Henry
    **/
    protected $LanguageRepository;

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(Language $Language)
    {
        $this->LanguageRepository = $Language;
    }
    
    /**
     * 取得語系
     * @param string $lang
     * @param string $name
     * @param array|object|string|int $value
     * @return boolean
     * @author Henry
    **/
    public function getLanguages() {
        return $this->LanguageRepository->where(['status' => 1])->get();
    }
}