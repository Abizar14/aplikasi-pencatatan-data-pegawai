<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'jabatan' => 'required|string',
            'tanggal_bergabung' => 'nullable|date',
        ];
    }

    /**
     * Pesan validasi kustom (jika diperlukan).
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Nama pegawai harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'jabatan.required' => 'Jabatan harus diisi.',
            'tanggal_bergabung.date' => 'Format tanggal tidak valid.',
        ];
    }
}
