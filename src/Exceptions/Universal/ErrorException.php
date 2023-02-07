<?php

namespace Oukuyun\Admin\Exceptions\Universal;

use Illuminate\Http\Request;
use Oukuyun\Admin\Http\Responses\ApiResponse;

class ErrorException extends BaseException
{
    /** @var array */
    private $data;

    /**
     * @param array[] $data
     * @param string $message
     * @param int $code
     * @param bool $doReport
     */
    public function __construct(array $data = [], string $message = "", int $code = 500, bool $doReport = true)
    {
        $this->setData($data)
            ->setMessage($message)
            ->setCode($code)
            ->doReport($doReport);
    }

    /**
     * @param array[] $data
     * 
     * @return static
     */
    public function setData(array $data = [])
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function render()
    {
        $request = app(Request::class);
        if($request->ajax()) {
            return ApiResponse::json([
                'message' => $this->getMessage()
            ] + $this->getData(), $this->getCode());
        }else{
            return back()->withInput()->withErrors($this->getData()['data']);
        }
    }
}
