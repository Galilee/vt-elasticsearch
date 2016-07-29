
## Elasticsearch

![Présentation elasticsearch](http://blog.overnetcity.com/wp-content/uploads/2014/03/elasticsearch1.png)

## Lancer le container elastisearch
docker-compose up

## Vérifier la lancement d'elasticsearch
curl 'http://localhost:9200/?pretty'

## Installer le client php elastica via composer
composer install

## Lancer le script d'indexation de données
php src/index.php

## Rechercher !
curl -XPOST 'http://localhost:9200/pokemon-world/pokemon/_search' -d '{
            "query": {
                "query_string": {
                    "query": "Bulbasaur"
                }
            }
        }'