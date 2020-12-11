<?php

function testenv()
{
    $env_value = config('app.env');
    dd($env_value);
}

function getasset($path)
{
    if (config('app.env') == 'local') {
        return asset($path);
    } else {
        return secure_asset($path);
    }
}