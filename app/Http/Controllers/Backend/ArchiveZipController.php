<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Products;


class ArchiveZipController extends Controller
{
   

    function zip_qr(Request $request,$title)
    {

$zip_file = 'uploads/qrcodes/zipfiles/'.str_replace(' ','_',$title).'_QRs_'.date("Y-m-d").'.zip';
$zip = new \ZipArchive();
$zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

$path = 'uploads/qrcodes/'.$title;
$files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
foreach ($files as $name => $file)
{

    
    // We're skipping all subfolders
    if (!$file->isDir()) {
        $filePath     = $file->getRealPath();

        // extracting filename with substr/strlen
        $relativePath =  substr($filePath, strlen($path) + 1);

        $zip->addFile($filePath, $relativePath);
    }
}
$zip->close();
return response()->download($zip_file);

    }






    function zip_photos(Request $request,$id)
    {


   
$zip_file = 'uploads/products_photos/zipfiles'.$id.'_photos_'.date("Y-m-d").'.zip';
$zip = new \ZipArchive();
$zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

$path = 'uploads/products_photos/'.$id;
$files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
foreach ($files as $name => $file)
{
    // We're skipping all subfolders
    if (!$file->isDir()) {
        $filePath = $file->getRealPath();

    

        // extracting filename with substr/strlen
        $relativePath = $path. substr($filePath, strlen($path) + 1);

        $zip->addFile( $filePath, $relativePath);
    }
}
$zip->close();
return response()->download($zip_file);

    }






}