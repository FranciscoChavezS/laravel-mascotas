<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'foto' => $this->faker->image('public/images',640,480, null, false),
            'fecha'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'telefono'=>$this->faker->phoneNumber(),
            'raza'=>$this->faker->name(),
            'comentario'=>$this->faker->text($maxNbChars = 200),
            'user_id'=>$this->faker->numberBetween(1,1),
        ];
    }
}
