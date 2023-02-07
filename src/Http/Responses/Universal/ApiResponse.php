<?php
namespace Oukuyun\Admin\Http\Responses\Universal;

use Oukuyun\Admin\Exceptions\Api\ApiResponseFormatException;
use Illuminate\Http\JsonResponse;

class ApiResponse extends JsonResponse
{
    /** @var array */
    private $responseData = [
        'message'   => 'success',
        'status'    => true,
        'data'      => []
    ];

    /**
     * ApiResponse constructor.
     *
     * @param array $responseData
     * @param integer $status
     * @param array $headers
     * @param integer $options
     *
     * @throws ApiResponseFormatException
     */
    public function __construct(array $responseData = [], int $statusCode = 200, array $headers = [], int $options = 0)
    {
        $this->encodingOptions = $options;

        /* http code >= 300，data 需符合格式 */
        if ($statusCode >= 300) {
            if (!array_key_exists('message', $responseData)) {
                throw new ApiResponseFormatException('message', $statusCode);
            }

            $responseData += [
                'status' => false
            ];
        }

        parent::__construct(array_replace_recursive($this->responseData, $responseData), $statusCode, $headers);
    }

    /**
     * @param array $responseData
     * @param integer $statusCode
     * @param array $headers
     * @param integer options
     * 
     * @return static
     */
    public static function json()
    {
        return new static(...func_get_args());
    }
}