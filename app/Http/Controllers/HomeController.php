<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\Contact;
use App\Project;


class HomeController extends Controller
{
    public function index()
    {
        $about = About::first();
        // format the skills to an array
        $about->skills = $this->convertToArray($about->skills);
        $contact = Contact::first();
        $projects = Project::all();
        return view('index',compact('about','contact','projects'));
    }






    // Array Formater Functions
    private function convertToArray($text){
        //return $text[0];
        $array = [];
        $basedOn = ',';
        $word = '';
        for($i=0; $i < strlen($text) ; $i++) { // correct thi issue l8r
            if ($text[$i] == $basedOn) {
                
                $array[] = $word;
                $word = '';
                continue;
            }
            $word .= $text[$i];
            if ($i == strlen($text) - 1) {
                $array[] = $word;
                $word = '';
                break;
            }
            
        }
        
        return $array;

        
    }
}
