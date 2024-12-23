<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiResource extends JsonResource
{

    public $pesan;
    public $status;
    public $resource;

    public function __construct($resource, $pesan, $status) {
        parent::__construct($resource);
        $this->pesan = $pesan;
        $this->status = $status;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return array (
            "pesan" => $this -> pesan,
            "status" => $this -> status,
            "data" => $this -> resource
        );
    }
}
