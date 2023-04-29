<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PackagePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    public function allowToShowPackage()
    {
        return auth()->user()->hasPrivilege(VIEW_PACKAGE);
    }

    public function allowToUpsertPackage()
    {
        return auth()->user()->hasPrivilege(UPSERT_PACKAGE);
    }
    
    public function allowToDeletePackage()
    {
        return auth()->user()->hasPrivilege(DELETE_PACKAGE);
    }
}
