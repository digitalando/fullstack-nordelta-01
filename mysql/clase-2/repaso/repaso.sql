USE movies_db;

SELECT * FROM actors;

SELECT * FROM actors WHERE rating > 7;

SELECT * FROM actors WHERE rating > 7 AND rating < 9;

## BETWEEN incluye los valores indicados
SELECT * FROM actors WHERE rating BETWEEN 7 AND 9;

SELECT * FROM actors WHERE rating > 6 ORDER BY rating DESC;

SELECT * FROM actors WHERE rating > 6 ORDER BY rating DESC, last_name;

SELECT id, first_name AS Nombre, last_name AS Apellido, rating as Rating FROM actors WHERE rating > 6 ORDER BY rating DESC, last_name;

SELECT id, first_name AS Nombre, last_name AS Apellido, rating as Rating FROM actors WHERE rating > 6 ORDER BY rating DESC, last_name LIMIT 10;

SELECT id, first_name AS Nombre, last_name AS Apellido, rating as Rating FROM actors WHERE rating > 6 ORDER BY rating DESC, last_name LIMIT 10 OFFSET 10;

SELECT id, CONCAT(first_name, ' ', last_name) AS 'Nombre Completo', rating as Rating FROM actors WHERE rating > 6 ORDER BY rating DESC, last_name LIMIT 10 OFFSET 10;

SELECT first_name, last_name, rating FROM actors WHERE first_name = 'Carrie';

SELECT first_name, last_name, rating FROM actors WHERE first_name BETWEEN 'C' AND 'L';

SELECT title, rating, awards, release_date FROM movies WHERE title LIKE '%potter%' AND release_date > '2009-01-01';

SELECT
	m.id,
	m.title,
    m.rating,
    m.awards,
    m.release_date
FROM
	movies m,
    genres g
WHERE
	m.genre_id = g.id
	AND title LIKE '%potter%'
    AND release_date > '2008';
