<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Architecture',
            'slug' => 'architecture',
            'description' => 'Buildings, Architects and Designers'
        ]);
        DB::table('categories')->insert([
            'name' => 'Art & Stage',
            'slug' => 'art-and-stage',
            'description' => 'Artists, Painters, Sculptors, Theatre and Opera'
        ]);
        DB::table('categories')->insert([
            'name' => 'Business World ',
            'slug' => 'business-world ',
            'description' => 'Companies, Business People, Products, Trademarks and Advertisements'
        ]);
        DB::table('categories')->insert([
            'name' => 'Communities',
            'slug' => 'communities',
            'description' => 'Legislation, Education, Labour market, Institutions and Associations'
        ]);
        DB::table('categories')->insert([
            'name' => 'Design',
            'slug' => 'design',
            'description' => 'Fashion, Furniture, Interiors, Household design, Logos and Symbols'
        ]);
        DB::table('categories')->insert([
            'name' => 'Film',
            'slug' => 'film',
            'description' => 'Titles, Actors, Directors and Roles'
        ]);
        DB::table('categories')->insert([
            'name' => 'Food & Drink',
            'slug' => 'food-and-drink',
            'description' => 'Gastronomy, Wine, Beer, International Cuisine and Ingredients'
        ]);
        DB::table('categories')->insert([
            'name' => 'Geography',
            'slug' => 'geography',
            'description' => 'Countries, Cities, Oceans and Seas'
        ]);
        DB::table('categories')->insert([
            'name' => 'History',
            'slug' => 'history',
            'description' => 'Historical persons, Places and Events'
        ]);
        DB::table('categories')->insert([
            'name' => 'Humans',
            'slug' => 'humans',
            'description' => 'Physiology, Anatomy, Psychology, Medicine and Lifestyles'
        ]);
        DB::table('categories')->insert([
            'name' => 'Language',
            'slug' => 'language',
            'description' => 'Foreign languages, Foreign words, Idioms and Sayings'
        ]);
        DB::table('categories')->insert([
            'name' => 'Literature',
            'slug' => 'literature',
            'description' => 'Titles, Authors, Philosophers and Literary Characters'
        ]);
        DB::table('categories')->insert([
            'name' => 'Music',
            'slug' => 'music',
            'description' => 'Artists, Composers, Titles and Concepts'
        ]);
        DB::table('categories')->insert([
            'name' => 'Nature',
            'slug' => 'nature',
            'description' => 'Animals, Plants, Nature and The Environment'
        ]);
        DB::table('categories')->insert([
            'name' => 'Politics',
            'slug' => 'politics',
            'description' => 'Politicians, Parties, Organisations and Forms of Government'
        ]);
        DB::table('categories')->insert([
            'name' => 'Science',
            'slug' => 'science',
            'description' => 'Physics, Chemistry, Mathematics and Astronomy'
        ]);
        DB::table('categories')->insert([
            'name' => 'Sports & Games',
            'slug' => 'sports-and-games',
            'description' => 'Athletes, Sports, Games and Records'
        ]);
        DB::table('categories')->insert([
            'name' => 'Technology',
            'slug' => 'technology',
            'description' => 'Technology, Space Travel, Computers, Crafts and Tools'
        ]);
        DB::table('categories')->insert([
            'name' => 'Tradition & Beliefs',
            'slug' => 'tradition-and-beliefs',
            'description' => 'Religion, Mythology, Traditions, Customs and Habits'
        ]);
        DB::table('categories')->insert([
            'name' => 'TV & Radio',
            'slug' => 'tv-and-radio',
            'description' => 'Programmes, News, People and Media Stories'
        ]);
    }
}
