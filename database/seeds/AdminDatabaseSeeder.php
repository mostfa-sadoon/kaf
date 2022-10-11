<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminDatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    # Subscribtions Seeders
    DB::table('subscribtions_kinds')->insert([
      [], []
    ]);
    DB::table('subscribtion_kind_translations')->insert([
      ['subscribtion_kind_id' => 1, 'locale' => 'ar', 'name' => 'أداه كاف'],
      ['subscribtion_kind_id' => 1, 'locale' => 'en', 'name' => 'Kaf tool'],
      ['subscribtion_kind_id' => 2, 'locale' => 'ar', 'name' => 'جميع الخدمات ماعدا أداه كاف'],
      ['subscribtion_kind_id' => 2, 'locale' => 'en', 'name' => 'All services without kaf tool']
    ]);
    # End of Subscribtions Seeders

       Admin::create([
            'f_name'  => 'Admin',
            'l_name'=> 'tawajood',
            'username'=>'super-admin',
            'phone'=>'05523552846',
            'email'  => 'admin@app.com',
            'national_id'=>'165416523',
            'Bank_account_number'=>'654512',
            'password'  => bcrypt('123456'),
       ]);
       DB::table('users')->insert([
        [
        'f_name'  => 'ahmed',
        'l_name'=> 'mohamed',
        'username'=>'mohamed_ahmed',
        'phone'=>'0552523552846',
        'email'  => 'user@app.com',
        'national_id'=>'165416523',
        'Bank_account_number'=>'654512',
        'password'  => bcrypt('123456'),
       ],[
          'f_name'  => 'ali',
          'l_name'=> 'hassan',
          'username'=>'ali_hassan',
          'phone'=>'055252355652846',
          'email'  => 'user1@app.com',
          'national_id'=>'165416524563',
          'Bank_account_number'=>'654514',
          'password'  => bcrypt('123456'),
       ],[
          'f_name'  => 'hazem',
          'l_name'=> 'hassan',
          'username'=>'hazem_hassan',
          'phone'=>'055252355652846256',
          'email'  => 'user12@app.com',
          'national_id'=>'1655416524563',
          'Bank_account_number'=>'65524514',
          'password'  => bcrypt('123456'),
       ]
    ]);
    DB::table('teachers')->insert([
      [
          'f_name'  => 'ahmed',
          'l_name'=> 'mohamed',
          'username'=>'mohamed_ahmed',
          'phone'=>'0552523552846',
          'email'  => 'user@app.com',
          'national_id'=>'165416523',
          'Bank_account_number'=>'654512',
          'password'  => bcrypt('123456'),
         ],[
            'f_name'  => 'mohamed',
            'l_name'=> 'ibrahim',
            'username'=>'mohamed_ibrahim',
            'phone'=>'05525246',
            'email'  => 'user5@app.com',
            'national_id'=>'165416563',
            'Bank_account_number'=>'6545146206',
            'password'  => bcrypt('123456'),
         ],[
            'f_name'  => 'hazem',
            'l_name'=> 'hassan',
            'username'=>'hazem_hassan',
            'phone'=>'055252355652846256',
            'email'  => 'user12@app.com',
            'national_id'=>'1655416524563',
            'Bank_account_number'=>'65524514',
            'password'  => bcrypt('123456'),
         ]
    ]);
      DB::table('usertypes')->insert([
          ['name'=>'طالب'],
          ['name'=>'معلم'],
          ['name'=>'مدير'],
      ]);
  }
}
