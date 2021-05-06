<?php

//namespace App\Http\Controllers;

//use Illuminate\Http\Request;

//class departmentList extends Controller
{
    
}

/**

* Show records

*

* @return \Illuminate\Http\Response

*/


public function dropDownShow(Request $request)

{

   $items = Item::pluck('name', 'id');

   $selectedID = 2;

   return view('items.edit', compact('id', 'items'));

}

