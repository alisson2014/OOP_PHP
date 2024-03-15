<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Service;

use IntegratedAirlines\Service\Model\Cliente\Endereco;

final class ViaCep
{
    public static function get(string $cep, bool $hydrate = true): null|Endereco|array
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://viacep.com.br/ws/{$cep}/json/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        $res = json_decode($response, true);

        if(!isset($res["cep"])) {
            return null;
        }

        if(!$hydrate) {
            return $res;
        }

        return new Endereco(
            $res["cep"], 
            $res["logradouro"],
            $res["bairro"], 
            $res["localidade"],
            $res["uf"]
        );
    }
}
