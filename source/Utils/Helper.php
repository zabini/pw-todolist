<?php

namespace Source\Utils;

class Helper
{

    public static function error($message)
    {
        self::response($message, 500);
    }

    public static function warning($message, $data = null)
    {
        self::response($message, 400, $data);
    }

    public static function success($message, $data)
    {
        self::response($message, 200, $data);
    }

    private static function response($message, $status, $data = null)
    {

        $ret = [
            'message' => $message,
            'status' => $status,
        ];

        if (!is_null($data)) {
            $ret = array_merge($ret, $data);
        }

        header('Content-Type: application/json');
        echo json_encode($ret, JSON_NUMERIC_CHECK);
        exit;
    }
}
