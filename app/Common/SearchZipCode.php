<?php

declare(strict_types=1);

namespace App\Common;

final class SearchZipCode
{
    public static function search(string $zipCode)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://viacep.com.br/ws/' . $zipCode . '/json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        $decode = json_decode($response, true);

        return isset($decode['cep']) ? $decode : null;
    }
}
