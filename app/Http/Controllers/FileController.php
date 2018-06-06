<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Site;

class FileController extends Controller {
    public function importExportExcelORCSV(){
        return view('file_import_export');
    }
    public function importFileIntoDB(Request $request){
        if($request->hasFile('sample_file')){
            $path = $request->file('sample_file')->getRealPath();
            $data = \Excel::load($path)->get();
     
            if($data->count()){
                foreach ($data as $key => $value) {
                    if(($value->site_id)==null){
                        continue;
                    }

                    $arr[] = [
                        'id' => $value->site_id, 
                        'site_name' => $value->site_name, 
                        'thana' => $value->thana,
                        'district' => $value->district, 
                        'service_center' => $value->service_center,
                        'zone' => $value->zone, 
                        'region' => $value->region,
                        'cluster' => $value->cluster, 
                        'distance' => $value->distance,
                        'priority' => $value->priority, 
                        'address' => $value->address,
                        'category' => $value->category, 
                        'longitude' => $value->longitude,
                        'latitude' => $value->latitude, 
                        'type' => $value->type,
                        'location' => $value->location, 
                        'power' => $value->power,
                        'solar' => $value->solar, 
                        'cooling_system' => $value->cooling_system,
                        'dg_status' => $value->dg_status,
                        'backup_power' => $value->backup_power, 
                        'dg_brand' => $value->dg_brand,
                        'dg_kva' => $value->dg_kva, 
                        'battery_backup' => $value->battery_backup,
                        'bbm_plan' => $value->bbm_plan, 
                        'power_authority' => $value->power_authority,
                        'sub_authority' => $value->sub_authority,
                        'approx_site_dc_load' => $value->approx_site_dc_load_kw, 
                        'grid_avaiability_2017_Q1' => $value->grid_availability_y2017q1,
                        'grid_avaiability_2017_Q2' => $value->grid_availability_y2017q2, 
                        'grid_avaiability_2017_Q3' => $value->grid_availability_y2017q3,
                        'grid_avaiability_2017_Q4' => $value->grid_availability_y2017q4, 
                        'grid_avaiability_2017_yearly' => $value->grid_availability_y2017yearly_average

                    
                    ];
                }
                //dd($arr);
                if(!empty($arr)){
                    \DB::table('sites')->insert($arr);
                    return redirect()->route('home')->with('message', 'Site Lists Imported!');
                }
            }
        }
        dd('Request data does not have any files to import.');      
    } 
    public function downloadExcelFile($type){
        $sites = Site::get()->toArray();
        return \Excel::create('siteList:', function($excel) use ($sites) {
            $excel->sheet('sheet name', function($sheet) use ($sites)
            {
                $sheet->fromArray($sites);
            });
        })->download($type);
    }      
}
