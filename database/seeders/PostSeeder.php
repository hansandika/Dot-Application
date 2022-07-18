<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'user_id' => 1,
            'post_category_id' => 2,
            'title' => 'Comedy Fun',
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi sit numquam enim sed, aperiam porro itaque harum. Placeat, molestiae suscipit temporibus pariatur tempore in sunt, et tempora quidem exercitationem rem aperiam eveniet nostrum deserunt impedit enim natus dignissimos architecto corrupti, esse voluptatem sit. Distinctio tempora accusamus, iure sed autem perspiciatis."
        ]);
    }
}
