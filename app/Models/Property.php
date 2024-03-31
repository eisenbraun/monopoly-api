<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Property
{
    use HasFactory;

    private static function properties () {
        $json = resource_path('json/monopoly.json');
        $monopoly = File::json($json);
        $filtered = array_filter($monopoly['properties'], function ($property) {
            return isset($property['rent']);
        });

        return array_map(function ($property) {
            return [
                "name" => $property['name'],
                "id" => $property['id'],
                "price" => $property['price'],
                "rent" => $property['rent'],
                "improved_rents" => [
                    [
                        "improvement" => "With 1 House",
                        "rent" => $property['multpliedrent'][0]
                    ],
                    [
                        "improvement" => "With 2 Houses",
                        "rent" => $property['multpliedrent'][1]
                    ],
                    [
                        "improvement" => "With 3 Houses",
                        "rent" => $property['multpliedrent'][2]
                    ],
                    [
                        "improvement" => "With 4 Houses",
                        "rent" => $property['multpliedrent'][3]
                    ],
                    [
                        "improvement" => "With Hotel",
                        "rent" => $property['multpliedrent'][4]
                    ]
                ],
                "house_cost" => $property['housecost'],
                "group" => strtolower($property['group']),
                "mortgage_value" => $property['price'] / 2
            ];
        }, $filtered);
    }

    public static function all () {
        $properties = [];

        foreach (self::properties() as $property) {
            if ($property['group'] !== 'Special') {
              array_push($properties, [
                "id" => $property['id'],
                "name" => $property['name'],
                "group" => strtolower($property['group']),
                "price" => $property['price']
              ]);
            }
        }

      return $properties;
    }

    public static function find ($id) {
        return array_values(array_filter(self::properties(), function ($prop) use ($id) {
            return $prop['id'] === $id;
        }))[0];
    }
}
