<?php

namespace App\Repositories;

use App\Interfaces\PatientAuthInterface;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class PatientAuthRepository implements PatientAuthInterface
{
    public function storePatient($request) {
        return User::create($request);
    }

    public function findByEmail($email) {
        return User::where('email', $email)->first();
    }

    public function updatePassword($email, $password)
    {
        Log::info("Tentando atualizar senha para: $email");
    
        $user = User::where('email', $email)->first();

        if (!$user) {
            \Log::error("Usuário não encontrado para email: $email");
            return false;
        }

        \Log::info("Usuário encontrado. ID: {$user->id}");
        
        $user->password = Hash::make($password);
        $saved = $user->save();
        
        \Log::info("Resultado do save(): " . ($saved ? 'true' : 'false'));
        
        if (!$saved) {
            \Log::error("Erros ao salvar: " . json_encode($user->getErrors()));
        }
        
        return $saved;
    }
}
