<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationalCultureValueSeeder extends Seeder
{
    /**
     * Valores y aspectos que los candidatos buscan en la cultura organizacional
     */
    public function run(): void
    {
        $values = [
            [
                'name' => 'Innovación y creatividad',
                'name_en' => 'Innovation and Creativity',
                'description' => 'Entorno que fomenta la innovación, experimentación y pensamiento creativo.',
                'description_en' => 'Environment that fosters innovation, experimentation, and creative thinking.',
            ],
            [
                'name' => 'Equilibrio vida-trabajo',
                'name_en' => 'Work-Life Balance',
                'description' => 'Cultura que valora y promueve el balance entre vida personal y profesional.',
                'description_en' => 'Culture that values and promotes balance between personal and professional life.',
            ],
            [
                'name' => 'Desarrollo profesional',
                'name_en' => 'Professional Development',
                'description' => 'Oportunidades de crecimiento, capacitación y desarrollo de carrera.',
                'description_en' => 'Opportunities for growth, training, and career development.',
            ],
            [
                'name' => 'Diversidad e inclusión',
                'name_en' => 'Diversity and Inclusion',
                'description' => 'Ambiente que valora y respeta la diversidad en todas sus formas.',
                'description_en' => 'Environment that values and respects diversity in all its forms.',
            ],
            [
                'name' => 'Flexibilidad laboral',
                'name_en' => 'Work Flexibility',
                'description' => 'Opciones de trabajo remoto, horarios flexibles y adaptabilidad.',
                'description_en' => 'Remote work options, flexible schedules, and adaptability.',
            ],
            [
                'name' => 'Transparencia y comunicación abierta',
                'name_en' => 'Transparency and Open Communication',
                'description' => 'Cultura de comunicación honesta, directa y transparente en todos los niveles.',
                'description_en' => 'Culture of honest, direct, and transparent communication at all levels.',
            ],
            [
                'name' => 'Trabajo en equipo y colaboración',
                'name_en' => 'Teamwork and Collaboration',
                'description' => 'Ambiente que fomenta la colaboración, el trabajo en equipo y el apoyo mutuo.',
                'description_en' => 'Environment that fosters collaboration, teamwork, and mutual support.',
            ],
            [
                'name' => 'Autonomía y empoderamiento',
                'name_en' => 'Autonomy and Empowerment',
                'description' => 'Libertad para tomar decisiones y responsabilidad sobre el propio trabajo.',
                'description_en' => 'Freedom to make decisions and take responsibility for one\'s own work.',
            ],
            [
                'name' => 'Reconocimiento y recompensas',
                'name_en' => 'Recognition and Rewards',
                'description' => 'Sistema justo de reconocimiento de logros y compensación competitiva.',
                'description_en' => 'Fair system of achievement recognition and competitive compensation.',
            ],
            [
                'name' => 'Propósito y misión clara',
                'name_en' => 'Clear Purpose and Mission',
                'description' => 'Organización con propósito definido y compromiso con causas significativas.',
                'description_en' => 'Organization with defined purpose and commitment to meaningful causes.',
            ],
            [
                'name' => 'Ética e integridad',
                'name_en' => 'Ethics and Integrity',
                'description' => 'Compromiso con prácticas éticas, integridad y responsabilidad social.',
                'description_en' => 'Commitment to ethical practices, integrity, and social responsibility.',
            ],
            [
                'name' => 'Ambiente de confianza',
                'name_en' => 'Trust Environment',
                'description' => 'Cultura basada en la confianza mutua entre líderes y colaboradores.',
                'description_en' => 'Culture based on mutual trust between leaders and collaborators.',
            ],
            [
                'name' => 'Agilidad organizacional',
                'name_en' => 'Organizational Agility',
                'description' => 'Capacidad de adaptación rápida a cambios y toma de decisiones ágil.',
                'description_en' => 'Ability to quickly adapt to changes and make agile decisions.',
            ],
            [
                'name' => 'Bienestar y salud integral',
                'name_en' => 'Well-being and Integral Health',
                'description' => 'Preocupación por el bienestar físico, mental y emocional de los empleados.',
                'description_en' => 'Concern for the physical, mental, and emotional well-being of employees.',
            ],
            [
                'name' => 'Orientación a resultados',
                'name_en' => 'Results Orientation',
                'description' => 'Cultura enfocada en el logro de objetivos y la excelencia.',
                'description_en' => 'Culture focused on achieving objectives and excellence.',
            ],
            [
                'name' => 'Sustentabilidad y responsabilidad ambiental',
                'name_en' => 'Sustainability and Environmental Responsibility',
                'description' => 'Compromiso con prácticas sostenibles y cuidado del medio ambiente.',
                'description_en' => 'Commitment to sustainable practices and environmental care.',
            ],
            [
                'name' => 'Estabilidad y solidez',
                'name_en' => 'Stability and Soundness',
                'description' => 'Empresa con trayectoria sólida y estabilidad financiera.',
                'description_en' => 'Company with solid trajectory and financial stability.',
            ],
            [
                'name' => 'Ambiente dinámico y desafiante',
                'name_en' => 'Dynamic and Challenging Environment',
                'description' => 'Entorno que ofrece retos constantes y oportunidades de superación.',
                'description_en' => 'Environment that offers constant challenges and opportunities for improvement.',
            ],
            [
                'name' => 'Meritocracia',
                'name_en' => 'Meritocracy',
                'description' => 'Sistema basado en el mérito, donde el esfuerzo y resultados son reconocidos.',
                'description_en' => 'System based on merit, where effort and results are recognized.',
            ],
            [
                'name' => 'Tecnología de vanguardia',
                'name_en' => 'Cutting-edge Technology',
                'description' => 'Uso de tecnologías modernas y herramientas de última generación.',
                'description_en' => 'Use of modern technologies and state-of-the-art tools.',
            ],
            [
                'name' => 'Ambiente informal y relajado',
                'name_en' => 'Informal and Relaxed Environment',
                'description' => 'Cultura sin rigidez excesiva, con ambiente cómodo y casual.',
                'description_en' => 'Culture without excessive rigidity, with a comfortable and casual atmosphere.',
            ],
            [
                'name' => 'Liderazgo inspirador',
                'name_en' => 'Inspiring Leadership',
                'description' => 'Líderes que motivan, guían y sirven de ejemplo.',
                'description_en' => 'Leaders who motivate, guide, and serve as examples.',
            ],
            [
                'name' => 'Retroalimentación continua',
                'name_en' => 'Continuous Feedback',
                'description' => 'Cultura de feedback constante para el mejoramiento continuo.',
                'description_en' => 'Culture of constant feedback for continuous improvement.',
            ],
            [
                'name' => 'Internacionalización',
                'name_en' => 'Internationalization',
                'description' => 'Oportunidades de proyectos internacionales y exposición global.',
                'description_en' => 'Opportunities for international projects and global exposure.',
            ],
            [
                'name' => 'Bajo nivel de burocracia',
                'name_en' => 'Low Level of Bureaucracy',
                'description' => 'Procesos simples, menos jerarquías y decisiones ágiles.',
                'description_en' => 'Simple processes, fewer hierarchies, and agile decisions.',
            ],
        ];

        foreach ($values as $value) {
            DB::table('organizational_culture_values')->insert([
                'name' => $value['name'],
                'name_en' => $value['name_en'],
                'description' => $value['description'],
                'description_en' => $value['description_en'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
