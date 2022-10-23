<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Serverinfo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use DB;


class UsersController extends Controller
{
    
    /*function to display data on page load*/
    public function index() 
    {   
      try {
        $Serverinfo_data = Serverinfo::select('*')->get();
        //echo "<pre>"; print_r($Serverinfo_data); die();

        return view('index', compact('Serverinfo_data'));
      
      } catch (\Exception $exception) {

        \Log::error($exception);

        return redirect()->back()->with(['message' => 'There was an error']);
      }
    }
    /*function to display data on page load*/

 
  /*function to display data filter based on storage using AJAX*/
   public function serviceinfo_storage_filter(Request $request){
    try {
    $rangeval=$request->rangeval;

    $server_info_data = DB::select("SELECT * FROM server_info WHERE `hdd` LIKE '%".$rangeval."%'");
    //echo "<pre>"; print_r($server_info_data); die();

    $output_data = '';
    $i=1;
    if(count($server_info_data) > 0){
            foreach ($server_info_data as $row)
            {
            $output_data.='<tr class="even">
                  <td>'.$row->id.'</td>
                  <td>'.$row->model.'</td>
                  <td>' .$row->ram.'</td>
                  <td>' .$row->hdd.'</td>
                  <td>'.$row->location.'</td>
                  <td>'.$row->price.'</td>
                  </tr>';
                $i++;
            }
    }
    else{
      $output_data .= "<tr><td></td><td>Data Not Found</td><td></td><td></td><td></td><td></td></tr>"; 
    }
    //echo $output_data; die();
    return response()->json(['data' => $output_data]);
    
    } catch (\Exception $exception) {

      \Log::error($exception);

      return redirect()->back()->with(['message' => 'There was an error']);
    }

    }
    /*function to display data filter based on storage using AJAX*/

  /*function to display data filter based on ram using AJAX*/
  public function serviceinfo_ram_filter(Request $request){

    $checkboxval=$request->checkboxval;
    //echo "<pre>"; print_r($checkboxval);

    $agen = array();
    foreach ($checkboxval as $val) {
      $agen[] = "ram like '" . $val . "%'"; 
    }
    //print_r($agen); die();

    $server_info_data = DB::select("SELECT * FROM server_info WHERE (".implode(' OR ', $agen) .")");
    //echo "<pre>"; print_r($server_info_data); die();

    $output_data = '';
    $i=1;
    if(count($server_info_data) > 0){
            foreach ($server_info_data as $row)
            {
            $output_data.='<tr class="even">
                  <td>'.$row->id.'</td>
                  <td>'.$row->model.'</td>
                  <td>' .$row->ram.'</td>
                  <td>' .$row->hdd.'</td>
                  <td>'.$row->location.'</td>
                  <td>'.$row->price.'</td>
                  </tr>';
                $i++;
            }
    }
    else{
      $output_data .= "<tr><td></td><td>Data Not Found</td><td></td><td></td><td></td><td></td></tr>"; 
    }
    //echo $output_data; die();

    return response()->json(['data' => $output_data]);
  }
  /*function to display data filter based on ram using AJAX*/

  /*function to display data filter based on harddisk type using AJAX*/
  public function serviceinfo_hdtype_filter(Request $request){
    $hdtype_val=$request->hdtype_val;

    $server_info_data = DB::select("SELECT * FROM server_info WHERE `hdd` LIKE '%".$hdtype_val."%'");
    //echo "<pre>"; print_r($server_info_data); die();

    $output_data = '';
    $i=1;
    if(count($server_info_data) > 0){
            foreach ($server_info_data as $row)
            {
            $output_data.='<tr class="even">
                  <td>'.$row->id.'</td>
                  <td>'.$row->model.'</td>
                  <td>' .$row->ram.'</td>
                  <td>' .$row->hdd.'</td>
                  <td>'.$row->location.'</td>
                  <td>'.$row->price.'</td>
                  </tr>';
                $i++;
            }
    }
    else{
      $output_data .= "<tr><td></td><td>Data Not Found</td><td></td><td></td><td></td><td></td></tr>"; 
    }
    //echo $output_data; die();
    return response()->json(['data' => $output_data]);
    }
    /*function to display data filter based on harddisk type using AJAX*/

    /*function to display data filter based on location using AJAX*/
  public function serviceinfo_location_filter(Request $request){
    $location=$request->location;

    $server_info_data = DB::select("SELECT * FROM server_info WHERE `location` LIKE '%".$location."%'");
    //echo "<pre>"; print_r($server_info_data); die();

    $output_data = '';
    $i=1;
    if(count($server_info_data) > 0){
            foreach ($server_info_data as $row)
            {
            $output_data.='<tr class="even">
                  <td>'.$row->id.'</td>
                  <td>'.$row->model.'</td>
                  <td>' .$row->ram.'</td>
                  <td>' .$row->hdd.'</td>
                  <td>'.$row->location.'</td>
                  <td>'.$row->price.'</td>
                  </tr>';
                $i++;
            }
    }
    else{
      $output_data .= "<tr><td></td><td>Data Not Found</td><td></td><td></td><td></td><td></td></tr>"; 
    }
    //echo $output_data; die();
    return response()->json(['data' => $output_data]);
    }
    /*function to display data filter based on location using AJAX*/

}
