<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LayananRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'aktif' => $this->has('aktif') ? true : false,
        ]);
    }

    public function rules(): array
    {
        return [
            'icon'        => ['required', 'string', 'max:100'],
            'judul'       => ['required', 'string', 'max:255'],
            'dasar_hukum' => ['nullable', 'string', 'max:255'],
            'deskripsi'   => ['required', 'string'],
            'rincian'     => ['nullable', 'string'],
            'urutan'      => ['nullable', 'integer', 'min:0'],
            'aktif'       => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'icon.required'      => 'Icon wajib diisi.',
            'judul.required'     => 'Judul layanan wajib diisi.',
            'judul.max'          => 'Judul maksimal 255 karakter.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'urutan.integer'     => 'Urutan harus berupa angka.',
            'urutan.min'         => 'Urutan minimal 0.',
        ];
    }
}
