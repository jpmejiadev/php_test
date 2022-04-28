--  tv_series -> (id, title, channel, gender);
create table tv_series (
    id int(11) not null AUTO_INCREMENT primary key,
    title varchar(50) not null,
    channel varchar(50) not null,
    gender varchar(50) not null
);
--  tv_series_intervals -> (id_tv_series, week_day, show_time);
create table tv_series_intervals (
    id int(11) not null AUTO_INCREMENT primary key,
    id_tv_series int(11) not null,
    week_day varchar(50) NOT NULL,
    show_time time NOT NULL,
    FOREIGN KEY (id_tv_series) REFERENCES tv_series(id)
);
-- insert tv series
insert into tv_series (id, title, channel, gender)
values  (1, 'Roar', 'Apple TV+', 'Anthology series, Dark comedy, Drama'),
        (2, 'Moon Knight', 'Disney+', 'Superhero fiction, Psychological horror, Action fiction, Fantasy television'),
        (3, 'Slow Horses', 'Apple TV+', 'Spy fiction'),
        (4, 'Severance', 'Apple TV+', 'Science fiction, Dystopia, Dark comedy, Drama, Psychological thriller, Mystery'),
        (5, 'The Dropout', 'Hulu, ABC News', 'Drama'),
        (6, 'WeCrashed', 'Apple TV+', 'Drama'),
        (7, 'Pieces of Her', 'Netflix', 'Thriller, Drama');
-- insert tv_series_intervals
insert into tv_series_intervals (id_tv_series, week_day, show_time)
values (1, 'monday', '14:15'),
       (1, 'tuesday', '14:15'),
       (1, 'wednesday', '14:15'),
       (2, 'thursday', '23:45'),
       (2, 'friday', '10:15'),
       (2, 'saturday', '10:15'),
       (3, 'sunday', '22:15'),
       (3, 'monday', '23:15'),
       (3, 'tuesday', '22:15'),
       (4, 'wednesday', '7:15'),
       (4, 'thursday', '7:15'),
       (4, 'friday', '7:15'),
       (5, 'saturday', '18:15'),
       (5, 'sunday', '18:15'),
       (5, 'monday', '18:15'),
       (6, 'tuesday', '23:15'),
       (6, 'wednesday', '23:15'),
       (6, 'thursday', '13:15'),
       (7, 'friday', '23:15'),
       (7, 'saturday', '23:15'),
       (7, 'sunday', '23:15');



