<?php

declare(strict_types=1);

namespace IntegratedAirlines\Service\Service;

use IntegratedAirlines\Service\Model\Cliente\{Cidade, Endereco};

final class ViaCep
{
    private const BASE_API_URL = "https://viacep.com.br/ws/";

    public static function get(string $cep, bool $hydrate = true): null|Endereco|array
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => self::BASE_API_URL . "{$cep}/json/",
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
            new Cidade($res["localidade"], $res["uf"])
        );
    }
}
