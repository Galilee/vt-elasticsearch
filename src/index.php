<?php

include(__DIR__.'/../vendor/autoload.php');

$elasticaClient = new \Elastica\Client();

$pokemonWorldIndex = $elasticaClient->getIndex('pokemon-world');

$pokemonWorldIndex->create(
    array(
        'number_of_shards' => 1,
        'number_of_replicas' => 1
    ),
    true // écrase l'index si elle existe
);

$pokemonType = $pokemonWorldIndex->getType('pokemon');

$docs = array();
$data = json_decode(file_get_contents(__DIR__.'/../data.json'), true);
foreach ($data as $pokemon) {
    $docs[] = new \Elastica\Document('', $pokemon);
}

// on index le tout
$pokemonType->addDocuments($docs);