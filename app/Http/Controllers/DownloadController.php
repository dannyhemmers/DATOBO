<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YoutubeDl\YoutubeDl;
use YoutubeDl\Exception\CopyrightException;
use YoutubeDl\Exception\NotFoundException;
use YoutubeDl\Exception\PrivateVideoException;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\DomainValidator;

class DownloadController extends Controller
{
    /**
     * Download a given Video
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request)
    {

        //URL is required to be passed
        $this->validate($request, [
            'url' => 'required|string|min:3'
        ]);    

        $domainvalidator = new DomainValidator;
        $url = $request->url;
        $domains = array( 'instagram.com', 'twitter.com', 'reddit.com' );
        

        /**
         * Given URL has to be part of the domain whitelist.
         * We don't want users to just use this to download 
         * multiple gigabyte sized Youtube videos
         */
        if($domainvalidator->my_is_valid_domain($url, $domains))
        {
            $timestamp = time();
            $dl = new YoutubeDl([
                'output' => $timestamp . '.%(ext)s',
                'restrict-filenames' => true
            ]);
            
            // Set the download path where you want to store downloaded data
            $dl->setDownloadPath(public_path('videodownloads'));
    
            try {
                $video = $dl->download($url);
                $title = $video->getTitle(); 
                $filename = $video->getFileName();
    
                //Return a JSON object 
                return response()->json([
                    'title' => $title,
                    'filename' => $filename
                ]);  
            } catch (NotFoundException $e) {
                Log::error($e);
            } catch (PrivateVideoException $e) {
                Log::error($e);
            } catch (CopyrightException $e) {
                Log::error($e);
            } catch (\Exception $e) {
                Log::error($e);
            }

        }
        else
        {
            return response()->json(['error' => 'unsupported URL'], 422); 
        }

    }

}
