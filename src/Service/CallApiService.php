<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getMoviesData(): array
    {
        $response = $this->httpClient->request(
            'GET',
            'https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=eeaf9f1ca0c902baa964c32961d752d4'
        );

        return $response->toArray();
    }
}