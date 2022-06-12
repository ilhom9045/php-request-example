<?php

interface RequestHeader
{
    function addHeader($header);

    function addHeaderWithValue($name, $value);
}