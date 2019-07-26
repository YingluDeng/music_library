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
