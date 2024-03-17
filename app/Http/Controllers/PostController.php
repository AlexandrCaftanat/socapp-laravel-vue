<?php

namespace App\Http\Controllers;

use App\Http\Requests\Requests\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use PhpParser\Error;

class PostController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data =  $request->validated();

        try {
            \DB::beginTransaction();

            $imageId = $data['image_id'];

            unset($data['image_id']);

            $post = Post::create([
                'title' => $data['title'],
                'content' => $data['content'],
                'user_id' => auth()->id(),
            ]);

            $this->processImage($post, $imageId);
            \DB::commit();
        }catch (\Exception $exception) {
            \DB::rollBack();
            return response()->json(['error' => $exception->getMessage()]);
        }
        return new PostResource($post);
    }


    protected function processImage($post,$imageId){
        if (isset($imageId)) {
            $image = PostImage::find($imageId);
            $image->update([
//                'status' => true,
                'post_id' => $post->id,
            ]);
        }
    }
}
