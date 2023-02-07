<?php

namespace Oukuyun\Admin\Exceptions\Universal;

class BadRequestException extends BaseException
{
    /**
     * @param string $message
     * @param integer $code
     * @param bool $doReport
     */
    public function __construct(string $message = '', int $code = 400, bool $doReport = true)
    {
        $this->setMessage($message)
            ->setCode($code)
            ->doReport($doReport);
    }

    /**
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function render()
    {
        return \Oukuyun\Admin\Http\Responses\Universal\ApiResponse::json(
            [
                'message' => $this->getMessage()
            ],
            $this->getCode()
        );
    }
}
