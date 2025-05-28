<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActorMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create actual actors with names
        $actors = [
            [
                'name' => 'Tom Hanks',
                'date_of_birth' => '1956-07-09',
                'biography' => 'Thomas Jeffrey Hanks is an American actor and filmmaker, known for both his comedic and dramatic roles.',
                'movies' => [
                    ['title' => 'Forrest Gump', 'release_year' => 1994, 'description' => 'The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal and other historical events unfold from the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart.'],
                    ['title' => 'Saving Private Ryan', 'release_year' => 1998, 'description' => 'Following the Normandy Landings, a group of U.S. soldiers go behind enemy lines to retrieve a paratrooper whose brothers have been killed in action.'],
                    ['title' => 'Cast Away', 'release_year' => 2000, 'description' => 'A FedEx executive must transform himself physically and emotionally to survive a crash landing on a deserted island.'],
                ],
            ],
            [
                'name' => 'Meryl Streep',
                'date_of_birth' => '1949-06-22',
                'biography' => 'Mary Louise "Meryl" Streep is an American actress and producer who has had an extensive career on screen and stage.',
                'movies' => [
                    ['title' => 'The Devil Wears Prada', 'release_year' => 2006, 'description' => 'A smart but sensible new graduate lands a job as an assistant to Miranda Priestly, the demanding editor-in-chief of a high fashion magazine.'],
                    ['title' => 'Mamma Mia!', 'release_year' => 2008, 'description' => 'The story of a bride-to-be trying to find her real father told using hit songs by the popular 1970s group ABBA.'],
                    ['title' => 'The Iron Lady', 'release_year' => 2011, 'description' => 'An elderly Margaret Thatcher talks to the imagined presence of her recently deceased husband as she struggles to come to terms with his death while scenes from her past life.'],
                ],
            ],
            [
                'name' => 'Leonardo DiCaprio',
                'date_of_birth' => '1974-11-11',
                'biography' => 'Leonardo Wilhelm DiCaprio is an American actor, film producer, and environmentalist.',
                'movies' => [
                    ['title' => 'Titanic', 'release_year' => 1997, 'description' => 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.'],
                    ['title' => 'Inception', 'release_year' => 2010, 'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.'],
                    ['title' => 'The Revenant', 'release_year' => 2015, 'description' => 'A frontiersman on a fur trading expedition in the 1820s fights for survival after being mauled by a bear and left for dead by members of his own hunting team.'],
                ],
            ],
            [
                'name' => 'Viola Davis',
                'date_of_birth' => '1965-08-11',
                'biography' => 'Viola Davis is an American actress and producer. She is the first black actor to achieve the "Triple Crown of Acting".',
                'movies' => [
                    ['title' => 'The Help', 'release_year' => 2011, 'description' => 'An aspiring author during the civil rights movement of the 1960s decides to write a book detailing the African American maids\' point of view on the white families for which they work.'],
                    ['title' => 'Fences', 'release_year' => 2016, 'description' => 'A working-class African-American father tries to raise his family in the 1950s, while coming to terms with the events of his life.'],
                    ['title' => 'Widows', 'release_year' => 2018, 'description' => 'Four women with nothing in common except a debt left behind by their dead husbands\' criminal activities take fate into their own hands and conspire to forge a future on their own terms.'],
                ],
            ],
            [
                'name' => 'Denzel Washington',
                'date_of_birth' => '1954-12-28',
                'biography' => 'Denzel Hayes Washington Jr. is an American actor, director, and producer.',
                'movies' => [
                    ['title' => 'Training Day', 'release_year' => 2001, 'description' => 'A rookie cop spends his first day as a Los Angeles narcotics officer with a rogue detective who isn\'t what he appears to be.'],
                    ['title' => 'Flight', 'release_year' => 2012, 'description' => 'An airline pilot saves almost all his passengers on his malfunctioning airliner which eventually crashed, but an investigation into the accident reveals something troubling.'],
                    ['title' => 'Fences', 'release_year' => 2016, 'description' => 'A working-class African-American father tries to raise his family in the 1950s, while coming to terms with the events of his life.'],
                ],
            ],
        ];

        foreach ($actors as $actorData) {
            $movies = $actorData['movies'];
            unset($actorData['movies']);

            $actor = Actor::create($actorData);

            foreach ($movies as $movieData) {
                $actor->movies()->create($movieData);
            }
        }
    }
}