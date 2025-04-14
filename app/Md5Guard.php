<?php 
namespace App\Auth;

use Illuminate\Auth\SessionGuard;

class Md5Guard extends SessionGuard
{
    /**
     * Validate a user's credentials.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validate(array $credentials = [])
    {
        $user = $this->provider->retrieveByCredentials($credentials);

        if (! $user) {
            return false;
        }

        $password = $credentials['pass'];
        $hashedPasswordFromDb = $user->pass;

        return MD5($password) === $hashedPasswordFromDb;
    }
}