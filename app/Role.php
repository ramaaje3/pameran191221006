<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as ModelsRole;
use Illuminate\Database\Eloquent\Model;

class Role extends ModelsRole
{
    use HasFactory;

    public const ROLE_ADMIN = 'Admin';
    public const ROLE_OWNER = 'Owner';
}
