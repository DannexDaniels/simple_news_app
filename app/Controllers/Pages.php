<?php
/**
 * Created by PhpStorm.
 * User: dannexdaniels
 * Date: 5/3/20
 * Time: 7:04 PM
 */

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{
    public function index(){
        return view('welcome_message');
    }

    public function view($page = 'home'){
        if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        echo view('templates/header', $data);
        echo view('pages/'.$page, $data);
        echo view('templates/footer', $data);

    }

}