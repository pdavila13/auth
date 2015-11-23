<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        $this->seedUserTable();

        Model::reguard();
    }


    /**
     * Omplir taula users
     */
    private function seedUserTable() {

        $user = new User();
        $user->name = "Paolo Dávila Bazalar";
        $user->password = bcrypt(env('PASSWORD'));
        $user->email = "paolodavila@iesebre.com";
        $user->save();

    }
}
