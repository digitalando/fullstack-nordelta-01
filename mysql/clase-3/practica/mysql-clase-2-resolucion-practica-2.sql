## Práctica II
## En relación a la base de datos proporcionada, realizar este ejercicio.
## Utilizaremos estos temas ya vistos:SUBQUERIES | EXISTS | SUBQUERIES con INNER JOIN

## 1. Mostrar todos los actores (actors) cuya película favorita contenga la letra “T” (usar favorite_movie_id).
SELECT
	a.first_name,
    a.last_name,
    m.title as 'Favorite movie'
FROM
	actors AS a
    JOIN movies m ON a.favorite_movie_id = m.id AND m.title LIKE '%t%';

## 2. Mostrar todos los actores (actors) y las películas (movies) en las que actúan siempre y cuando la película favorita del actor contenga la letra “T” (usar favorite_movie_id de la tabla actors).

## Select anidado
SELECT
	a.first_name,
    a.last_name,
    fm.title as favorite_movie,
    m.title as movie
FROM
	actors AS a
    JOIN actor_movie am ON a.id = am.actor_id
    JOIN movies m ON am.movie_id = m.id
WHERE
	a.id IN (
		SELECT
			a.id
		FROM
			actors AS a
			JOIN movies m ON a.favorite_movie_id = m.id AND m.title LIKE '%t%'
    );

## Usando un segundo JOIN y un WHERE
SELECT
	a.first_name,
    a.last_name,
    fm.title as favorite_movie,
    m.title as movie
FROM
	actors AS a
    JOIN actor_movie am ON a.id = am.actor_id
    JOIN movies m ON am.movie_id = m.id
    JOIN movies fm ON a.favorite_movie_id = fm.id
WHERE
	fm.title LIKE '%t%';

## 3. Mostrar todos los géneros (genres) que tengan series (series) que se hayan estrenado en el 2013 o posterior (usar release_date).
## No trae resultados porque no hay series que se hayan estrenado en el 2013 o después
SELECT
	g.name
FROM
	genres g
    JOIN series s ON g.id = s.genre_id
WHERE
	YEAR(s.release_date) >= 2013
GROUP BY
	s.id;

## 4. Mostrar las películas (movies) que no sean películas preferidas (usar favorite_movie_id de la tabla actors).
SELECT
	m.id,
	m.title
FROM
	movies m
WHERE
	m.id NOT IN (
		SELECT DISTINCT a.favorite_movie_id FROM actors a WHERE favorite_movie_id IS NOT NULL;
    );

## 5. Mostrar los géneros (genres) que estén en series (series) y en películas(movies).
SELECT DISTINCT
	g.name
FROM
	genres g
	JOIN movies m on g.id = m.genre_id
    JOIN series s on g.id = s.genre_id;

## 6. Mostrar los géneros (genres) que no tengan series.
SELECT
	g.name
FROM
	genres g
WHERE
	NOT EXISTS (
		SELECT * FROM series s WHERE s.genre_id = g.id
    );

SELECT
    g.name
FROM
	genres g
    LEFT JOIN series s on g.id = s.genre_id
    WHERE s.genre_id IS NULL;

SELECT
    g.name
FROM
	genres g
WHERE
	g.id NOT IN (
		SELECT s.genre_id FROM series s
	);

## Para los/as curiosos/as
## https://explainextended.com/2009/09/18/not-in-vs-not-exists-vs-left-join-is-null-mysql/
