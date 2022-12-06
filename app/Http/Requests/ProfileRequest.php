<?php declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
{
    public function rules(): array
    {
        if ($this->routeIs('profile.update')) {
            return [
                'name'  => ['string', 'max:255'],
                'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            ];
        }
        if ($this->routeIs('profile.delete')) {
            return ['password' => ['required', 'current-password']];
        }

        return [];
    }
}
