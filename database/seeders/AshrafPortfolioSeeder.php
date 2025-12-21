<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AshrafPortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // PROFILE
        DB::table('profiles')->insert([
            'first_name' => 'Ashraf',
            'last_name'  => 'Mahmoud',
            'title'      => 'Marketing & Social Media Specialist',
            'bio'        => 'A highly-driven Marketing & Social Media Specialist with more than 7 years of experience in managing digital marketing strategies, brand positioning, paid advertising, and social media growth. Worked with top-tier companies across the UAE, achieving measurable success in campaign performance, engagement, and brand visibility. Currently leading the marketing department at Enala Hotel as the Marketing Manager.',
            '' => 'profile/ashraf.jpg',
            'address'    => 'Dubai, United Arab Emirates',
            'location'   => 'Dubai',
            'phone'      => '+971500000000',
            'email'      => 'ashraf@example.com',
            'facebook_url' => 'https://facebook.com/ashraf',
            'twitter_url'  => 'https://twitter.com/ashraf',
            'linkedin_url' => 'https://linkedin.com/in/ashraf',
            'github_url'   => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // EXPERIENCES
        DB::table('experiences')->insert([
            [
                'title' => 'Marketing Manager',
                'description' => 'Leading all marketing operations, brand strategy, online campaigns, content creation, and paid advertising. Managing a team of designers and social media specialists to elevate the hotel\'s digital presence.',
                'company' => 'Enala Hotel, Saudi Arabia',
                'start_date' => '2023-01-01',
                'end_date' => null,
                'is_current' => true,
                'icon' => 'la la-briefcase',
                'color' => '#28a745',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Senior Digital Marketing Specialist',
                'description' => 'Managed complete digital marketing funnels, Facebook Ads, Google Ads, and annual digital budget. Increased brand visibility by 140% and improved conversion rates across all channels.',
                'company' => 'Emirates Global Vision, Dubai',
                'start_date' => '2020-03-01',
                'end_date' => '2022-12-01',
                'is_current' => false,
                'icon' => 'la la-chart-line',
                'color' => '#17a2b8',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Social Media Specialist',
                'description' => 'Handled content calendars, video production, influencers collaboration and social media analytics. Successfully grew accounts by over 300% in one year.',
                'company' => 'Dubai Creative Agency',
                'start_date' => '2018-01-01',
                'end_date' => '2020-02-01',
                'is_current' => false,
                'icon' => 'la la-instagram',
                'color' => '#ff5722',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // PORTFOLIOS
        DB::table('portfolios')->insert([
            [
                'title' => 'Enala Hotel Marketing Transformation',
                'description' => 'Complete digital transformation for Enala Hotel including social media strategy, paid ads, brand positioning, and creative campaigns boosting booking conversions.',
                'image' => 'portfolio/enala.jpg',
                'client' => 'Enala Hotel',
                'project_date' => '2024-01-01',
                'service' => 'Digital Marketing & Social Media',
                'category' => 'marketing',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'UAE Real Estate Campaign',
                'description' => 'A multi-level marketing campaign targeting GCC investors, delivering high-quality leads through Google Ads, SEO, and social media.',
                'image' => 'portfolio/realestate.jpg',
                'client' => 'Dubai Real Estate Group',
                'project_date' => '2022-09-10',
                'service' => 'Paid Ads & Lead Generation',
                'category' => 'consulting',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Luxury Restaurant Branding',
                'description' => 'Full branding and marketing campaign for a luxury restaurant in Dubai resulting in 500% social media growth.',
                'image' => 'portfolio/restaurant.jpg',
                'client' => 'Gold Spoon Restaurant',
                'project_date' => '2021-04-15',
                'service' => 'Branding & Social Media',
                'category' => 'marketing',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // SKILLS
        DB::table('skills')->insert([
            [
                'name' => 'Digital Marketing',
                'percentage' => 95,
                'icon' => 'la la-bullhorn',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Social Media Management',
                'percentage' => 98,
                'icon' => 'la la-instagram',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Content Creation',
                'percentage' => 90,
                'icon' => 'la la-edit',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Google Ads & Analytics',
                'percentage' => 85,
                'icon' => 'la la-google',
                'order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Branding Strategy',
                'percentage' => 92,
                'icon' => 'la la-lightbulb',
                'order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // AWARDS
        DB::table('awards')->insert([
            [
                'title' => 'Best Marketing Campaign Award',
                'description' => 'Awarded for executing the highest-performing marketing campaign in the region with outstanding ROI.',
                'start_date' => '2021-06-01',
                'end_date' => null,
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Top Social Media Strategist',
                'description' => 'Recognized for developing high-impact social media strategies for international brands.',
                'start_date' => '2020-11-01',
                'end_date' => null,
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
