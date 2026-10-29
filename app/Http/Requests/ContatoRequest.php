<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContatoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'empresa' => ['nullable', 'string', 'max:120'],
            'mensagem' => ['required', 'string', 'min:10', 'max:5000'],
            'idioma' => ['required', Rule::in(config('portfolio.idiomas'))],
            // Campo escondido: pessoa nao ve, robo preenche. Validado no controller.
            'site' => ['nullable'],
        ];
    }

    /**
     * O formulario e enviado de uma das versoes do site; as mensagens de erro
     * saem no idioma dela, e nao no do servidor.
     */
    protected function prepareForValidation(): void
    {
        if (in_array($this->input('idioma'), config('portfolio.idiomas'), true)) {
            app()->setLocale($this->input('idioma'));
        }
    }

    public function messages(): array
    {
        return __('site.contato.erros');
    }

    public function attributes(): array
    {
        return __('site.contato.campos');
    }

    /** Volta para o formulario, e nao para o topo da pagina. */
    protected function getRedirectUrl(): string
    {
        return parent::getRedirectUrl().'#contato';
    }
}
