### Setup

Make sure you have docker installed. Build the image using the following commands

`docker-compose build`
`docker-compose up`

The site should now be accessible at `http://localhost:8080/`

If port `8080` is not available alter the docker compose file to look for an available port.


### Comments

I created an index on the unit name in the Fires table by running

The database was placed directly in the `src` folder

`CREATE INDEX idx_unit_name ON Fires(NWCG_REPORTING_UNIT_NAME);`

To achieve this I cd into the `src` folder and run `sqlite3 database.sqlite`

This means I can now actually load the data and not have my computer kill itself trying.


## File Structure

Im not the greatest fan of the file structure, ideally I'd have had a pages directory with multiple sub directories, but given the time constraints I opted to just throw the two pages in the base
directory and go with it. I also opted not to install composer or an autoloader and just load the files manually in the controllers. Again this was just for time as I wanted to get as close to an 
hour as possible and playing with docker and composer was going to eat into that signifcantly. 

## Models 

I built a pretty basic baseModel to give all my models access to the same basic functions, again with more time id have really fleshed this out and made it far more universal, but I just went with it.

Preferably I would build out some static functions like `model::get($params)` from the baseModel and go from there. Obviously im using raw sql statements which i'd have liked a wrapper around as well, 
but for the purposes of fetching data it worked okay.

## Pagination

I just did some reaaaaaaally basic pagination with a page url param and an limit / offset controlled by a select box. Preferrably I'd have used an SPA or something to make the page never actually reload and cached the data to make loading quicker. I'd also have added a next / prev button but I ran out of time.

## Theme

Due to time I just went with a single, really basic css file. In a larger project i'd use SCSS and split them out into a file structure that makes sense ( Components, Typography, Pages, Utilities, Mixins) etc
I didn't actually get to write and JS but it wasn't overly necessary.

## Page Layout

Ideally I'd have used a slightly nicer way of loading pages, with a template file with a head and footer component seperated out and the page itself included into the template, but I felt that at the core of the exercise
it was more about the data fetching and displaying, so i opted to spend more of my time on that.