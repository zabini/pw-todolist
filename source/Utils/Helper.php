<?php

namespace Source\Utils;

use Firebase\JWT\JWT;
use Source\Model\User;

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

    public static function success($message, $data = null)
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

    public static function getAuthUser(): User
    {

        try {

            $jwt = str_replace('Bearer ', '', getallheaders()['Authorization']);

            $authUser = JWT::decode($jwt, JWT_KEY, [JWT_ALG]);

            $user = new User();

            $user = $user->findById($authUser->id);
            if (is_null($user) || !is_null($user->fail())) {
                self::warning('JWT not valid, you need to authenticate.');
            }

            return $user;
        } catch (\Throwable $th) {
            self::warning('JWT not valid, you need to authenticate.');
        }
    }
}
