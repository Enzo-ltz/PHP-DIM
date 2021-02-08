<?php

namespace App;


use Faker\Factory;

class FakeData
{
    public static function games($count = 10)
    {
        $games = [];
        for ($i = 1; $i <= $count; $i++) {
            $c1 = FakeData::random_color();
            $c2 = FakeData::random_color();
            $games[] = [
                "id" => $i,
                "name" => $name = "GAME ".$i,
                "image" => "https://fakeimg.pl/256x256/$c1/$c2/?text=" . urlencode($name)
            ];
        }
        return $games;

    }

    public static function players($count = 10)
    {
        $players = [];
        for ($i = 1; $i <= $count; $i++) {
            $players[] = ["id" => $i, "username" => "PLAYER_$i", "email" => "PLAYER_$i@email.fr", "games" => self::games(5)];
        }

        return $players;
    }


    public static function scores($count = 100)
    {

        $games = self::games(5);
        $players = self::players(5);
        $scores = [];
        for ($i = 1; $i <= $count; $i++) {
            $scores[] = ["id" => $i,
                "game" => $games[rand(0, 4)],
                "player" => $players[rand(0, 4)],
                "score" => rand(1, 100000),
                "createdAt" => new \DateTime(date(DATE_ISO8601,rand(1, 100000) * 1000)),
            ];
        }
        return $scores;
    }


    private static function random_color_part()
    {
        return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
    }

    private static function random_color()
    {
        return self::random_color_part() . self::random_color_part() . self::random_color_part();
    }
}