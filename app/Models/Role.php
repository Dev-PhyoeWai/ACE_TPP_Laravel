<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class Role extends SpatieRole
{
    use HasFactory,HasRoles, HasPermissions;

    protected $fillable = [
        'name',
    ];
}
