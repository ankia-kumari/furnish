<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function dropZoneFileUpload(Request $request) {

        if ($request->hasFile('file')) {
            return file_upload($request->file('file'),'dropzone');
        }
    }

    // for ckeditor image upload

    public function ckEditorFileUpload(Request $request) {
        $CKEditor = $request->input('CKEditor');
        $funcNum  = $request->input('CKEditorFuncNum');
        $message  = $url = '';

        if ($request->hasFile('upload')) {
            $file_name =  file_upload($request->file('upload'),'ckeditor');
            $url = asset('storage/ckeditor/'.$file_name);
        }

        return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
    }
}
