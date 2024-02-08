<?php

    // Create the general URL of PokeAPI
    $generalUrl = 'https://pokeapi.co/api/v2/pokemon/?';
    $generalUrl .= http_build_query([
        'offset' => 0,
        'limit' => 150,
    ]);
    
    // Creating URL 
    function createUrl($url, $index)
    {
        global $results;

        // Cache info
        $cacheKey = md5($url);
        $cachePath = './cache/'.$cacheKey;
        $cacheUsed = false;

        if(file_exists($cachePath))
        {
            $results[$index] = file_get_contents($cachePath);
            $cacheUsed = true;
        }
        
        else
        {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

            $results[$index] = curl_exec($curl);
            curl_close($curl);

            // Save in cache
            file_put_contents($cachePath, $results[$index]);
        }

        $results[$index] = json_decode($results[$index]);
    };

    function createPokemonUrl($pokemonName, $index)
    {
        global $results;
        $pokemonUrl = 'https://pokeapi.co/api/v2/pokemon/';
        $pokemonUrl .= $pokemonName;

        createUrl($pokemonUrl, $index);
    }

    function createInfoUrl($pokemonName, $index)
    {
        global $results;

        $pokeInfoUrl = "https://pokeapi.co/api/v2/pokemon-species/";
        $pokeInfoUrl .= $pokemonName;
        createUrl($pokeInfoUrl, $index);
    }   

    createUrl($generalUrl, 0);

    // Searching pokemon 

    if($searchedPokemon = !empty($_GET['pokemon'])){
        $searchedPokemon = empty($_GET['pokemon']) ? '' : strtolower($_GET['pokemon']);
        
    }

    // Display pokemon 

    // Error if the $searchedPokemon doesnt exist
    function error(){
        echo 'Pokémon Unknown - ';
    }
    function error2(){
        echo ' ';
    }

    $pokemon = $results[0]->results;

    
?>