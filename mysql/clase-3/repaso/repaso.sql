## Series y temporadas

SELECT
  sr.title AS serie_title,
  sr.genre_id,
  se.title AS season_title,
  se.number AS season_number,
  se.release_date
FROM
  series AS sr
  INNER JOIN seasons AS se ON sr.id = se.serie_id;


## Series y cantidad de temporadas (> 5)

SELECT
	sr.title AS serie_title,
    sr.genre_id,
    COUNT(sr.id) AS seasons
FROM
	series AS sr
	INNER JOIN seasons AS se ON sr.id = se.serie_id
GROUP BY
	sr.id
HAVING
	COUNT(sr.id) > 5

## Dictinct

SELECT DISTINCT
    a.first_name,
    a.last_name
FROM
	movies m
    JOIN actor_movie am ON m.id = am.movie_id
    JOIN actors a ON am.actor_id = a.id
WHERE
	title
LIKE '%guerra de las galaxias%';

## Select in select
SELECT
	m.title,
    g.name
FROM
	movies m
	JOIN genres g on m.genre_id = m.id
WHERE
	g.id IN (select id from genres where name between 'a' and 'b')


## Concatenación

SELECT
  title,
  CONCAT(YEAR(release_date), ' / ', MONTH(release_date)) AS 'release date'
FROM
  seasons;
