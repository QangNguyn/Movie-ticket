<?php

namespace App\Http\Requests;

use App\Rules\CheckOverlap;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowtimeRequest extends FormRequest
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
        return [
            'slug' => 'required',
            'movie_id' => 'required|exists:movies,id',
            'room_id' => [
                'required',
                'exists:rooms,id',
                new CheckOverlap($this->room_id, $this->start_time, $this->end_time, $this->route('showtime')->id)
            ],
            'start_time' => [
                'required',
                'after:' . date('Y-m-d H:i')
            ],
            'end_time' => 'required|after:start_time'
        ];
    }
}
