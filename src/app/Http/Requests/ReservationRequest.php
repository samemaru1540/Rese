<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|date',  // 今日以降の日付のみ許可
            'time' => 'required',
            'number' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
        'date.required' => '予約する日付を選択してください',
        'time.required'=> '予約する時間を選択してください',
        'number.required' => '人数を選択してください',
        'number.min:1' => '一人以上で入力してください',
        ];
    }
}
