## Elastique Assignment

This is my solution to the elastique assignment. The assignment was 
to make an API which would allow the user to obtain authors/publishers and
books.

## Changes to the API
There are some minor and one big change in the API from the example 
provided by elastique.
 
 1. Some names may alter slightly. for example, the reply will return
    firstname and lastname instead of first_name and last_name
 2. I am not a big fan of returning system ID's in API's, as they
    usually provide an easy way to find records that users may or may
    not have access to. So instead of returning the ID, i return a
    UUID
    
## Caching

### Response Caching
I added two "caching" strategies: one is caching the response of GET
requests. Which will perfectly as it is as there is currently no 
access restriction which may interfere with access to data.

### Proxy Caching
Also, because there is no difference in who can see which data, I also
added response headers for reverse proxies (like varnish or nginx), so
they can also cache the data, basically offloading all caching from the
app server to an external proxy server if available.

## Installation
Do a composer install, and make sure you have a proper .env file.
To load the database use:

```bash
php artisan migrate
php artisan db:seed
```

Lastly you will need to make sure you have an algolia account for 
the search index. If you have it installed and set the App ID and
admin key, run:

```bash
php artisan scout:import "App\Models\Book"
```

