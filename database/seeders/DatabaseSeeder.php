<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
             'name' => 'Subairi',
             'username' => 'subaaiii',
             'email' => 'Subai@gmail.com',
             'password' => bcrypt('password')
         ]);

        User::factory(8)->create();
        Post::factory(50)->create();
        Category::factory(4)->create();


        // User::create([
        //      'name' => 'Iwan',
        //      'email' => 'Iwan@example.com',
        //      'password' => bcrypt('12345')
        //  ]);

        //  Category::create([
        //     'name' => 'Programmming',
        //     'slug' => 'programmming'
        //  ]);

        //  Category::create([
        //     'name' => 'personal',
        //     'slug' => 'personal'
        //  ]);

        //  Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'Judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa placeat repellat repellendus ab tempore mollitia dolor aut facilis neque',
        //     'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam, sit sapiente. Doloribus cum vitae quisquam culpa nesciunt sequi repellat? Perspiciatis hic, assumenda quasi facere veniam quae recusandae sequi eaque sed nulla veritatis nisi obcaecati iusto, quod, perferendis repellendus.</p><p> Quidem aperiam placeat adipisci quibusdam itaque nesciunt consectetur, optio beatae quis ex facilis excepturi culpa ab! Ipsa fugiat recusandae est. Dolor cum sequi porro eaque, at nulla voluptate inventore optio deleniti minima necessitatibus doloribus nostrum. Nisi molestiae omnis amet fugit tenetur accusantium delectus, odit accusamus similique saepe totam doloremque vitae? Sint autem accusamus voluptatibus voluptatem! Tempore vel similique commodi facilis beatae atque?</p>',
        //     'category_id' => 1,
        //     'user_id' => 2
        //  ]
        // );
        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'Judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa placeat repellat repellendus ab tempore mollitia dolor aut facilis neque',
        //     'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam, sit sapiente. Doloribus cum vitae quisquam culpa nesciunt sequi repellat? Perspiciatis hic, assumenda quasi facere veniam quae recusandae sequi eaque sed nulla veritatis nisi obcaecati iusto, quod, perferendis repellendus.</p><p> Quidem aperiam placeat adipisci quibusdam itaque nesciunt consectetur, optio beatae quis ex facilis excepturi culpa ab! Ipsa fugiat recusandae est. Dolor cum sequi porro eaque, at nulla voluptate inventore optio deleniti minima necessitatibus doloribus nostrum. Nisi molestiae omnis amet fugit tenetur accusantium delectus, odit accusamus similique saepe totam doloremque vitae? Sint autem accusamus voluptatibus voluptatem! Tempore vel similique commodi facilis beatae atque?</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        //  ]);
        //  Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'Judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa placeat repellat repellendus ab tempore mollitia dolor aut facilis neque',
        //     'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam, sit sapiente. Doloribus cum vitae quisquam culpa nesciunt sequi repellat? Perspiciatis hic, assumenda quasi facere veniam quae recusandae sequi eaque sed nulla veritatis nisi obcaecati iusto, quod, perferendis repellendus.</p><p> Quidem aperiam placeat adipisci quibusdam itaque nesciunt consectetur, optio beatae quis ex facilis excepturi culpa ab! Ipsa fugiat recusandae est. Dolor cum sequi porro eaque, at nulla voluptate inventore optio deleniti minima necessitatibus doloribus nostrum. Nisi molestiae omnis amet fugit tenetur accusantium delectus, odit accusamus similique saepe totam doloremque vitae? Sint autem accusamus voluptatibus voluptatem! Tempore vel similique commodi facilis beatae atque?</p>',
        //     'category_id' => 2,
        //     'user_id' => 1
        //  ]);
    }
}
