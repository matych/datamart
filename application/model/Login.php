<?php
/**
 * Created by PhpStorm.
 * User: Zdenek
 * Date: 21. 5. 2016
 * Time: 22:51
 */

namespace application\model;


class Login {

    public static function loginUser($data) {
        $query = \dibi::select('*')
            ->from('user')
            ->where('mail = %s', $data['mail'])
            ->and('password = %s', md5($data['password']));

        return $query->fetchAll();
    }

}