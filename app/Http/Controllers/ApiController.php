  <?php

namespace App\Http\Controllers;

class ApiController extends Controller
{
    const STATUS_OK     = 200;
    const STATUS_FAILED = 500;

    protected function response($status, $data, $ext)
    {    
        return response()->json([
            'status' => $status,
            'data'   => (array) $data,
            'ext'    => $ext    
        ]);
    }

    protected function success($data = [], $ext = [])
    {
        return $this->response(self::STATUS_OK, $data, $ext);
    }

    protected function failed($data = [], $ext = [])
    {
        return $this->response(self::STATUS_FAILED, $data, $ext);
    }
}
