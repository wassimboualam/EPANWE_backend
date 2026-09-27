<?php

namespace Database\Seeders;

use App\Models\PartnershipRequest;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnershipRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table("partnership_requests")->truncate();
        
        // A small deterministic batch, so you always get the same
        // set of examples when re-seeding during development.
        $examples = [
            [
                'company_name' => 'Groupe Atlas Industries',
                'ice' => '001234567000045',
                'address' => '45, Boulevard Mohammed V, Casablanca',
                'phone_number' => '+212 661 234 567',
                'email' => 'contact@atlas-industries.ma',
                'website' => 'www.atlas-industries.ma',
                'legal_form' => 'Entreprise privée',
                'activity_field' => 'Production & Industrialisation',
                'description' => "Dans le cadre de notre politique RSE, nous souhaitons offrir à nos collaborateurs et à leurs familles un accès à des programmes de développement personnel adaptés à tous les âges. Notre ambition est d'accompagner les enfants de nos équipes dans leur réussite scolaire et leur épanouissement personnel.",
                'contact_name' => 'Yassine Benali',
                'contact_email' => 'yassine.benali@atlas-industries.ma',
                'contact_phone_number' => '+212 662 345 678',
                'age_range' => '8- 12',
                'number_of_users' => 120,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'company_name' => 'Association Annour',
                'ice' => '001987654000032',
                'address' => '12, Rue Ibn Sina, Marrakech',
                'phone_number' => '+212 524 456 789',
                'email' => 'contact@association-annour.ma',
                'website' => 'www.association-annour.ma',
                'legal_form' => 'Association',
                'activity_field' => 'Social',
                'description' => "Notre association milite pour l'inclusion sociale des jeunes issus de quartiers défavorisés. Nous souhaitons nous appuyer sur l'expertise d'EPANWE pour élargir notre impact et proposer des parcours de développement personnel structurés.",
                'contact_name' => 'Salma El Idrissi',
                'contact_email' => 'salma.elidrissi@association-annour.ma',
                'contact_phone_number' => '+212 663 456 789',
                'age_range' => '13- 17',
                'number_of_users' => 65,
                'created_at' => now()->subDays(6),
                'updated_at' => now()->subDays(6),
            ],
            [
                'company_name' => 'Coopérative Zellige',
                'ice' => '001555888000021',
                'address' => '78, Avenue Hassan II, Fès',
                'phone_number' => '+212 535 678 901',
                'email' => 'coop.zellige@artisanat.ma',
                'website' => null,
                'legal_form' => 'Coopérative',
                'activity_field' => 'Art & Design',
                'description' => "Notre coopérative regroupe une trentaine d'artisanes et souhaite offrir à leurs enfants des programmes d'éveil artistique et de développement personnel. Nous avons été séduits par la dimension créative des parcours EPANWE.",
                'contact_name' => 'Khadija Alami',
                'contact_email' => 'khadija.alami@artisanat.ma',
                'contact_phone_number' => '+212 664 567 890',
                'age_range' => '8- 12',
                'number_of_users' => 30,
                'created_at' => now()->subDays(11),
                'updated_at' => now()->subDays(11),
            ],
            [
                'company_name' => 'Banque Populaire Régionale',
                'ice' => '001777999000017',
                'address' => '101, Boulevard Zerktouni, Rabat',
                'phone_number' => '+212 537 890 123',
                'email' => 'rse@bp-regionale.ma',
                'website' => 'www.bp-regionale.ma',
                'legal_form' => 'Institution publique',
                'activity_field' => 'Banque & Assurance',
                'description' => "Notre institution souhaite proposer à ses agents ainsi qu'à leurs enfants des parcours éducatifs, sportifs et culturels de qualité. Ce partenariat s'inscrit dans notre démarche globale d'amélioration de la qualité de vie au travail.",
                'contact_name' => 'Mehdi Tazi',
                'contact_email' => 'mehdi.tazi@bp-regionale.ma',
                'contact_phone_number' => '+212 665 678 901',
                'age_range' => '26- 100',
                'number_of_users' => 320,
                'created_at' => now()->subDays(18),
                'updated_at' => now()->subDays(18),
            ],
            [
                'company_name' => 'Ecole Yasmina Internationale',
                'ice' => '001333444000056',
                'address' => '23, Rue Al Yamama, Casablanca',
                'phone_number' => '+212 522 345 678',
                'email' => 'partenariats@yasmina-edu.ma',
                'website' => 'www.yasmina-edu.ma',
                'legal_form' => 'Entreprise privée',
                'activity_field' => 'Éducation',
                'description' => "Notre établissement souhaite enrichir son offre périscolaire avec des programmes de développement personnel reconnus. Les parcours EPANWE correspondent parfaitement aux valeurs que nous portons auprès de nos élèves et de leurs familles.",
                'contact_name' => 'Nadia Berrada',
                'contact_email' => 'nadia.berrada@yasmina-edu.ma',
                'contact_phone_number' => '+212 666 789 012',
                'age_range' => '13- 17',
                'number_of_users' => 180,
                'created_at' => now()->subDays(25),
                'updated_at' => now()->subDays(25),
            ],
            [
                'company_name' => 'Medina Digital SARL',
                'ice' => '002111222000099',
                'address' => '56, Boulevard Anfa, Casablanca',
                'phone_number' => '+212 522 456 789',
                'email' => 'hello@medina-digital.ma',
                'website' => 'www.medina-digital.ma',
                'legal_form' => 'Entreprise privée',
                'activity_field' => 'Marketing & Communication',
                'description' => "Startup en pleine croissance, nous cherchons à offrir à nos jeunes collaborateurs des programmes de développement personnel. Nous sommes particulièrement intéressés par les parcours liés à la créativité et à la gestion du stress.",
                'contact_name' => 'Omar Bennani',
                'contact_email' => 'omar.bennani@medina-digital.ma',
                'contact_phone_number' => '+212 667 890 123',
                'age_range' => '18- 25',
                'number_of_users' => 45,
                'created_at' => now()->subDays(33),
                'updated_at' => now()->subDays(33),
            ],
            [
                'company_name' => 'Groupe Hôtelier Sahara',
                'ice' => '003444555000088',
                'address' => '7, Avenue Al Massira, Agadir',
                'phone_number' => '+212 528 901 234',
                'email' => 'rh@sahara-hotels.ma',
                'website' => 'www.sahara-hotels.ma',
                'legal_form' => 'Entreprise privée',
                'activity_field' => 'Hôtellerie & Tourisme',
                'description' => "Dans un secteur où la relation humaine est centrale, nous souhaitons offrir à nos équipes des outils concrets pour développer leur intelligence émotionnelle et leur confiance en eux, ainsi qu'à leurs familles.",
                'contact_name' => 'Hicham Alaoui',
                'contact_email' => 'hicham.alaoui@sahara-hotels.ma',
                'contact_phone_number' => '+212 668 901 234',
                'age_range' => '26- 100',
                'number_of_users' => 210,
                'created_at' => now()->subDays(41),
                'updated_at' => now()->subDays(41),
            ],
            [
                'company_name' => 'Rif Énergies Renouvelables',
                'ice' => '003666777000077',
                'address' => '34, Rue Oued Fès, Nador',
                'phone_number' => '+212 536 012 345',
                'email' => 'contact@rif-energies.ma',
                'website' => 'www.rif-energies.ma',
                'legal_form' => 'Entreprise privée',
                'activity_field' => 'Énergies renouvelables',
                'description' => "Nous souhaitons proposer à nos techniciens et à leurs enfants des parcours de développement adaptés à leurs réalités locales. Le format EPANWE, à la fois souple et structuré, correspond à nos contraintes terrain.",
                'contact_name' => 'Fatima Zahra Cherkaoui',
                'contact_email' => 'fz.cherkaoui@rif-energies.ma',
                'contact_phone_number' => '+212 669 012 345',
                'age_range' => '8- 12',
                'number_of_users' => 90,
                'created_at' => now()->subDays(52),
                'updated_at' => now()->subDays(52),
            ],
            [
                'company_name' => 'Fondation Oasis pour la Jeunesse',
                'ice' => '003888999000066',
                'address' => '19, Rue Al Yamama, Oujda',
                'phone_number' => '+212 536 123 456',
                'email' => 'contact@fondation-oasis.ma',
                'website' => 'www.fondation-oasis.ma',
                'legal_form' => 'Association',
                'activity_field' => 'Social',
                'description' => "Notre fondation accompagne des jeunes en situation de vulnérabilité. Nous cherchons à leur offrir des parcours structurants qui renforcent l'estime de soi, l'autonomie et les compétences relationnelles.",
                'contact_name' => 'Rachid El Fassi',
                'contact_email' => 'rachid.elfassi@fondation-oasis.ma',
                'contact_phone_number' => '+212 670 123 456',
                'age_range' => '18- 25',
                'number_of_users' => 75,
                'created_at' => now()->subDays(64),
                'updated_at' => now()->subDays(64),
            ],
            [
                'company_name' => 'Clinique Ibn Rochd',
                'ice' => '004111222000055',
                'address' => '88, Avenue des FAR, Tanger',
                'phone_number' => '+212 539 234 567',
                'email' => 'direction@clinique-ibnrochd.ma',
                'website' => 'www.clinique-ibnrochd.ma',
                'legal_form' => 'Entreprise privée',
                'activity_field' => 'Sciences de la Santé',
                'description' => "Le personnel soignant est soumis à une charge émotionnelle importante. Nous souhaitons leur offrir, ainsi qu'à leurs familles, des programmes de développement personnel et de gestion du stress.",
                'contact_name' => 'Imane Sekkat',
                'contact_email' => 'imane.sekkat@clinique-ibnrochd.ma',
                'contact_phone_number' => '+212 671 234 567',
                'age_range' => '26- 100',
                'number_of_users' => 140,
                'created_at' => now()->subDays(78),
                'updated_at' => now()->subDays(78),
            ],
        ];

        foreach ($examples as $example) {
            PartnershipRequest::updateOrCreate(
                ['ice' => $example['ice']],
                $example,
            );
        }

        // Optional: fill the table with random requests so the table
        // isn't empty during development.
        $missing = 20 - PartnershipRequest::count();
        if ($missing > 0) {
            PartnershipRequest::factory()->count($missing)->create();
        }
    }
}
