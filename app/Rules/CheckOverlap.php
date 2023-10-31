<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class CheckOverlap implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    protected $room_id;
    protected $start_time;
    protected $end_time;
    protected $ignore_id;

    public function __construct($room_id, $start_time, $end_time, $ignore_id = null)
    {
        $this->room_id = $room_id;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->ignore_id = $ignore_id;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $overlap = DB::table('showtimes')
            ->where('room_id', $this->room_id)
            ->where('id', '!=', $this->ignore_id)
            ->where(function ($query) {
                $query->where(function ($query) {
                    $query->where('start_time', '<=', $this->start_time)
                        ->where('end_time', '>', $this->start_time);
                })->orWhere(function ($query) {
                    $query->where('start_time', '<', $this->end_time)
                        ->where('end_time', '>=', $this->end_time);
                });
            })->exists();
        if ($overlap) {
            $fail('The showtime is overlapping with another showtime.');
        }
    }
}
