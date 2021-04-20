<?php

namespace Database\Factories;

use App\Models\WebSite;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebSiteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WebSite::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'title' => $this->faker->company,
            'description' => $this->faker->sentence,
            'user_id' => 1,

            'body' => '<div class="txt-red">Hello CCxC!</div>',
            'styles' => '.txt-red{color: red}',
            'slug' => $this->faker->slug,
        ];
    }
}
