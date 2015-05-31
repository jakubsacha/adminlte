<?php
/**
 * @author jsacha
 * @since 09/05/15 16:05
 */

namespace jakubsacha\adminlte\Http\Controllers;


use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    public function getIndex()
    {
        return view('adminlte::index');
    }
}