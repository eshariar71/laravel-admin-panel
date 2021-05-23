<?php

use Illuminate\Database\Seeder;
use App\Model\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('admins')->delete();
        // new Admin::delete();

        $adminRecords = [
          ['id'=>1, 'name'=>'Super Admin','type'=>'superadmin','mobile'=>'01739957879', 'email'=>'superadmin@admin.com', 'gender'=>'Male', 'address'=>'Bangladesh', 'password'=>'$2y$10$6qk4pIsX57NruKYe.N9JHe3Jrxa7wIO60S91qlR5y4Jji8FgEtUkO','image'=>'', 'status'=>1],
          ['id'=>2, 'name'=>'Admin','type'=>'admin','mobile'=>'01739957879', 'email'=>'admin@admin.com', 'gender'=>'Male', 'address'=>'Bangladesh', 'password'=>'$2y$10$6qk4pIsX57NruKYe.N9JHe3Jrxa7wIO60S91qlR5y4Jji8FgEtUkO','image'=>'', 'status'=>1],
          ['id'=>3, 'name'=>'User','type'=>'user','mobile'=>'01739957879', 'email'=>'user@admin.com', 'gender'=>'Male', 'address'=>'Bangladesh', 'password'=>'$2y$10$6qk4pIsX57NruKYe.N9JHe3Jrxa7wIO60S91qlR5y4Jji8FgEtUkO','image'=>'', 'status'=>1],
          ['id'=>4, 'name'=>'Editor','type'=>'editor','mobile'=>'01739957879', 'email'=>'editor@admin.com', 'gender'=>'Male', 'address'=>'Bangladesh', 'password'=>'$2y$10$6qk4pIsX57NruKYe.N9JHe3Jrxa7wIO60S91qlR5y4Jji8FgEtUkO','image'=>'', 'status'=>1],
        ];

        foreach ($adminRecords as $record) {
          \App\Model\Admin::create($record);
        }
    }
}
