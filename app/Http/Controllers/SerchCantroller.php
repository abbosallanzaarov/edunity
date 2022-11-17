<?php

namespace App\Http\Controllers;

use App\Models\mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchCantroller extends Controller
{

    public function mentor_search(Request $request){

        if($request->ajax())
        {
         $output = '';
         $query = $request->get('query');
         if($query != '')
         {
          $data = DB::table('mentor')
            ->where('full_name', 'like', '%'.$query.'%')
            ->orWhere('phone', 'like', '%'.$query.'%')
            ->orWhere('salary', 'like', '%'.$query.'%')
            ->orWhere('password', 'like', '%'.$query.'%')
            ->orWhere('email', 'like', '%'.$query.'%')
            ->orderBy('id', 'desc')
            ->get();

         }
         else
         {
          $data = DB::table('mentor')
            ->orderBy('id', 'desc')
            ->get();
         }
         $total_row = $data->count();
         if($total_row > 0)
         {
          foreach($data as $row)
          {
           $output .= '
           <tr>
            <td>'.$row->CustomerName.'</td>
            <td>'.$row->Address.'</td>
            <td>'.$row->City.'</td>
            <td>'.$row->PostalCode.'</td>
            <td>'.$row->Country.'</td>
           </tr>
           ';
          }
         }
         else
         {
          $output = '
          <tr>
           <td align="center" colspan="5">No Data Found</td>
          </tr>
          ';
         }
         $data = array(
          'table_data'  => $output,
          'total_data'  => $total_row
         );

         echo json_encode($data);
        }

    }
}
