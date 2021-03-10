<?php

use App\Models\Result;

function getLotteryCount()
{
    return count(Result::all());
}
