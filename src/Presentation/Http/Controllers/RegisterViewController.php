<?php

namespace Src\Presentation\Http\Controllers;

use Illuminate\View\View;
use Src\Common\Interfaces\Laravel\Controller;

class RegisterViewController extends Controller
{
    /**
     * Muestra la vista del Formulario de Registro
     *
     * @return View
     */
    public function __invoke(): View
    {
        return view('auth.register');
    }
}
