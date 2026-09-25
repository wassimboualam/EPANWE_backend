<?php

namespace Database\Factories;

use App\Models\PartnershipRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PartnershipRequest>
 */
class PartnershipRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $legalForms = [
            'Entreprise privée',
            'Association',
            'Coopérative',
            'Personne physique',
            'Institution publique',
        ];

        $activityFields = [
            'Achats & Approvisionnement',
            'Art & Design',
            'Banque & Assurance',
            'Biologie & Agroalimentaire',
            'BTP et Construction',
            'Commerce & Vente',
            'Comptabilité, Audit & Finance',
            'Droit & Justice',
            'Édition & Journalisme',
            'Éducation',
            'Électrique',
            'Énergies renouvelables',
            'Fonction Publique',
            'Gestion & Organisation',
            'Hôtellerie & Tourisme',
            "Informatique & Système d'information",
            'Intelligence économique',
            'Social',
            'Marketing & Communication',
            'Mécanique',
            'Mode',
            'Production & Industrialisation',
            'Qualité & Sécurité',
            'Recherche & Développement',
            'Réseau & Télécom',
            'Ressources Humaines',
            'Sciences de la Santé',
            'Sport',
        ];

        $ageRanges = ['8- 12', '13- 17', '18- 25', '26- 100'];

        $companyPrefixes = [
            'Groupe',
            'Société',
            'Coopérative',
            'Association',
            'Fondation',
            'Atlas',
            'Anfa',
            'Chaouen',
            'Sahara',
            'Medina',
            'Rif',
            'Kasbah',
            'Marrakech',
            'Oasis',
            'Zellige',
            'Tanger',
            'Fès',
        ];

        $companySuffixes = [
            'Industries',
            'Solutions',
            'Services',
            'Logistics',
            'Trading',
            'Consulting',
            'Technologies',
            'Group',
            'Holding',
            'Énergies',
            'Formation',
            'Développement',
            'Investissement',
            'Sports',
            'Éducation',
            'Média',
            'Digital',
            'Maritime',
        ];

        $cities = [
            'Casablanca',
            'Rabat',
            'Marrakech',
            'Tanger',
            'Fès',
            'Agadir',
            'Meknès',
            'Oujda',
            'Kénitra',
            'Tétouan',
            'Salé',
            'Mohammedia',
            'El Jadida',
            'Nador',
            'Béni Mellal',
        ];

        $streets = [
            'Boulevard Mohammed V',
            'Avenue Hassan II',
            'Boulevard Abdelmoumen',
            'Avenue des FAR',
            'Rue Ibn Sina',
            'Boulevard Zerktouni',
            'Avenue Al Massira',
            'Rue Al Yamama',
            'Boulevard Anfa',
            'Rue Oued Fès',
        ];

        $companyName = $this->faker->randomElement($companyPrefixes)
            . ' ' . $this->faker->unique()->word()
            . ' ' . $this->faker->randomElement($companySuffixes);

        $firstName = $this->faker->firstName();
        $lastName = $this->faker->lastName();

        $domain = strtolower(preg_replace('/[^a-z0-9]+/i', '', $companyName)) . '.ma';

        return [
            'company_name' => $companyName,
            'ice' => (string) $this->faker->unique()->numerify('################'),

            'address' => sprintf(
                '%s, %s, %s',
                $this->faker->numberBetween(1, 999),
                $this->faker->randomElement($streets),
                $this->faker->randomElement($cities),
            ),

            'phone_number' => '+212 ' . $this->faker->numerify('6## ### ###'),
            'email' => 'contact@' . $domain,

            'website' => $this->faker->boolean(75) ? 'www.' . $domain : null,

            'legal_form' => $this->faker->randomElement($legalForms),
            'activity_field' => $this->faker->randomElement($activityFields),

            'description' => $this->faker->randomElement([
                "Notre organisation souhaite collaborer avec EPANWE afin d'offrir à ses collaborateurs et à leurs familles un accès à des programmes de développement personnel adaptés à tous les âges.",
                "En tant qu'acteur engagé dans l'éducation et la formation, nous souhaitons offrir à nos bénéficiaires un accompagnement de qualité à travers les programmes EPANWE.",
                "Nous souhaitons intégrer les programmes EPANWE dans notre offre sociale afin de renforcer l'épanouissement personnel et professionnel de nos équipes.",
                "Notre coopérative travaille avec des jeunes issus de milieux ruraux et souhaite leur offrir des opportunités de développement et d'insertion professionnelle.",
                "Notre association milite pour l'inclusion sociale des jeunes et souhaite s'appuyer sur l'expertise d'EPANWE pour élargir son impact.",
                "Nous sommes une institution publique engagée dans la formation continue et souhaitons proposer les parcours EPANWE à nos agents et à leurs proches.",
                "Dans le cadre de notre politique RSE, nous souhaitons offrir à nos collaborateurs et à leurs enfants un accès à des programmes éducatifs, sportifs et culturels de qualité.",
                "Notre entreprise souhaite investir dans le développement des compétences de ses équipes et de leurs familles à travers les parcours proposés par EPANWE.",
            ]),

            'contact_name' => $firstName . ' ' . $lastName,
            'contact_email' => strtolower($firstName . '.' . $lastName) . '@' . $domain,
            'contact_phone_number' => '+212 ' . $this->faker->numerify('6## ### ###'),

            'age_range' => $this->faker->randomElement($ageRanges),
            'number_of_users' => $this->faker->numberBetween(5, 500),

            'created_at' => $this->faker->dateTimeBetween('-4 months', 'now'),
            'updated_at' => now(),
        ];
    }
}
