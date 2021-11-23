<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Food;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        {
            User::create(['name'=>'admin
            ','password'=>bcrypt('12345678'),'email'=>'admin1234@gmail.com']);
            Category::create(['name'=>'Beverages']);
            Category::create(['name'=>'Chats']);
            Category::create(['name'=>'Breakfast']);
            Category::create(['name'=>'Ice Cream']);
            Category::create(['name'=>'Meals']);
            Food::create(['name'=>'Lemon Juice','description'=>'juice mady by lemon..','price'=>'40','category_id'=>'1','type'=>'Veg']);
            Food::create(['name'=>'Tea','description'=>'Kodagu special...','price'=>'35','category_id'=>'1','type'=>'Veg']);
            Food::create(['name'=>'Pani Puri','description'=>'Evening Chats..','price'=>'25','category_id'=>'2','type'=>'Veg']);
            Food::create(['name'=>'Chicken Potato Crispy','description'=>'Chiken, Potato fry..','price'=>'100','category_id'=>'2','type'=>'Non-Veg']);
            Food::create(['name'=>'Idli','description'=>'morning with chatni vada.','price'=>'30','category_id'=>'3','type'=>'Veg']);
            Food::create(['name'=>'Cone IceCream','description'=>'cone tasy..vanila flavor.','price'=>'60','category_id'=>'4','type'=>'Veg']);
            Food::create(['name'=>'Noth special','description'=>'North with roti.','price'=>'120','category_id'=>'5','type'=>'Veg']);
        }
    }
}
