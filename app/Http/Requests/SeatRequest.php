<?php

namespace App\Http\Requests;

use App\Rules\UniqueSeat;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SeatRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // dd($this->route('room'));
        return [
            'column' => [
                'required',
                'integer',
                Rule::unique('seats')->where(function ($query) {
                    return $query->where('room_id', $this->route('room')->id)
                        ->where('row', $this->row)
                        ->where('column', $this->column);
                })->ignore($this->route('seat'))
            ],
            'row' => [
                'required',
                'integer',
                Rule::unique('seats')->where(function ($query) {
                    return $query->where('room_id', $this->route('room')->id)
                        ->where('row', $this->row)
                        ->where('column', $this->column);
                })->ignore($this->route('seat'))
            ],
        ];
    }
}