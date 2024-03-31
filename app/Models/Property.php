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
                "rent" => [
                    "standard" => $property['rent'],
                    "house_1" => $property['multpliedrent'][0],
                    "house_2" => $property['multpliedrent'][1],
                    "house_3" => $property['multpliedrent'][2],
                    "house_4" => $property['multpliedrent'][3],
                    "hotel" => $property['multpliedrent'][4]
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
