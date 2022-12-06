<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChirpRequest extends FormRequest
{
    public function authorize(): bool
    {
        if ($this->routeIs('chirps.update')) {
            return $this->user()->can('update', $this->chirp);
        }
        if ($this->routeIs('chirps.delete')) {
            return $this->user()->can('delete', $this->chirp);
        }

        return true;
    }

    public function rules(): array
    {
        return ['message' => 'required|string|max:255'];
    }
}
