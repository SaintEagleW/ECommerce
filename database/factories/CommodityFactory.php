<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commodity>
 */
class CommodityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => '預設標題',
            'desc' => '預設敘述',
            'img' => '預設圖片',
            'sku' => '預設單位',
            'quantity' => 0,
            'price' => 0
        ];
    }
}
