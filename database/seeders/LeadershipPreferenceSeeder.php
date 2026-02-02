<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadershipPreferenceSeeder extends Seeder
{
    /**
     * Características y estilos de liderazgo que los candidatos valoran
     */
    public function run(): void
    {
        $preferences = [
            [
                'name' => 'Liderazgo transformacional',
                'name_en' => 'Transformational Leadership',
                'description' => 'Líder que inspira, motiva y transforma a su equipo hacia la excelencia.',
                'description_en' => 'Leader who inspires, motivates, and transforms their team toward excellence.',
            ],
            [
                'name' => 'Liderazgo servidor',
                'name_en' => 'Servant Leadership',
                'description' => 'Líder que prioriza las necesidades del equipo y les ayuda a desarrollarse.',
                'description_en' => 'Leader who prioritizes the team\'s needs and helps them develop.',
            ],
            [
                'name' => 'Liderazgo participativo',
                'name_en' => 'Participative Leadership',
                'description' => 'Líder que involucra al equipo en la toma de decisiones y valora sus opiniones.',
                'description_en' => 'Leader who involves the team in decision-making and values their opinions.',
            ],
            [
                'name' => 'Comunicador efectivo',
                'name_en' => 'Effective Communicator',
                'description' => 'Líder que comunica clara, frecuente y honestamente.',
                'description_en' => 'Leader who communicates clearly, frequently, and honestly.',
            ],
            [
                'name' => 'Visionario estratégico',
                'name_en' => 'Strategic Visionary',
                'description' => 'Líder con visión clara del futuro y capacidad de diseñar estrategias.',
                'description_en' => 'Leader with a clear vision of the future and ability to design strategies.',
            ],
            [
                'name' => 'Empático y humano',
                'name_en' => 'Empathetic and Human',
                'description' => 'Líder que demuestra empatía, comprensión y conexión genuina con su equipo.',
                'description_en' => 'Leader who demonstrates empathy, understanding, and genuine connection with their team.',
            ],
            [
                'name' => 'Coach y mentor',
                'name_en' => 'Coach and Mentor',
                'description' => 'Líder que desarrolla talentos, capacita y acompaña el crecimiento profesional.',
                'description_en' => 'Leader who develops talents, trains, and accompanies professional growth.',
            ],
            [
                'name' => 'Decisivo y resolutivo',
                'name_en' => 'Decisive and Resolute',
                'description' => 'Líder capaz de tomar decisiones difíciles de manera oportuna y efectiva.',
                'description_en' => 'Leader capable of making difficult decisions in a timely and effective manner.',
            ],
            [
                'name' => 'Íntegro y ético',
                'name_en' => 'Upright and Ethical',
                'description' => 'Líder que actúa con integridad, transparencia y valores sólidos.',
                'description_en' => 'Leader who acts with integrity, transparency, and solid values.',
            ],
            [
                'name' => 'Confiable y accesible',
                'name_en' => 'Trustworthy and Accessible',
                'description' => 'Líder en quien se puede confiar y que está disponible para su equipo.',
                'description_en' => 'Leader who can be trusted and is available to their team.',
            ],
            [
                'name' => 'Promotor de la autonomía',
                'name_en' => 'Promoter of Autonomy',
                'description' => 'Líder que empodera, delega y confía en las capacidades del equipo.',
                'description_en' => 'Leader who empowers, delegates, and trusts in the team\'s capabilities.',
            ],
            [
                'name' => 'Orientado al desarrollo',
                'name_en' => 'Development-Oriented',
                'description' => 'Líder comprometido con el crecimiento y aprendizaje continuo del equipo.',
                'description_en' => 'Leader committed to the team\'s continuous growth and learning.',
            ],
            [
                'name' => 'Reconocedor de logros',
                'name_en' => 'Achievement Recognizer',
                'description' => 'Líder que celebra éxitos y reconoce los esfuerzos del equipo.',
                'description_en' => 'Leader who celebrates successes and recognizes the team\'s efforts.',
            ],
            [
                'name' => 'Adaptable al cambio',
                'name_en' => 'Adaptable to Change',
                'description' => 'Líder flexible que navega cambios con agilidad y ayuda al equipo a adaptarse.',
                'description_en' => 'Flexible leader who navigates changes with agility and helps the team adapt.',
            ],
            [
                'name' => 'Innovador y creativo',
                'name_en' => 'Innovative and Creative',
                'description' => 'Líder que fomenta la innovación, creatividad y experimentación.',
                'description_en' => 'Leader who fosters innovation, creativity, and experimentation.',
            ],
            [
                'name' => 'Justo y equitativo',
                'name_en' => 'Fair and Equitable',
                'description' => 'Líder que trata a todos con equidad y toma decisiones imparciales.',
                'description_en' => 'Leader who treats everyone fairly and makes impartial decisions.',
            ],
            [
                'name' => 'Técnicamente competente',
                'name_en' => 'Technically Competent',
                'description' => 'Líder con conocimientos técnicos sólidos y credibilidad profesional.',
                'description_en' => 'Leader with solid technical knowledge and professional credibility.',
            ],
            [
                'name' => 'Resiliente bajo presión',
                'name_en' => 'Resilient Under Pressure',
                'description' => 'Líder que mantiene la calma, claridad y efectividad en situaciones difíciles.',
                'description_en' => 'Leader who maintains calm, clarity, and effectiveness in difficult situations.',
            ],
            [
                'name' => 'Constructor de equipos',
                'name_en' => 'Team Builder',
                'description' => 'Líder que forma equipos cohesionados, colaborativos y de alto rendimiento.',
                'description_en' => 'Leader who forms cohesive, collaborative, and high-performing teams.',
            ],
            [
                'name' => 'Orientado a resultados',
                'name_en' => 'Results-Oriented',
                'description' => 'Líder enfocado en el logro de objetivos sin perder de vista el bienestar del equipo.',
                'description_en' => 'Leader focused on achieving objectives without losing sight of team well-being.',
            ],
            [
                'name' => 'Promotor de la diversidad',
                'name_en' => 'Diversity Promoter',
                'description' => 'Líder que valora y fomenta la diversidad e inclusión en todas sus formas.',
                'description_en' => 'Leader who values and promotes diversity and inclusion in all its forms.',
            ],
            [
                'name' => 'Feedback constructivo',
                'name_en' => 'Constructive Feedback',
                'description' => 'Líder que proporciona retroalimentación honesta, específica y orientada al crecimiento.',
                'description_en' => 'Leader who provides honest, specific, and growth-oriented feedback.',
            ],
            [
                'name' => 'Humilde y aprendiz',
                'name_en' => 'Humble and Learner',
                'description' => 'Líder que reconoce que no lo sabe todo y está dispuesto a aprender.',
                'description_en' => 'Leader who recognizes they don\'t know everything and is willing to learn.',
            ],
            [
                'name' => 'Energético y entusiasta',
                'name_en' => 'Energetic and Enthusiastic',
                'description' => 'Líder con energía positiva que motiva e inspira con su actitud.',
                'description_en' => 'Leader with positive energy who motivates and inspires with their attitude.',
            ],
            [
                'name' => 'Protector del equipo',
                'name_en' => 'Team Protector',
                'description' => 'Líder que defiende los intereses del equipo y crea un ambiente seguro.',
                'description_en' => 'Leader who defends the team\'s interests and creates a safe environment.',
            ],
        ];

        foreach ($preferences as $preference) {
            DB::table('leadership_preferences')->insert([
                'name' => $preference['name'],
                'name_en' => $preference['name_en'],
                'description' => $preference['description'],
                'description_en' => $preference['description_en'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
