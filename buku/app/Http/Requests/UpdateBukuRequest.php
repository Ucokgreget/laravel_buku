<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBukuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nama_buku" => ["required", "string", "max:255"],
            "penulis_id" => ["required", "exists:penulis,id"],
            "tahun_terbit" => ["required", "integer"],
            "kota_terbit" => ["required", "string", "max:255"],
            "sinopsis" => ["required", "string"],
            "cover_buku" => ["nullable", "image", "max:2048"],
            "kategori_ids" => ["required", "array"],
            "kategori_ids.*" => ["exists:kategori,id"],
        ];
    }
}
