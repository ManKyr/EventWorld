<?php

namespace Database\Factories;

use App\Models\Preference;
use Illuminate\Database\Eloquent\Factories\Factory;

class PreferenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Preference::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => factory(\App\Models\User::class),
            'event_id' => '',
            'artist_id' => '',
            'display_name' => '',
            'artist' => '',
            'venue' => '',
            'location' => '',
            'date' => '',
        ];
    }
}
