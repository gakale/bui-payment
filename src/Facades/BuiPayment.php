<?php

namespace Bui\Payment\Facades;

use Illuminate\Support\Facades\Facade;

class BuiPayment extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'buipayment';
    }
}
