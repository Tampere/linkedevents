# Linked Events

Linked Events provides categorized data on events and places. The Linked Events project was originally developed for the City of Helsinki.

The Linked Events API for the Tampere region contains data from the Visit Tampere API.

## Further information

To read more about Linked Events, please refer to [https://github.com/6aika/api-linked-events](https://github.com/6aika/api-linked-events).

## Technical details
The system uses a SQLite database to index event data for elastic freetext search. The indexer is set to queue indexing using Redis. To manually create the index, run `php artisan tntsearch:import App\\Event`
Without queued indexing the initial event data import will be super slow. 