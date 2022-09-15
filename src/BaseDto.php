<?php

declare(strict_types=1);
/**
 * This file is part of zcsimon
.
 */

namespace Zcsimon\BaseDto;

class BaseDto
{
    /**
     * 记录数据.
     */
    private $result;

    /**
     * 返回信息.
     */
    private $msg;

    /**
     * 请求状态code.
     */
    private $code;

    /**
     * 字段错误提示信息.
     */
    private $fieldErrors = [];

    /**
     * 服务器时间戳.
     */
    private $currentTime;

    public function __construct($code, string $msg, $result = null)
    {
        $this->code = $code;
        $this->msg = $msg;
        $this->result = $result;
        $this->currentTime = date('Y-m-d H:i:s');
    }

    /**
     * 设置错误的参数列表.
     */
    public function setFieldErrors(array $fieldErrors)
    {
        $this->fieldErrors = $fieldErrors;
    }

    /**
     * @return null|mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    public function getMsg(): string
    {
        return $this->msg;
    }

    /**
     * 状态码
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    public function getCurrentTime(): string
    {
        return $this->currentTime;
    }

    /**
     * 转数组.
     */
    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'msg' => $this->msg,
            'result' => $this->result,
            'currentTime' => $this->currentTime,
            'fieldErrors' => $this->fieldErrors,
        ];
    }

    /**
     * 转json.
     */
    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE);
    }
}
