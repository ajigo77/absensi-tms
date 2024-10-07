<?php

namespace App\Filament\Auth;

use Filament\Pages\Auth\Login;
use Filament\Forms\Components\TextInput; // Pastikan ini diimpor
use Filament\Forms\Components\Component; // Tambahkan ini jika belum ada
use Illuminate\Validation\ValidationException; // Pastikan ini diimpor

class CustomLogin extends Login
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getLoginFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getRememberFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }
    protected function getLoginFormComponent(): Component
    {
        return TextInput::make('login')
            ->label(__('ID member / Email'))
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }
    protected function getCredentialsFromFormData(array $data): array
    {
        $login_type = filter_var($data['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'id_user';
        return [
            $login_type => $data['login'],
            'password' => $data['password'],
        ];
    }
    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.login' => __('ID member / Email tidak ditemukan'),
        ]);
    }

}