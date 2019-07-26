INSERT INTO front_page
SELECT artist.artist_name, tracks.track_name
From artist
INNER JOIN tracks on tracks.id = artist.id;

CREATE TABLE front_page(
  artist_name varchar(255),
  track_name varchar(255)
);

ALTER TABLE search_page
ADD published_year INT;

ALTER TABLE search_page
ADD lyric VARCHAR(5000) NOT NULL;

INSERT INTO search_page(published_year)
SELECT tracks.year
From tracks;

INSERT INTO search_page(published_year, lyric)
SELECT tracks.year, tracks.lyrics
FROM tracks
INNER JOIN search_page
ON tracks.track_name = search_page.track_name;

INSERT INTO article (track_name, artist_name, year, lyrics)
SELECT fp.track_name, fp.artist_name, tr.year, tr.lyrics
FROM front_page AS fp, tracks AS tr WHERE fp.artist_name 
= 'artist_name' AND fp.track_name = 'track_name';

INSERT INTO article (artist_name)
SELECT artist_name
FROM front_page
WHERE front_page.track_name = article.track_name;

INSERT INTO article
SELECT tr.year, tr.lyrics
FROM tracks AS tr
WHERE article.artist_name
= article.artist_name;

INSERT INTO article(publish_year, lyrics)
SELECT article.track_name, article.artist_name, tracks.year, tracks.lyrics
FROM tracks
LEFT JOIN article
ON article.track_name = tracks.track_name;

ALTER TABLE article
ADD publish_year INT,
ADD lyrics varchar(5000);
