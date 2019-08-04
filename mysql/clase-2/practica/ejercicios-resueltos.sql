## Práctica 1

## A. Obtener todas las películas (movies) que se realizaron luego del año 2000 (usar release_date).
SELECT * FROM movies WHERE YEAR(release_date) > 2000;

## B. Obtener todas las películas (movies) hechas entre el año 2000 y el año 2010 (release_date).
SELECT * FROM movies WHERE YEAR(release_date) >= 2000 AND YEAR(release_date) <= 2010 ;

## C. Obtener todos los actores (actors) que no se llamen “Mark”.
SELECT * FROM actors WHERE first_name <> "Mark";
SELECT * FROM actors WHERE first_name NOT LIKE "Mark";

## D.Obtener todos los actores (actors) que se llamen “Mark” o “Sam”.
SELECT * FROM actors WHERE first_name = "Mark" OR first_name = "Sam";

## E. Obtener todas las películas (movies) que hayan sido hechas previo alaño 2000 o posterior al año 2009 y además tengan id mayor a 10 (usarrelease_date e id).
SELECT * FROM movies WHERE (release_date < '2000-01-01' OR release_date > '2008-12-31') AND  id > 10;

## F. Obtener todos los actores (actors) ordenados alfabéticamente por nombre y en segundo lugar por su apellido (usar fisrt_name y last_name).
SELECT * FROM actors ORDER BY first_name, last_name;

## G. Obtener todas las películas (movies) ordenadas por la fecha de estreno, desde la más antigua a la más reciente. (usar release_date).
SELECT * FROM movies ORDER BY release_date;

## H. Obtener aquellas películas (movies) hechas en el siglo XXI ordenadas por título (usar release_date y title).
SELECT * FROM movies WHERE YEAR(release_date) >= 2000 ORDER BY title;

## I. Obtener únicamente 3 películas (movies), a partir de la película 7 hechas en el siglo XXI (usar release_date).
SELECT * FROM movies WHERE YEAR(release_date) >= 2000 LIMIT 3 OFFSET 6;

## J. Obtener las películas (movies) hechas entre Octubre 1999 y Diciembre 2004, que muestre las películas más nuevas de primero (usar release_date).
SELECT * FROM movies WHERE release_date >= '1999-10-01' AND release_date <= '2004-12-31' ORDER BY release_date DESC;

## K. Obtener los actores (actors) que el nombre empiece con “HE”’ hastalos que empiezan con “TO”, ordenarlo como desee (usar first_name).
SELECT * FROM actors WHERE first_name BETWEEN 'HE' AND 'TO' ORDER BY first_name;

## L. Obtener las películas (movies) que empiezan con la letra “T”, ordenarlo como desee (usar title).
SELECT * FROM movies WHERE title LIKE 'T%' ORDER BY title;

## M. Obtener las películas (movies) hechas en el mes de Octubre o en el año 1999, ordenar que el año sea el primer ordenamiento y el título de mayor a menor (usar release_date y title).
SELECT * FROM movies WHERE release_date LIKE '%-10-%' OR release_date LIKE '1999-%' ORDER BY YEAR(release_date), title DESC;
SELECT * FROM movies WHERE MONTH(release_date) = 10 OR YEAR(release_date) = 1999 ORDER BY YEAR(release_date), title DESC;

## N.Obtener los actores (actors) que contengan en el apellido "DE" ó "LL" y en el nombre “A”. Ordenarlo como desee (usar first_name y last_name).
SELECT * FROM actors WHERE (last_name LIKE '%de%' OR last_name LIKE '%ll%') AND first_name LIKE '%a%' ORDER BY last_name;

## O. Obtener las películas (movies) que sean de la saga de “Toy Story” y las películas de la saga de “Harry Potter” con duración de 2 horas. Ordenarlas por nombre ascendente y luego por duración descendente (usar title y length).
SELECT * FROM movies WHERE (title LIKE 'Toy Story%' OR title LIKE 'Harry Potter%') AND length >= 120 ORDER BY title, length DESC;

## P. Obtener todas las películas (movies) que tengan de rating “8.3”, “9.1” y“9.0”. Ordenarlas como desee (usar rating).
SELECT * FROM movies WHERE rating IN (8.3, 9.1, 9.0) ORDER BY rating, title;

## Q. Obtener las películas (movies) que no tengan duración de 2 y 2 horas y media. Mostrar en orden ascendente los títulos (usar length y title).
SELECT * FROM movies WHERE length <> 120 AND length <> 180 ORDER BY title;

## R. Obtener los campos “id” como “id_genero”, “name” como “nombre_genero” de la tabla generos (genres). Ordenarlo por nombre_genero de menor a mayor. Podés usar el operador de concatenación || (doble pipes). Para queMySql las pueda usar debes colocar antes de tu sentencia:set sql_mode=PIPES_AS_CONCAT;
SELECT id AS id_genero, name AS nombre_genero FROM genres ORDER BY nombre_genero;

## Práctica 2

## S. Obtener las películas (movies) y sus géneros (genres), ordenado por nombre de pelicula (usar title).
SELECT
	m.title,
    m.rating,
    m.awards,
    m.release_date,
    m.length,
    g.name
FROM
	movies m,
    genres g
WHERE
	m.genre_id = g.id
ORDER BY
	m.title;

## T. Obtener las películas (movies) con sus actores (actors), ordenar por nombre de pelicula y nombre de los actores (usar title y first_name).
SELECT
	m.title,
    a.first_name
FROM
	movies m,
    actor_movie am,
    actors a
WHERE
	am.movie_id = m.id
    AND am.actor_id = a.id
ORDER BY
	m.title,
    a.first_name;

## U. Obtener los actores (actors) y las películas (movies) a las que pertenecieron (usar first_name, last_name y title).
SELECT
    a.first_name,
	m.title
FROM
	actors a,
    actor_movie am,
    movies m
WHERE
	am.movie_id = m.id
    AND am.actor_id = a.id
ORDER BY
    a.first_name;

## V. Obtener la cantidad de temporadas de cada serie. Ordenado por la serie que más temporadas tenga, y luego por título en ordendescendente.
SELECT
	sr.title,
    g.name as genre,
    COUNT(sa.id) AS seasons
FROM
	series AS sr,
    genres AS g,
    seasons AS sa
WHERE
	sr.id = sa.serie_id
    AND sr.genre_id = g.id
GROUP BY
	sr.id
ORDER BY
	seasons DESC,
    sr.title;
