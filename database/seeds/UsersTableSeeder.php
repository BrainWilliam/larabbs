<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Faker\Generator::class);
        $avatars = [
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/s5ehp11z6s.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/Lhd1SHqu86.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/LOnMrqbHJn.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/xAuDMxteQy.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/NDnzMutoxX.png?imageView2/1/w/200/h/200',
        ];
        $users = factory(\App\Models\User::class)
                ->times(10)
                ->make()
                ->each(function($user,$index) use($faker,$avatars){
                    $user->avatar = $faker->randomElement($avatars);
                });
        $user_array = $users->makeVisible(['password','remember_token'])->toArray();
        \App\Models\User::insert($user_array);

        $user =  \App\Models\User::find(1);
        // 初始化用户角色，将 1 号用户指派为『站长』
        $user->assignRole('Founder');
        $user->name = 'summer';
        $user->email = '1692769645@qq.com';
        $user->avatar = 'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/NDnzMutoxX.png?imageView2/1/w/200/h/200';
        $user->save();
         // 将 2 号用户指派为『管理员』
        $user = \App\Models\User::find(2);
        $user->assignRole('Maintainer');
    }
}
