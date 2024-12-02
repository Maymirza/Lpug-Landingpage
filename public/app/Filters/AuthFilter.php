<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->has('role_id') != true) {
            return redirect()->to('/auth/Home');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->has('role_id') == true) {
            if (session()->get('role_id') == 1) {
                return redirect()->to('/admin/dashboard');
            }
        }
        // Do something here
    }
}
