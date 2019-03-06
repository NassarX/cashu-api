<?php
/**
 * Created by PhpStorm.
 * User: nassar
 * Date: 3/6/19
 * Time: 1:07 PM
 */

namespace App\Util;

class CashURequestHeader
{
    public function uuid()
    {
        return headerUUID();
    }



}