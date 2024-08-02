<?php

namespace Conkard\Http\Controllers\V1\Auth;

use Conkard\Http\Controllers\Controller;
use Conkard\Http\Resources\UserResource;

class AuthenticatedUserController extends Controller
{
    public function __invoke()
    {
        return UserResource::make(auth()->user());
    }
}
