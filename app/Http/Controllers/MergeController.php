<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DomainValidator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MergeController extends Controller
{

    /**
     * Gets all images of a multi-image Instagram post
     * and combines them into one single image
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        //URL Parameter has to be sent
        if($request->has('url'))
        {
            //URL Parameter has to be non-empty
            $validatedData = $request->validate([
                'url' => 'required'
            ]);

            //New DomainValidator Object
            $domainvalidator = new DomainValidator;

            $url = $request->url;
            $domains = array( 'instagram.com' );

            //Only continue if url is instagram.com
            if($domainvalidator->my_is_valid_domain($url, $domains))
            {
                //Get JSON Data from Instagram
                $response = Http::get($url . '?__a=1');
                $body = $response->json();

                //Access that part of the response data where the gallery images are stored
                $instaedges = $body['graphql']['shortcode_media']['edge_sidecar_to_children']['edges'];

                //Create Array with size and url of all images
                $imageArray = array();
                foreach($instaedges as $edge)
                {
                    $url = $edge['node']['display_url'];
                    $width = \Image::make($url)->width();
                    $height = \Image::make($url)->height();
                    array_push($imageArray, array($width,$height,$url));
                }

                $finalheight = 0;
                //Add heights of all images
                foreach($imageArray as $row)
                {
                    $finalheight += $row[1];    
                }

                $widthArray = array();
                //Create Array of all image widths
                foreach($imageArray as $row)
                {
                    array_push($widthArray, $row[0]);
                }

                //Maximum width determines width of the final image
                $finalwidth = max($widthArray);
                
                //Create an empty canvas and insert the first image
                $img_canvas = \Image::canvas($finalwidth, $finalheight);
                $img_canvas->insert($imageArray[0][2], 'top', 0, 0);

                //Add all other images
                $i = 0;
                $yoffset = $imageArray[0][1];
                foreach($imageArray as $image)
                {
                    if($i > 0)
                    {
                        $img_canvas->insert($image[2], 'top', 0, $yoffset);
                        $yoffset = $yoffset + $image[1];
                    }                    
                    $i++;
                }

                $filename = time() . '.jpg';
                $img_canvas->save(public_path( 'merged/' . $filename ));
 
            }


            //Return a JSON object 
            return response()->json([
                'filename' => $filename
            ]); 
        }
    }
}
