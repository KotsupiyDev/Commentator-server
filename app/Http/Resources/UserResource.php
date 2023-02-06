<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $token = $this->createToken('token')->plainTextToken;

        return [
            'success' => true,
            'result' => [
                'name' => $this->name,
                'email' => $this->email,
                'token' => $token,
            ],
        ];
    }
}
