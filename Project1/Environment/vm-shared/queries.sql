#Give me the names of all the actors in the movie 'Death to Smoochy'. 
#Please also make sure actor names are in this format:  <firstname> <lastname>   
#(seperated by a single space).
#You may need to use MySQL CONCAT Function (very important).

SELECT DISTINCT CONCAT(a.first,' ',a.last) as Actorname
FROM Actor a, Movie m, MovieActor ma
WHERE a.id = ma.aid AND m.id = ma.mid AND m.title = 'Death to Smoochy';

#Give me the count of all the directors who directed at least 4 movies.
SELECT COUNT(did)
FROM
(
	SELECT md.did
	FROM MovieDirector md
	GROUP BY md.did
	HAVING COUNT(md.mid)>3
) AS A;

#Give me the movie title and year who has totalIncome over 17980000
SELECT DISTINCT m.title, m.year
FROM Movie m, Sales s
WHERE m.id = s.mid AND s.totalIncome > 17980000;

#Give me the name of actor who acts over 30 movies
SELECT DISTINCT CONCAT(a.first, ' ', a.last) as Actorname
FROM Actor a, ( SELECT ma.aid 
  FROM MovieActor ma
  GROUP BY ma.aid
  HAVING COUNT(ma.mid) > 30) as B
WHERE a.id = B.aid;
