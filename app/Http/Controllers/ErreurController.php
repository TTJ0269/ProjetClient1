<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErreurController extends Controller
{
    public function erreur()
    {
        try
        {
          return view('Erreurs.erreur');
        }
        catch(\Exception $exception)
        {
           return $exception->getMessage();
        }
    }
}
