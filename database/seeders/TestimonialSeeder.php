<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some test users if they don't exist
        $users = [];

        if (User::count() < 5) {
            $users[] = User::create([
                'name' => 'Priya Jayasinghe',
                'email' => 'priya@example.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]);

            $users[] = User::create([
                'name' => 'Sunil Fernando',
                'email' => 'sunil@example.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]);

            $users[] = User::create([
                'name' => 'Kamani Silva',
                'email' => 'kamani@example.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]);

            $users[] = User::create([
                'name' => 'Rajesh Patel',
                'email' => 'rajesh@example.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]);

            $users[] = User::create([
                'name' => 'Nayomi Perera',
                'email' => 'nayomi@example.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]);
        } else {
            $users = User::limit(5)->get()->toArray();
        }

        $testimonials = [
            [
                'content' => 'EZofz.lk has been a game-changer for my office work! The Unicode typing tool saves me hours every day when preparing legal documents in Sinhala. Highly recommended for all government officers.',
                'rating' => 5,
                'status' => 'approved',
                'is_featured' => true,
            ],
            [
                'content' => 'The name converter tool is incredibly useful for our HR department. We process hundreds of employee records and this tool makes the conversion from Sinhala to English names so much easier.',
                'rating' => 5,
                'status' => 'approved',
                'is_featured' => true,
            ],
            [
                'content' => 'As a police officer, I find the document library very helpful. All the forms and templates I need are available in one place. The website is user-friendly and fast.',
                'rating' => 4,
                'status' => 'approved',
                'is_featured' => true,
            ],
            [
                'content' => 'Great platform for office automation tools. The criminal procedure code section is particularly useful for legal professionals. The search functionality is excellent.',
                'rating' => 5,
                'status' => 'approved',
                'is_featured' => true,
            ],
            [
                'content' => 'EZofz.lk has streamlined our workflow significantly. The tools are designed with Sri Lankan requirements in mind, which makes a huge difference in our daily operations.',
                'rating' => 5,
                'status' => 'approved',
                'is_featured' => true,
            ],
            [
                'content' => 'Excellent service and support. The team understands the local needs and has created tools that actually solve real problems we face in government offices.',
                'rating' => 4,
                'status' => 'approved',
                'is_featured' => false,
            ],
            [
                'content' => 'The penal code section is very comprehensive. As a lawyer, I use it regularly for case preparations. The bookmark and note features are particularly helpful.',
                'rating' => 5,
                'status' => 'approved',
                'is_featured' => false,
            ],
        ];

        foreach ($testimonials as $index => $testimonialData) {
            $user = $users[$index % count($users)];
            $userId = is_array($user) ? $user['id'] : $user->id;

            Testimonial::create(array_merge($testimonialData, [
                'user_id' => $userId,
            ]));
        }
    }
}
