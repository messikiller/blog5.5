<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function back_error($msg)
    {
        return back()->with('errors', [
            ['type' => 'error', 'desc' => $msg]
        ]);
    }

    protected function back_success($msg)
    {
        return back()->with('errors', [
            ['type' => 'success', 'desc' => $msg]
        ]);
    }
}
