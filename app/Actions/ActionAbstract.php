<?php

declare(strict_types=1);

namespace App\Actions;

abstract class ActionAbstract
{
    /**
     * @return mixed
     */
    abstract function execute();
}
