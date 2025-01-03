<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => $this->user,
            'category' => $this->category,
            'city' => $this->city,
            'district' => $this->district,
            'package' => $this->package,
            'gender' => $this->gender,
            'work_type' => $this->workType,
            'title' => $this->title,
            'description' => $this->description,
            'slug' => $this->slug,
            'fee' => $this->fee,
            'phone' => $this->phone,
            'theme' => $this->theme,
            'level' => $this->level,
            'has_contract' => $this->has_contract,
            'media' => count( $this->getMedia('images')) < 0 ? [$this->category->default_cover_image] :  $this->getMedia('images')->map(function ($media){
                return $media->getFullUrl();
            }) ,
//            'apply_count' = $this->users()->count(),
            'highlighted_until_at' => $this->highlighted_until_at,
            'published_until_at' => $this->published_until_at,
            'status' => $this->status,
            'view_counter' => $this->view_counter,
            'sleep_after_at' => $this->sleep_after_at,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }

    public function withResponse($request, $response)
    {
        $jsonResponse = json_decode($response->getContent(), true);
        unset($jsonResponse['links'], $jsonResponse['meta']);
        $response->setContent(json_encode($jsonResponse));
    }
}
