<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatistikMahasiswaRequest extends FormRequest
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
            'nim'               => ['nullable', 'string', 'max:50'],
            'nama'              => ['required', 'string', 'max:255'],
            'jenis_kelamin'     => ['required', 'in:L,P'],
            'jenis_disabilitas' => ['required', 'string', 'max:100'],
            'fakultas'          => ['required', 'string', 'max:150'],
            'prodi'             => ['required', 'string', 'max:150'],
            'angkatan'          => ['required', 'digits:4', 'integer', 'min:2010', 'max:2030'],
            'status'            => ['required', 'in:Aktif,Lulus,Cuti'],
            'keterangan'        => ['nullable', 'string', 'max:50000'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'nim'               => 'NIM',
            'nama'              => 'Nama Mahasiswa',
            'jenis_kelamin'     => 'Jenis Kelamin',
            'jenis_disabilitas' => 'Jenis Disabilitas',
            'fakultas'          => 'Fakultas',
            'prodi'             => 'Program Studi',
            'angkatan'          => 'Tahun Angkatan',
            'status'            => 'Status Mahasiswa',
            'keterangan'        => 'Keterangan',
        ];
    }
}
