<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' =>$this->faker->numberBetween(1,2),
            'contact_fname' => $this->faker->name,
            'contact_lname' => $this->faker->name,
            'contact_email' => $this->faker->unique()->safeEmail(),
            'job' => 'employeed',
            'contact_phone' =>$this->faker->unique()->numberBetween(100000000,200000000),
            'cover_image'=>"noimage.jpg",
          
        ];
    }
}
