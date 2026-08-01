<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('programs')->truncate();

        DB::table('programs')->insert([

            [
                'title' => 'Helping Children Build Self-Confidence Through Creative Activities',
                'text' => 'Confidence grows when children are encouraged to explore, create and express themselves. Through theatre, music and collaborative projects, participants learn to trust their abilities while developing communication and teamwork skills.',
                'age_group' => '8-12',
                'category' => 'Personal & Emotional Development',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Discovering the Joy of Reading Together',
                'text' => 'Reading circles encourage curiosity, imagination and confidence while helping children develop language and comprehension skills in a fun environment.',
                'age_group' => '8-12',
                'category' => 'Creativity & Wellbeing',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Learning Through Play',
                'text' => 'Games and collaborative activities provide opportunities to strengthen problem-solving, communication and emotional intelligence.',
                'age_group' => '8-12',
                'category' => 'Social Skills & Communication',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'The Benefits of Team Sports for Young Learners',
                'text' => 'Sports develop discipline, respect, resilience and cooperation while encouraging healthy habits from an early age.',
                'age_group' => '8-12',
                'category' => 'Sports',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Music as a Tool for Personal Growth',
                'text' => 'Music education develops patience, creativity and confidence while encouraging collaboration between participants.',
                'age_group' => '13-17',
                'category' => 'Creativity & Wellbeing',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Developing Leadership During the Teenage Years',
                'text' => 'Leadership programs encourage initiative, empathy and responsibility through real-life collaborative projects.',
                'age_group' => '13-17',
                'category' => 'Personal Projects & Self-Management',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Building Healthy Digital Habits',
                'text' => 'Young people learn how to use technology responsibly while maintaining healthy online and offline relationships.',
                'age_group' => '13-17',
                'category' => 'Personal & Emotional Development',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Volunteering Starts with Small Actions',
                'text' => 'Community service projects encourage teenagers to discover how they can positively influence the world around them.',
                'age_group' => '13-17',
                'category' => 'Civic Engagement & Participation',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Preparing Young Adults for Their Future Careers',
                'text' => 'Professional development workshops help participants discover career opportunities while strengthening soft skills and confidence.',
                'age_group' => '18-25',
                'category' => 'Personal Projects & Self-Management',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Why Emotional Intelligence Matters in the Workplace',
                'text' => 'Self-awareness, empathy and communication are among the most valuable professional skills for young adults.',
                'age_group' => '18-25',
                'category' => 'Personal & Emotional Development',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Creating Positive Change Through Community Projects',
                'text' => 'Community engagement develops leadership while allowing participants to contribute to meaningful local initiatives.',
                'age_group' => '18-25',
                'category' => 'Civic Engagement & Participation',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Communication Skills That Open Doors',
                'text' => 'Effective communication builds stronger professional relationships, increases confidence and improves teamwork.',
                'age_group' => '18-25',
                'category' => 'Social Skills & Communication',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Creative Thinking for Future Innovators',
                'text' => 'Innovation begins with curiosity. Creative workshops encourage participants to transform ideas into practical solutions.',
                'age_group' => '18-25',
                'category' => 'Creativity & Wellbeing',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Lifelong Learning Never Stops',
                'text' => 'Continuous learning allows adults to adapt, grow professionally and remain curious throughout every stage of life.',
                'age_group' => '26+',
                'category' => 'Personal Projects & Self-Management',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Building Stronger Communities Together',
                'text' => 'Community involvement strengthens neighborhoods while creating opportunities to mentor and support younger generations.',
                'age_group' => '26+',
                'category' => 'Civic Engagement & Participation',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Leading by Example',
                'text' => 'Leadership is demonstrated through everyday actions, collaboration and a commitment to helping others succeed.',
                'age_group' => '26+',
                'category' => 'Personal & Emotional Development',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'The Importance of Work-Life Balance',
                'text' => 'Maintaining physical and emotional wellbeing helps individuals remain productive, creative and engaged in their communities.',
                'age_group' => '26+',
                'category' => 'Creativity & Wellbeing',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Strengthening Family Communication',
                'text' => 'Healthy communication creates stronger relationships between parents, children and the wider community.',
                'age_group' => '26+',
                'category' => 'Social Skills & Communication',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Mentoring the Next Generation',
                'text' => 'Experienced adults play a vital role in supporting young people by sharing knowledge, encouragement and life experiences.',
                'age_group' => '26+',
                'category' => 'Civic Engagement & Participation',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Turning Personal Goals Into Reality',
                'text' => 'Planning, organization and perseverance help individuals transform ideas into successful personal and professional achievements.',
                'age_group' => '18-25',
                'category' => 'Personal Projects & Self-Management',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
