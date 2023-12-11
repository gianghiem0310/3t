<?php

namespace App\Http\Controllers;

use App\Models\VideoReview;
use Illuminate\Http\Request;
use League\CommonMark\Exception\IOException;
use Spatie\FlareClient\Http\Exceptions\InvalidData;

class VideoReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(VideoReview $videoReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VideoReview $videoReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VideoReview $videoReview)
    {
        //
    }
    public function uploadVideo(Request $request) {
               
        if(file_exists($request->file))
        {
            $file = $request->file;
            if($file->getMimeType()=="video/mp4"){
                $video =  VideoReview::where("idPhong","=",$request->idPhong)->get();
                if(count($video)==0){
                    $idPhong = $request->idPhong;
                    $loaiVideo = $request->loaiVideo;
                    $image_name = 'video/' . time() . '-' . 'videoreview' . '.'. $file->extension();
                    if($file->move(public_path('video'), $image_name)!=""){
                        if(VideoReview::create(['idPhong'=>$idPhong,'linkVideo'=>$image_name,'loaiVideo'=>$loaiVideo])){
                            return true;
                        }else{
                            return false;
                        };
                    }
                }else{
                    $video1 = $video->first();
                    $idPhong = $request->idPhong;
                    $loaiVideo = $request->loaiVideo;
                    $image_name = 'video/' . time() . '-' . 'videoreview' . '.'. $file->extension();
                    if($file->move(public_path('video'), $image_name)!=""){
                        if($video1->update(['linkVideo'=>$image_name,'loaiVideo'=>$loaiVideo])){
                            return true;
                        }else{
                            return false;
                        };
                    }
                }
                
            }else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    public function getVideoReview(Request $request){
        $video =  VideoReview::where("idPhong","=",$request->idPhong)->get();
        if(count($video)==0){
            $rong = new VideoReview;
            $rong->id = -1;
            $rong->idPhong = -1;
            $rong->linkVideo="Video_Rong";
            $rong->loai=0;
            return $rong;
        }else{
            return $video->first();
        }
        
        
    }
    public function uploadVideoYoutube(Request $request)  {
        $video =  VideoReview::where("idPhong","=",$request->idPhong)->get();
        if(count($video)==0){
            $idPhong = $request->idPhong;
            $loaiVideo = $request->loaiVideo;
            $linkVideo = $request->linkVideo;
                if(VideoReview::create(['idPhong'=>$idPhong,'linkVideo'=>$linkVideo,'loaiVideo'=>$loaiVideo])){
                    return true;
                }else{
                    return false;
                };
        }else{
            $video1 = $video->first();
            $idPhong = $request->idPhong;
            $loaiVideo = $request->loaiVideo;
            $linkVideo = $request->linkVideo;
                if($video1->update(['linkVideo'=>$linkVideo,'loaiVideo'=>$loaiVideo])){
                    return true;
                }else{
                    return false;
                };
        }
    }
    public function deleteVideoReview(Request $request) {
        return VideoReview::where('idPhong','=',$request->idPhong)->delete();
    }
}
