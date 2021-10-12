<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = [1,2,3];
        return [
            'message'=>$this->faker->text(),
            'to_user'=>$this->faker->randomElement($userIds),
            'from_user'=>$this->faker->randomElement($userIds),
        ];
    }
}
