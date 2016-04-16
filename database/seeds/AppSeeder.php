<?php

use App\Advert;
use App\Good;
use App\Order;
use App\State;
use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * States
         * */
        $stateNew = State::firstOrCreate([
            'state_name' => 'Новый',
            'state_slug' => 'new',
        ]);

        $stateOnoperator = State::firstOrCreate([
            'state_name' => 'В работе',
            'state_slug' => 'onoperator',
        ]);

        $stateAccepted = State::firstOrCreate([
            'state_name' => 'Подтвержден',
            'state_slug' => 'accepted',
        ]);

        /*
         * Adverts
         * */
        $advertJohn = Advert::firstOrCreate([
            'user_first_name' => 'John',
            'user_last_name' => 'Doe',
            'user_login' => 'Jdoe',
            'email' => 'jdoe@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        $advertJohn->save();

        $advertErick = Advert::firstOrCreate([
            'user_first_name' => 'Erick',
            'user_last_name' => 'Doe',
            'user_login' => 'Edoe',
            'email' => 'edoe@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        $advertErick->save();

        $advertMichel = Advert::firstOrCreate([
            'user_first_name' => 'Michel',
            'user_last_name' => 'Doe',
            'user_login' => 'Mdoe',
            'email' => 'mdoe@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        /*
         * Goods
         * */
        $goodRado = Good::firstOrCreate([
            'good_name' => 'Часы Rado Integral',
            'good_price' => 2000,
        ]);
        /** @var Good $goodRado */
        $goodRado->advert()->associate($advertJohn);
        $goodRado->save();

        $goodSwiss = Good::firstOrCreate([
            'good_name' => 'Часы Swiss Army',
            'good_price' => 1500,
        ]);
        /** @var Good $goodSwiss */
        $goodSwiss->advert()->associate($advertJohn);
        $goodSwiss->save();

        $goodTablet = Good::firstOrCreate([
            'good_name' => 'Детский планшет',
            'good_price' => 2100,
        ]);
        /** @var Good $goodTablet */
        $goodTablet->advert()->associate($advertErick);
        $goodTablet->save();

        $goodMonster = Good::firstOrCreate([
            'good_name' => 'Колонки Monster Beats',
            'good_price' => 900,
        ]);
        /** @var Good $goodMonster */
        $goodMonster->advert()->associate($advertMichel);
        $goodMonster->save();

        /*
         * Orders
         * */
        $orderJohn = Order::firstOrCreate([
            'order_client_phone' => '777713522547',
            'order_client_name' => 'John',
        ]);
        /** @var Order $orderJohn */
        $orderJohn->state()->associate($stateNew);
        $orderJohn->good()->associate($goodRado);
        $orderJohn->created_at->addDay();
        $orderJohn->save();

        $orderMichel = Order::firstOrCreate([
            'order_client_phone' => '77756547656',
            'order_client_name' => 'Michel',
        ]);
        /** @var Order $orderMichel */
        $orderMichel->state()->associate($stateOnoperator);
        $orderMichel->good()->associate($goodSwiss);
        $orderMichel->created_at->addDays(2);
        $orderMichel->save();

        $orderDarrel = Order::firstOrCreate([
            'order_client_phone' => '77786789878',
            'order_client_name' => 'Darrel',
        ]);
        /** @var Order $orderDarrel */
        $orderDarrel->state()->associate($stateAccepted);
        $orderDarrel->good()->associate($goodTablet);
        $orderDarrel->created_at->addDays(5);
        $orderDarrel->save();

        $orderDan = Order::firstOrCreate([
            'order_client_phone' => '77752456523',
            'order_client_name' => 'Dan',
        ]);
        /** @var Order $orderDan */
        $orderDan->state()->associate($stateAccepted);
        $orderDan->good()->associate($goodMonster);
        $orderDan->save();

        DB::table("orders")->where('id', $orderDan->id)->update([
            'created_at' => \Carbon\Carbon::now()->subDays(5)
        ]);
        
        DB::table("orders")->where('id', $orderJohn->id)->update([
            'created_at' => \Carbon\Carbon::now()->subDays(10)
        ]);
        
        DB::table("orders")->where('id', $orderMichel->id)->update([
            'created_at' => \Carbon\Carbon::now()->subMonth(10)
        ]);
        
        DB::table("orders")->where('id', $orderDarrel)->update([
            'created_at' => \Carbon\Carbon::now()->subYears(3)
        ]);
        

    }
}
