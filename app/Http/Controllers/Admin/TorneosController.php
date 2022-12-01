<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTorneoRequest;
use App\Models\Torneo;
use Illuminate\Http\Request;

class TorneosController extends Controller
{
    public function store(StoreTorneoRequest $request)
    {
        return Torneo::query()->create($request->validated());
    }
}
