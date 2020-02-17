<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array([
           'role' => 'user'],
            [
            'role' => 'admin']);
            
        App\Role::insert($data);

        $users = User::all();
        foreach ($users as $user) {
            DB::table('users')->insert(['user_id' => $user->id, 'role_user' => 1]);
        }
    }
}
