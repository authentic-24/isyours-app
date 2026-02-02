<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BehavioralCompetencySeeder extends Seeder
{
    /**
     * Competencias comportamentales basadas en el modelo de Martha Alles
     * Incluye competencias cardinales, específicas gerenciales y ejecutivas
     */
    public function run(): void
    {
        $competencies = [
            // COMPETENCIAS CARDINALES (para todos los niveles)
            [
                'name' => 'Integridad',
                'name_en' => 'Integrity',
                'description' => 'Actuar en consonancia con lo que se dice o considera importante. Incluye comunicar las intenciones, ideas y sentimientos abierta y directamente.',
                'description_en' => 'Acting in accordance with what is said or considered important. Includes openly and directly communicating intentions, ideas, and feelings.',
                'category' => 'cardinal',
            ],
            [
                'name' => 'Prudencia',
                'name_en' => 'Prudence',
                'description' => 'Sensatez y moderación en todos los actos, en la aplicación de normas y políticas de la organización sabiendo discernir lo bueno y lo malo.',
                'description_en' => 'Sensibility and moderation in all actions, in the application of organizational rules and policies, knowing how to discern between good and bad.',
                'category' => 'cardinal',
            ],
            [
                'name' => 'Justicia',
                'name_en' => 'Justice',
                'description' => 'Actuar con equidad en todos los casos, velando por los intereses de todos por igual.',
                'description_en' => 'Acting with equity in all cases, looking after everyone\'s interests equally.',
                'category' => 'cardinal',
            ],
            [
                'name' => 'Fortaleza',
                'name_en' => 'Fortitude',
                'description' => 'Firmeza ante las adversidades y problemas. Implica tener una sana resistencia y valentía para enfrentar riesgos y perseverar en las ideas.',
                'description_en' => 'Firmness in the face of adversity and problems. Implies having healthy resistance and courage to face risks and persevere in ideas.',
                'category' => 'cardinal',
            ],
            [
                'name' => 'Orientación al cliente',
                'name_en' => 'Customer Orientation',
                'description' => 'Implica el deseo de ayudar o servir a los clientes, de comprender y satisfacer sus necesidades. Implica esforzarse por conocer y resolver los problemas del cliente.',
                'description_en' => 'Implies the desire to help or serve customers, to understand and satisfy their needs. Implies striving to know and resolve customer problems.',
                'category' => 'cardinal',
            ],
            [
                'name' => 'Orientación a los resultados',
                'name_en' => 'Results Orientation',
                'description' => 'Es la capacidad de encaminar todos los actos al logro de lo esperado, actuando con velocidad y sentido de urgencia ante decisiones importantes.',
                'description_en' => 'The ability to direct all actions toward achieving what is expected, acting with speed and a sense of urgency in important decisions.',
                'category' => 'cardinal',
            ],
            [
                'name' => 'Calidad del trabajo',
                'name_en' => 'Quality of Work',
                'description' => 'Implica tener amplios conocimientos en los temas del área que esté bajo su responsabilidad. Poseer la capacidad de comprender la esencia de los aspectos complejos.',
                'description_en' => 'Implies having extensive knowledge in the topics of the area under one\'s responsibility. Possessing the ability to understand the essence of complex aspects.',
                'category' => 'cardinal',
            ],
            [
                'name' => 'Sencillez',
                'name_en' => 'Simplicity',
                'description' => 'Se refiere a generar vínculos llanos, sin estridencias. Implica capacidad de manejarse con naturalidad en todos los niveles.',
                'description_en' => 'Refers to generating plain connections, without stridency. Implies the ability to behave naturally at all levels.',
                'category' => 'cardinal',
            ],
            [
                'name' => 'Adaptabilidad al cambio',
                'name_en' => 'Adaptability to Change',
                'description' => 'Es la capacidad para adaptarse y amoldarse a los cambios. Hace referencia a la capacidad de modificar la propia conducta para alcanzar determinados objetivos.',
                'description_en' => 'The ability to adapt and adjust to changes. Refers to the capacity to modify one\'s own behavior to achieve certain objectives.',
                'category' => 'cardinal',
            ],
            [
                'name' => 'Temple',
                'name_en' => 'Temperament',
                'description' => 'Serenidad y dominio en todas las circunstancias. Implica ser firme, seguro, perseverante e imparcial en el trato con las personas y problemas.',
                'description_en' => 'Serenity and mastery in all circumstances. Implies being firm, confident, persevering, and impartial in dealing with people and problems.',
                'category' => 'cardinal',
            ],
            [
                'name' => 'Perseverancia',
                'name_en' => 'Perseverance',
                'description' => 'Firmeza y constancia en la ejecución de los propósitos. Es la predisposición a mantenerse firme y constante en la prosecución de acciones y emprendimientos.',
                'description_en' => 'Firmness and constancy in the execution of purposes. It is the predisposition to remain firm and constant in pursuing actions and endeavors.',
                'category' => 'cardinal',
            ],
            [
                'name' => 'Responsabilidad',
                'name_en' => 'Responsibility',
                'description' => 'Está asociada al compromiso con que las personas realizan las tareas encomendadas. Su preocupación por el cumplimiento de lo asignado está por encima de sus propios intereses.',
                'description_en' => 'Associated with the commitment with which people carry out assigned tasks. Their concern for fulfilling what is assigned is above their own interests.',
                'category' => 'cardinal',
            ],

            // COMPETENCIAS ESPECÍFICAS GERENCIALES
            [
                'name' => 'Liderazgo',
                'name_en' => 'Leadership',
                'description' => 'Es la habilidad necesaria para orientar la acción de los grupos humanos en una dirección determinada, inspirando valores de acción y anticipando escenarios.',
                'description_en' => 'The necessary skill to guide the action of human groups in a specific direction, inspiring action values and anticipating scenarios.',
                'category' => 'specific',
            ],
            [
                'name' => 'Empowerment (Empoderamiento)',
                'name_en' => 'Empowerment',
                'description' => 'Establece claros objetivos de desempeño y las correspondientes responsabilidades personales. Proporciona dirección y define responsabilidades.',
                'description_en' => 'Establishes clear performance objectives and corresponding personal responsibilities. Provides direction and defines responsibilities.',
                'category' => 'specific',
            ],
            [
                'name' => 'Iniciativa - Autonomía',
                'name_en' => 'Initiative - Autonomy',
                'description' => 'Es la predisposición a actuar proactivamente y a pensar no sólo en lo que hay que hacer en el futuro. Los niveles de actuación van desde concretar decisiones tomadas en el pasado hasta la búsqueda de nuevas oportunidades.',
                'description_en' => 'The predisposition to act proactively and think not only about what needs to be done in the future. Action levels range from implementing past decisions to seeking new opportunities.',
                'category' => 'specific',
            ],
            [
                'name' => 'Visión estratégica',
                'name_en' => 'Strategic Vision',
                'description' => 'Es la habilidad para anticipar cambios, evaluar el impacto que tendrán en la organización y planificar en función de ellos.',
                'description_en' => 'The ability to anticipate changes, evaluate their impact on the organization, and plan accordingly.',
                'category' => 'specific',
            ],
            [
                'name' => 'Desarrollo de relaciones',
                'name_en' => 'Relationship Development',
                'description' => 'Actuar para establecer y mantener relaciones cordiales, recíprocas y cálidas o redes de contactos con distintas personas.',
                'description_en' => 'Acting to establish and maintain cordial, reciprocal, and warm relationships or networks of contacts with different people.',
                'category' => 'specific',
            ],
            [
                'name' => 'Influencia',
                'name_en' => 'Influence',
                'description' => 'Deseo de producir un impacto o efecto determinado sobre los demás, persuadir, convencer, influir o impresionar, con el propósito de que lleven a cabo sus planes.',
                'description_en' => 'Desire to produce a specific impact or effect on others, to persuade, convince, influence or impress, with the purpose of having them carry out plans.',
                'category' => 'specific',
            ],
            [
                'name' => 'Trabajo en equipo',
                'name_en' => 'Teamwork',
                'description' => 'Implica la capacidad de colaborar y cooperar con los demás, de formar parte de un grupo y de trabajar juntos.',
                'description_en' => 'Implies the ability to collaborate and cooperate with others, to be part of a group and work together.',
                'category' => 'specific',
            ],
            [
                'name' => 'Modalidades de contacto',
                'name_en' => 'Contact Modalities',
                'description' => 'Se trata de la habilidad para demostrar una sólida habilidad de comunicación y asegurar una comunicación clara.',
                'description_en' => 'The skill to demonstrate solid communication abilities and ensure clear communication.',
                'category' => 'specific',
            ],
            [
                'name' => 'Dinamismo - Energía',
                'name_en' => 'Dynamism - Energy',
                'description' => 'Se trata de la habilidad para trabajar duro en situaciones cambiantes o alternativas, con interlocutores muy diversos, que cambian en cortos espacios de tiempo.',
                'description_en' => 'The skill to work hard in changing or alternative situations, with very diverse interlocutors who change in short periods of time.',
                'category' => 'specific',
            ],
            [
                'name' => 'Capacidad de planificación y organización',
                'name_en' => 'Planning and Organizational Capacity',
                'description' => 'Es la capacidad de determinar eficazmente las metas y prioridades de su tarea, área o proyecto estipulando la acción, los plazos y los recursos requeridos.',
                'description_en' => 'The capacity to effectively determine the goals and priorities of one\'s task, area, or project by stipulating the action, deadlines, and required resources.',
                'category' => 'specific',
            ],
            [
                'name' => 'Coaching',
                'name_en' => 'Coaching',
                'description' => 'Es la habilidad de ayudar al desarrollo de los colaboradores, transfiriendo conocimientos y experiencias.',
                'description_en' => 'The skill to help develop collaborators by transferring knowledge and experiences.',
                'category' => 'specific',
            ],
            [
                'name' => 'Desarrollo de equipos',
                'name_en' => 'Team Development',
                'description' => 'Implica la capacidad de consolidar un equipo logrando que todos los miembros se comprometan con el propósito común.',
                'description_en' => 'Implies the capacity to consolidate a team by getting all members to commit to a common purpose.',
                'category' => 'specific',
            ],
            [
                'name' => 'Pensamiento analítico',
                'name_en' => 'Analytical Thinking',
                'description' => 'Es la capacidad de entender una situación, dividiéndola en pequeñas partes o identificando sus implicaciones paso a paso.',
                'description_en' => 'The capacity to understand a situation by breaking it down into small parts or identifying its implications step by step.',
                'category' => 'specific',
            ],
            [
                'name' => 'Pensamiento conceptual',
                'name_en' => 'Conceptual Thinking',
                'description' => 'Es la habilidad para identificar vínculos entre situaciones que no están obviamente conectadas y construir conceptos o modelos.',
                'description_en' => 'The skill to identify links between situations that are not obviously connected and build concepts or models.',
                'category' => 'specific',
            ],
            [
                'name' => 'Innovación',
                'name_en' => 'Innovation',
                'description' => 'Es la capacidad para modificar las cosas incluso partiendo de formas o situaciones no pensadas con anterioridad.',
                'description_en' => 'The capacity to modify things even starting from forms or situations not previously thought of.',
                'category' => 'specific',
            ],
            [
                'name' => 'Flexibilidad',
                'name_en' => 'Flexibility',
                'description' => 'Disposición para adaptarse fácilmente. Es la capacidad para trabajar con eficacia en situaciones variadas y con personas o grupos diversos.',
                'description_en' => 'Disposition to adapt easily. The capacity to work effectively in varied situations and with diverse people or groups.',
                'category' => 'specific',
            ],
            [
                'name' => 'Autocontrol',
                'name_en' => 'Self-Control',
                'description' => 'Es la capacidad para controlar las emociones personales y evitar las reacciones negativas ante provocaciones, oposición u hostilidad de los demás.',
                'description_en' => 'The capacity to control personal emotions and avoid negative reactions to provocations, opposition, or hostility from others.',
                'category' => 'specific',
            ],
            [
                'name' => 'Búsqueda de información',
                'name_en' => 'Information Seeking',
                'description' => 'Es la inquietud y la curiosidad constante por saber más sobre las cosas, los hechos o las personas. Implica buscar información más allá de las preguntas rutinarias.',
                'description_en' => 'The constant concern and curiosity to know more about things, facts, or people. Implies seeking information beyond routine questions.',
                'category' => 'specific',
            ],
            [
                'name' => 'Conciencia organizacional',
                'name_en' => 'Organizational Awareness',
                'description' => 'Es la capacidad para comprender e interpretar las relaciones de poder en la propia empresa o en otras organizaciones, clientes, proveedores, etc.',
                'description_en' => 'The capacity to understand and interpret power relationships in one\'s own company or in other organizations, clients, suppliers, etc.',
                'category' => 'specific',
            ],
            [
                'name' => 'Construcción de relaciones de negocio',
                'name_en' => 'Business Relationship Building',
                'description' => 'Habilidad de establecer, mantener y fortalecer vínculos con personas o instituciones clave.',
                'description_en' => 'The skill to establish, maintain, and strengthen ties with key people or institutions.',
                'category' => 'specific',
            ],
            [
                'name' => 'Conocimientos técnicos',
                'name_en' => 'Technical Knowledge',
                'description' => 'Es el conjunto de conocimientos y experiencias en una disciplina o área específica.',
                'description_en' => 'The set of knowledge and experience in a specific discipline or area.',
                'category' => 'technical',
            ],
            [
                'name' => 'Credibilidad técnica',
                'name_en' => 'Technical Credibility',
                'description' => 'Capacidad de generar credibilidad en los demás en relación con los conocimientos técnicos que se poseen.',
                'description_en' => 'The capacity to generate credibility in others regarding the technical knowledge one possesses.',
                'category' => 'technical',
            ],
            [
                'name' => 'Entrepreneurial',
                'name_en' => 'Entrepreneurial',
                'description' => 'Preferir asumir riesgos calculados y establecer objetivos desafiantes. Estar dispuesto a trabajar solo cuando sea necesario.',
                'description_en' => 'Preferring to take calculated risks and set challenging objectives. Being willing to work alone when necessary.',
                'category' => 'specific',
            ],
        ];

        foreach ($competencies as $competency) {
            DB::table('behavioral_competencies')->insert([
                'name' => $competency['name'],
                'name_en' => $competency['name_en'],
                'description' => $competency['description'],
                'description_en' => $competency['description_en'],
                'category' => $competency['category'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
