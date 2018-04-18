<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use File;
use Intervention\Image\Facades\Image;

class UploadController extends BackendController
{


	protected $uploadPath;
	protected $uploadUrl;


	public function __construct()
	{
	    $this->uploadPath = public_path(config('cms.uploads.directory'));
	    $this->uploadUrl = url('/uploads');
	}


    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($count)
    {
        //return view('backend\dashboard');
        return $count;
    }


    // Check file size
    private function check_file_size($file){

    	$default_file_size = 10485760;

    	if ( isset($file) && $file != null ) {
    		
    		$get_file_size = $file->getClientSize();

    		if( $get_file_size < $default_file_size ){
    			return true;
    		}
    		else{
    			return false;
    		}

    	}
    	else{
    		return false;
    	}

    }


    // Single uploaded file
    public function single_upload_file($value, $thumbnail = false, $thumbnail_name = false){

    	$image_info_all = array();

    	if( is_object($value) ){

    		if( $this->check_file_size($value) ){

    			if ( $this->checkFileMimeTypeImage($value) ) {
    				

    				$successUploaded = $this->upload_file_to_destination($value);

    				if($successUploaded['success']){

    					$fileName = $successUploaded['file_name'];
    					$fileNameDate = $successUploaded['file_name_date'];
    					$fileDatePath = $successUploaded['file_date_path'];

    					if($thumbnail == true && $thumbnail_name == true){
							
						    $width     = config('cms.image.'. $thumbnail_name .'.width');
						    $height    = config('cms.image.'. $thumbnail_name .'.height');
						    $extension = $successUploaded['file_extension'];
						    $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);

						    Image::make($fileDatePath . $fileName)
						        // ->resize(null, $height, function($constraint){
						        // 	$constraint->aspectRatio();
					        	//     $constraint->upsize();
						        // })
						        ->fit($width, $height, function($constraint){
						        	//$constraint->aspectRatio();
					        	    $constraint->upsize();
						        })
						        ->save($fileDatePath . '/' . $thumbnail, 70); // Quality 60

    					}

    					$file_path = "/" . date("Y") . '/' . date("m") . "/";

    					$image_info_all['filename'] = $fileName;
    					$image_info_all['url'] = $fileNameDate;
    					//$image_info_all['url_full'] = $this->uploadUrl . $fileNameDate;
    					$image_info_all['url_full'] = $fileNameDate;
    					//$image_info_all['url_thumb'] = $this->uploadUrl . $file_path . $thumbnail;
    					$image_info_all['url_thumb'] = $file_path . $thumbnail;
    					
    				    return serialize($image_info_all);

    				}



    			}
    			elseif ( $this->checkFileMimeTypeFiles($value) ) {
    				
    				$successUploaded = $this->upload_file_to_destination($value);

    				if($successUploaded['success']){

    					$fileName = $successUploaded['file_name'];
    					$fileNameDate = $successUploaded['file_name_date'];
    					$fileDatePath = $successUploaded['file_date_path'];


    					$file_path = "/" . date("Y") . '/' . date("m") . "/";

    					$image_info_all['filename'] = $fileName;
    					$image_info_all['url'] = $fileNameDate;
    					$image_info_all['url_full'] = $this->uploadUrl . $fileNameDate;
    					//$image_info_all['url_thumb'] = $this->uploadUrl . $file_path . $thumbnail;
    					
    				    return serialize($image_info_all);

    				}

    			}
    			else{
    				return false;
    			}


    		}


    	}

    }



    // File Name With Path
    private function upload_file_to_destination($value){

    	$after_upload_info = array();
    	$destination = $this->uploadPath;

    	if( isset($value) && $value != null ){

    		$file = $value->getClientOriginalName();

    		$extension = $value->getClientOriginalExtension();

    		$file_name_modified = str_replace(' ', '-', strtolower($file));

    		$file_name_modified = preg_replace('/[^A-Za-z0-9\. -]/', '', $file_name_modified);

    		$fileName = time().'_'.$file_name_modified;

    		$file_path = "/" . date("Y") . '/' . date("m") . "/";

    		
    		$fileDatePath = $destination . $file_path;


    		if (! File::exists($fileDatePath)) {
    		    File::makeDirectory($fileDatePath, 0777,true);
    		}

    		$successUploaded = $value->move($fileDatePath, $fileName);

    		$after_upload_info['success'] 		= $successUploaded;
    		$after_upload_info['file_name'] 	= $fileName;
    		$after_upload_info['file_name_date'] = $file_path . $fileName;
    		$after_upload_info['file_extension'] = $extension;
    		$after_upload_info['file_date_path'] = $fileDatePath;

    		return $after_upload_info;

    	}

    }


    // Check Image File Mimie Type for validation
    public function checkFileMimeTypeImage( $filename ){

    	$check_valid_mime_type = false;

    	$all_valid_mime_type = [
    		'image/png', 
    		'image/jpeg', 
    		'image/gif', 
    		'image/bmp',
    		'application/octet-stream',
    	];

    	//$file_mime_type = $filename->getMimeType();
    	$file_mime_type = File::mimeType($filename);

    	$check_valid_mime_type = in_array($file_mime_type,  $all_valid_mime_type);

    	return $check_valid_mime_type;
    }


    // Check Other File Mimie Type for validation
    public function checkFileMimeTypeFiles( $filename ){

    	$check_valid_mime_type = false;

    	$all_valid_mime_type = [
    		'application/pdf',
    		'application/msword',
    		'application/vnd.ms-excel',
    		'application/zip'
    	];

    	//$file_mime_type = $filename->getMimeType();
    	$file_mime_type = File::mimeType($filename);

    	$check_valid_mime_type = in_array($file_mime_type,  $all_valid_mime_type);

    	return $check_valid_mime_type;
    }


    /**
     * Check value to find if it was serialized.
     *
     * If $data is not an string, then returned value will always be false.
     * Serialized data is always a string.
     *
     * @since 2.0.5
     *
     * @param string $data   Value to check to see if was serialized.
     * @param bool   $strict Optional. Whether to be strict about the end of the string. Default true.
     * @return bool False if not serialized and true if it was.
     */
    public function is_serialized( $data, $strict = true ) {
    	// if it isn't a string, it isn't serialized.
    	if ( ! is_string( $data ) ) {
    		return false;
    	}
    	$data = trim( $data );
     	if ( 'N;' == $data ) {
    		return true;
    	}
    	if ( strlen( $data ) < 4 ) {
    		return false;
    	}
    	if ( ':' !== $data[1] ) {
    		return false;
    	}
    	if ( $strict ) {
    		$lastc = substr( $data, -1 );
    		if ( ';' !== $lastc && '}' !== $lastc ) {
    			return false;
    		}
    	} else {
    		$semicolon = strpos( $data, ';' );
    		$brace     = strpos( $data, '}' );
    		// Either ; or } must exist.
    		if ( false === $semicolon && false === $brace )
    			return false;
    		// But neither must be in the first X characters.
    		if ( false !== $semicolon && $semicolon < 3 )
    			return false;
    		if ( false !== $brace && $brace < 4 )
    			return false;
    	}
    	$token = $data[0];
    	switch ( $token ) {
    		case 's' :
    			if ( $strict ) {
    				if ( '"' !== substr( $data, -2, 1 ) ) {
    					return false;
    				}
    			} elseif ( false === strpos( $data, '"' ) ) {
    				return false;
    			}
    			// or else fall through
    		case 'a' :
    		case 'O' :
    			return (bool) preg_match( "/^{$token}:[0-9]+:/s", $data );
    		case 'b' :
    		case 'i' :
    		case 'd' :
    			$end = $strict ? '$' : '';
    			return (bool) preg_match( "/^{$token}:[0-9.E-]+;$end/", $data );
    	}
    	return false;
    }


}
