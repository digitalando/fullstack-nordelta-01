## Práctica I
## En relación a la base de datos proporcionada, realizar estos ejercicios.
## Utilizaremos estos temas ya vistos: Consultas avanzadas: JOINs | DISTINCT |  Funciones MySQL | Funciones deAgregación | GROUP BY | HAVING

## 1. Mostrar los géneros de las películas (​genres​), ordenados de mayor a menor por su nombre, con referencia a las películas (​movies​) utilizando joins.
## Solicitan que el informe muestre: ​name​ y ​title​.
SELECT
	g.name AS Genre,
    m.title AS Title
FROM
	genres AS g
    JOIN movies AS m ON g.id = m.genre_id
ORDER BY
	Genre;

## 2. Mostrar las películas (​movies​) con sus géneros (​genres​) y los actores (​actors​) que participen en cada una de ellas utilizando joins.
## Solicitan que el informe muestre: ​title​, ​name​, ​first_name​ y ​last_name​.
SELECT
    m.title AS Title,
	g.name AS Genre,
    a.first_name AS 'First name',
    a.last_name AS 'Last name'
FROM
	movies AS m
    JOIN genres AS g ON m.genre_id = g.id
    JOIN actor_movie AS am ON m.id = am.movie_id
    JOIN actors AS a ON a.id = am.actor_id;

## 3. Mostrar los actores (​actors​) y las películas (​movies​) en las que participaron.
## Ordenar por nombre de actor. Mostrar: ​first_name​ y ​title​.
SELECT
    a.first_name AS 'Actor',
    m.title AS Title
FROM
	movies AS m
    JOIN actor_movie AS am ON m.id = am.movie_id
    JOIN actors AS a ON a.id = am.actor_id;

## 4. Mostrar las películas (​movies​) con sus géneros (​genres​) si los posee y los géneros con todas las películas que le corresponden, ambas en una sola consulta, sin ordenamiento.
## Mostrar: ​title​ y ​name​.
SELECT
    m.title AS Title,
	g.name AS Genre
FROM
	movies AS m
    LEFT JOIN genres AS g ON m.genre_id = g.id;

## 5. Mostrar por cada capítulo (episodes) el número de temporada (seasons), el nombre de la serie (series), el género (genres) y la cantidad de actores(actors) que tiene.
SELECT
    ser.title AS Serie,
    gen.name AS Genre,
    sea.number AS 'Season #',
    sea.title AS 'Season',
    epi.number AS 'Episode #',
    epi.title AS Episode,
    COUNT(*) AS 'Actors in episode'
FROM
	episodes AS epi
	JOIN seasons AS sea ON epi.season_id = sea.id
    JOIN series AS ser ON sea.serie_id = ser.id
    JOIN genres AS gen ON ser.genre_id = gen.id
    JOIN actor_episode AS ae ON epi.id = ae.episode_id
    JOIN actors AS act ON ae.actor_id = act.id
GROUP BY
	epi.id
ORDER BY
	Serie,
    'Season #',
    'Episode #';

## 6.Mostrar todos los géneros (genres) y el promedio de rating (rating) de sus películas (movies).
## Considerar solamente las películas con rating mayor a 5.
SELECT
	g.name AS Genre,
    ## COALESCE nos dará el rating promedio o 0 si no hay resultados)
    COALESCE(AVG(m.rating), 0) AS 'Average rating'
FROM
	genres AS g
    LEFT JOIN movies AS m ON m.genre_id = g.id
WHERE
	m.rating > 5
GROUP BY
	g.id;

## 7. Mostrar todas las series (series) y la cantidad de capítulos (episodes) que se emitieron en el 2016 (usar release_date).
SELECT
    ser.title AS Serie,
    COUNT(*) AS 'Episodes'
FROM
	episodes AS epi
	JOIN seasons AS sea ON epi.season_id = sea.id
    JOIN series AS ser ON sea.serie_id = ser.id
WHERE
	YEAR(epi.release_date) = 2016
GROUP BY
	ser.id;

## 8. Mostrar todas las series (series) y la cantidad de capítulos (episodes) que se emitieron en el año actual (usar release_date).

## Ojo que esta consulta no muestra resultados porque no hay episodios para el año actual
SELECT
    ser.title AS Serie,
    COUNT(*) AS 'Episodes'
FROM
	episodes AS epi
	JOIN seasons AS sea ON epi.season_id = sea.id
    JOIN series AS ser ON sea.serie_id = ser.id
WHERE
	YEAR(epi.release_date) = YEAR(NOW())
GROUP BY
	ser.id;
