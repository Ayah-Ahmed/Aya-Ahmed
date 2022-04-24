<?php

namespace App\Database\Contract;
//it helps Models to create, read , update, delete
interface Crud
{
    function create();
    function read();
    function update();
    function delete();
}