<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\BehavioralCompetency;
use App\Models\PowerSkill;
use App\Models\OrganizationalCultureValue;
use App\Models\LeadershipPreference;

class EnglishTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Starting English translations seeding...');

        $this->seedBehavioralCompetencies();
        $this->seedPowerSkills();
        $this->seedOrganizationalCultureValues();
        $this->seedLeadershipPreferences();

        $this->command->info('English translations completed successfully!');
    }

    private function seedBehavioralCompetencies(): void
    {
        $this->command->info('Updating Behavioral Competencies...');

        $translations = $this->getBehavioralCompetenciesTranslations();

        foreach ($translations as $spanishName => $translation) {
            $updated = BehavioralCompetency::where('name', $spanishName)->update([
                'name_en' => $translation['name'],
                'description_en' => $translation['description']
            ]);

            if ($updated) {
                $this->command->line("  ✓ {$spanishName} → {$translation['name']}");
            }
        }
    }

    private function seedPowerSkills(): void
    {
        $this->command->info('Updating Power Skills...');

        $translations = $this->getPowerSkillsTranslations();

        foreach ($translations as $spanishName => $translation) {
            $updated = PowerSkill::where('name', $spanishName)->update([
                'name_en' => $translation['name'],
                'description_en' => $translation['description']
            ]);

            if ($updated) {
                $this->command->line("  ✓ {$spanishName} → {$translation['name']}");
            }
        }
    }

    private function seedOrganizationalCultureValues(): void
    {
        $this->command->info('Updating Organizational Culture Values...');

        $translations = $this->getOrganizationalCultureValuesTranslations();

        foreach ($translations as $spanishName => $translation) {
            $updated = OrganizationalCultureValue::where('name', $spanishName)->update([
                'name_en' => $translation['name'],
                'description_en' => $translation['description']
            ]);

            if ($updated) {
                $this->command->line("  ✓ {$spanishName} → {$translation['name']}");
            }
        }
    }

    private function seedLeadershipPreferences(): void
    {
        $this->command->info('Updating Leadership Preferences...');

        $translations = $this->getLeadershipPreferencesTranslations();

        foreach ($translations as $spanishName => $translation) {
            $updated = LeadershipPreference::where('name', $spanishName)->update([
                'name_en' => $translation['name'],
                'description_en' => $translation['description']
            ]);

            if ($updated) {
                $this->command->line("  ✓ {$spanishName} → {$translation['name']}");
            }
        }
    }

    private function getBehavioralCompetenciesTranslations(): array
    {
        return [
            'Adaptabilidad al cambio' => [
                'name' => 'Adaptability to Change',
                'description' => 'The ability to adapt and adjust to changes. It refers to the ability to modify one\'s own behavior to achieve certain objectives.'
            ],
            'Compromiso' => [
                'name' => 'Commitment',
                'description' => 'Feeling and acting with a deep sense of responsibility towards one\'s own obligations. Includes commitment to the organization, colleagues, and clients.'
            ],
            'Ética' => [
                'name' => 'Ethics',
                'description' => 'Ability to act according to norms and moral values. Includes integrity, honesty, and consistency between what is said and done.'
            ],
            'Orientación al cliente' => [
                'name' => 'Customer Orientation',
                'description' => 'Willingness to help or serve clients, understanding and satisfying their needs. Going beyond the request to anticipate future needs.'
            ],
            'Orientación a resultados' => [
                'name' => 'Results Orientation',
                'description' => 'Ability to guide all actions towards achieving expected results, meeting or exceeding quality and timeliness standards.'
            ],
            'Calidad del trabajo' => [
                'name' => 'Quality of Work',
                'description' => 'Excellence in work, desire to do things well, seeking accuracy and perfection. Taking responsibility for errors and learning from them.'
            ],
            'Sencillez' => [
                'name' => 'Simplicity',
                'description' => 'Generating trust through honesty and authenticity. Being humble, accessible, and straightforward in relationships.'
            ],
            'Liderazgo' => [
                'name' => 'Leadership',
                'description' => 'Ability to guide and direct a group towards achieving objectives. Motivating, inspiring, and generating commitment in others.'
            ],
            'Desarrollo de personas' => [
                'name' => 'People Development',
                'description' => 'Ability to identify and develop the potential of collaborators. Providing feedback, training, and growth opportunities.'
            ],
            'Trabajo en equipo' => [
                'name' => 'Teamwork',
                'description' => 'Ability to collaborate with others towards a common goal. Cooperating, sharing information, and supporting colleagues.'
            ],
            'Modalidades de contacto' => [
                'name' => 'Contact Modalities',
                'description' => 'Ability to establish relationships with others and maintain effective networks of contacts. Interpersonal skills and empathy.'
            ],
            'Pensamiento estratégico' => [
                'name' => 'Strategic Thinking',
                'description' => 'Ability to understand environmental changes, competitive opportunities, and organizational strengths and weaknesses.'
            ],
            'Empowerment' => [
                'name' => 'Empowerment',
                'description' => 'Ability to delegate authority and empower collaborators to make decisions. Trust in the capabilities of others.'
            ],
            'Visión de negocio' => [
                'name' => 'Business Vision',
                'description' => 'Ability to understand the business, its market, competition, and trends. Identifying opportunities and risks.'
            ],
            'Capacidad de planificación' => [
                'name' => 'Planning Capacity',
                'description' => 'Ability to determine goals and priorities, establishing action plans and resource allocation.'
            ],
            'Habilidad analítica' => [
                'name' => 'Analytical Skills',
                'description' => 'Ability to understand situations by breaking them down into parts. Identifying relationships and drawing conclusions.'
            ],
            'Iniciativa' => [
                'name' => 'Initiative',
                'description' => 'Acting proactively. Proposing improvements and taking responsibility beyond what is required.'
            ],
            'Innovación' => [
                'name' => 'Innovation',
                'description' => 'Ability to generate new ideas and creative solutions. Challenging the status quo and proposing improvements.'
            ],
            'Flexibilidad' => [
                'name' => 'Flexibility',
                'description' => 'Ability to adapt to different situations and people. Modifying one\'s own behavior to achieve objectives.'
            ],
            'Capacidad de análisis' => [
                'name' => 'Analytical Capacity',
                'description' => 'Ability to analyze information, identify patterns, and draw logical conclusions. Critical thinking.'
            ],
            'Negociación' => [
                'name' => 'Negotiation',
                'description' => 'Ability to reach mutually beneficial agreements. Persuading and generating commitment in others.'
            ],
            'Comunicación' => [
                'name' => 'Communication',
                'description' => 'Ability to listen, understand, and express ideas clearly and effectively. Adapting communication to the audience.'
            ],
            'Toma de decisiones' => [
                'name' => 'Decision Making',
                'description' => 'Ability to choose the best alternative among several options. Making timely decisions based on information analysis.'
            ],
            'Resolución de problemas' => [
                'name' => 'Problem Solving',
                'description' => 'Ability to identify problems, analyze their causes, and implement effective solutions.'
            ],
            'Gestión del tiempo' => [
                'name' => 'Time Management',
                'description' => 'Ability to organize and prioritize tasks efficiently. Meeting deadlines and optimizing the use of time.'
            ],
            'Proactividad' => [
                'name' => 'Proactivity',
                'description' => 'Taking initiative and anticipating situations. Acting before problems arise and seeking continuous improvement.'
            ],
            'Creatividad' => [
                'name' => 'Creativity',
                'description' => 'Ability to generate original and innovative ideas. Thinking outside the box and proposing new solutions.'
            ],
            'Inteligencia emocional' => [
                'name' => 'Emotional Intelligence',
                'description' => 'Ability to recognize, understand, and manage one\'s own emotions and those of others. Empathy and self-control.'
            ],
            'Resiliencia' => [
                'name' => 'Resilience',
                'description' => 'Ability to recover from adversity and adapt to difficult situations. Maintaining optimism and motivation.'
            ],
            'Gestión del cambio' => [
                'name' => 'Change Management',
                'description' => 'Ability to lead and facilitate organizational change processes. Overcoming resistance and generating commitment.'
            ],
            'Influencia' => [
                'name' => 'Influence',
                'description' => 'Ability to persuade and generate impact on others. Obtaining support and commitment to ideas and projects.'
            ],
            'Delegación' => [
                'name' => 'Delegation',
                'description' => 'Ability to assign tasks and responsibilities to others. Trusting in the capabilities of collaborators.'
            ],
            'Coaching' => [
                'name' => 'Coaching',
                'description' => 'Ability to guide and develop the potential of others. Providing feedback and facilitating learning.'
            ],
            'Dirección de equipos' => [
                'name' => 'Team Direction',
                'description' => 'Ability to coordinate and guide work teams towards achieving common objectives.'
            ],
            'Orientación al logro' => [
                'name' => 'Achievement Orientation',
                'description' => 'Drive to excel and achieve goals. Setting challenging standards and working to meet them.'
            ],
        ];
    }

    private function getPowerSkillsTranslations(): array
    {
        return [
            'Pensamiento crítico' => [
                'name' => 'Critical Thinking',
                'description' => 'Ability to analyze information objectively and make reasoned judgments. Evaluating arguments and evidence.'
            ],
            'Resolución creativa de problemas' => [
                'name' => 'Creative Problem Solving',
                'description' => 'Ability to find innovative solutions to complex problems. Thinking outside the box and proposing new approaches.'
            ],
            'Inteligencia emocional' => [
                'name' => 'Emotional Intelligence',
                'description' => 'Ability to recognize and manage one\'s own emotions and those of others. Empathy, self-awareness, and social skills.'
            ],
            'Comunicación efectiva' => [
                'name' => 'Effective Communication',
                'description' => 'Ability to express ideas clearly and persuasively. Active listening and adapting the message to the audience.'
            ],
            'Colaboración' => [
                'name' => 'Collaboration',
                'description' => 'Ability to work with others towards a common goal. Cooperating, sharing information, and supporting colleagues.'
            ],
            'Adaptabilidad' => [
                'name' => 'Adaptability',
                'description' => 'Ability to adjust to new situations and changes. Flexibility and openness to learning.'
            ],
            'Liderazgo' => [
                'name' => 'Leadership',
                'description' => 'Ability to guide and motivate others. Influencing, inspiring, and facilitating the achievement of objectives.'
            ],
            'Gestión del tiempo' => [
                'name' => 'Time Management',
                'description' => 'Ability to organize and prioritize tasks efficiently. Meeting deadlines and optimizing resource use.'
            ],
            'Aprendizaje continuo' => [
                'name' => 'Continuous Learning',
                'description' => 'Attitude of constant growth and development. Seeking new knowledge and skills, curiosity and openness to change.'
            ],
            'Resiliencia' => [
                'name' => 'Resilience',
                'description' => 'Ability to recover from adversity and maintain motivation. Emotional strength and optimism in difficult situations.'
            ],
            'Toma de decisiones' => [
                'name' => 'Decision Making',
                'description' => 'Ability to evaluate alternatives and choose the best option. Deciding with criteria and confidence.'
            ],
            'Negociación' => [
                'name' => 'Negotiation',
                'description' => 'Ability to reach beneficial agreements for all parties. Persuading, listening, and finding common ground.'
            ],
            'Mentoría' => [
                'name' => 'Mentoring',
                'description' => 'Ability to guide and support the development of others. Sharing knowledge and experiences, facilitating learning.'
            ],
            'Pensamiento estratégico' => [
                'name' => 'Strategic Thinking',
                'description' => 'Ability to see the big picture and plan for the long term. Anticipating trends and opportunities.'
            ],
            'Innovación' => [
                'name' => 'Innovation',
                'description' => 'Ability to generate new ideas and challenge the status quo. Creativity and openness to experimentation.'
            ],
            'Gestión de conflictos' => [
                'name' => 'Conflict Management',
                'description' => 'Ability to handle and resolve disagreements constructively. Mediating, listening, and seeking win-win solutions.'
            ],
            'Influencia' => [
                'name' => 'Influence',
                'description' => 'Ability to persuade and generate impact on others. Inspiring confidence and obtaining support for ideas.'
            ],
            'Empatía' => [
                'name' => 'Empathy',
                'description' => 'Ability to understand and share the feelings of others. Putting oneself in another\'s place and showing compassion.'
            ],
            'Autogestión' => [
                'name' => 'Self-Management',
                'description' => 'Ability to direct one\'s own work and development. Autonomy, self-discipline, and personal responsibility.'
            ],
            'Visión global' => [
                'name' => 'Global Vision',
                'description' => 'Ability to understand different cultures and contexts. International perspective and cultural sensitivity.'
            ],
            'Networking' => [
                'name' => 'Networking',
                'description' => 'Ability to establish and maintain professional relationships. Building networks of contacts and mutually beneficial connections.'
            ],
            'Presentación en público' => [
                'name' => 'Public Speaking',
                'description' => 'Ability to communicate ideas to audiences. Confidence, clarity, and ability to capture attention.'
            ],
            'Facilitación' => [
                'name' => 'Facilitation',
                'description' => 'Ability to guide group processes. Moderating discussions, encouraging participation, and achieving results.'
            ],
            'Gestión de proyectos' => [
                'name' => 'Project Management',
                'description' => 'Ability to plan, execute, and control projects. Organizing resources, meeting objectives, and deadlines.'
            ],
            'Análisis de datos' => [
                'name' => 'Data Analysis',
                'description' => 'Ability to interpret information and extract insights. Using data to make informed decisions.'
            ],
        ];
    }

    private function getOrganizationalCultureValuesTranslations(): array
    {
        return [
            'Innovación' => [
                'name' => 'Innovation',
                'description' => 'Environment that fosters creativity, experimentation, and new ideas. Freedom to challenge the status quo.'
            ],
            'Colaboración' => [
                'name' => 'Collaboration',
                'description' => 'Teamwork culture, cooperation, and mutual support. Open communication and shared knowledge.'
            ],
            'Diversidad e inclusión' => [
                'name' => 'Diversity and Inclusion',
                'description' => 'Respect and appreciation for differences. Equal opportunities environment for all people.'
            ],
            'Balance vida-trabajo' => [
                'name' => 'Work-Life Balance',
                'description' => 'Respect for personal time and employee well-being. Flexibility and understanding of individual needs.'
            ],
            'Desarrollo profesional' => [
                'name' => 'Professional Development',
                'description' => 'Investment in employee training and growth. Learning and promotion opportunities.'
            ],
            'Transparencia' => [
                'name' => 'Transparency',
                'description' => 'Open and honest communication. Clarity in decisions and processes.'
            ],
            'Responsabilidad social' => [
                'name' => 'Social Responsibility',
                'description' => 'Commitment to the community and the environment. Ethical and sustainable practices.'
            ],
            'Autonomía' => [
                'name' => 'Autonomy',
                'description' => 'Freedom to make decisions and manage own work. Trust in employees.'
            ],
            'Orientación a resultados' => [
                'name' => 'Results Orientation',
                'description' => 'Focus on achieving objectives and meeting goals. High-performance culture.'
            ],
            'Reconocimiento' => [
                'name' => 'Recognition',
                'description' => 'Appreciation of achievements and efforts. Celebration of successes and contributions.'
            ],
            'Ética' => [
                'name' => 'Ethics',
                'description' => 'Integrity and honesty in all actions. Respect for values and principles.'
            ],
            'Agilidad' => [
                'name' => 'Agility',
                'description' => 'Ability to adapt quickly to changes. Flexible and dynamic processes.'
            ],
            'Comunicación abierta' => [
                'name' => 'Open Communication',
                'description' => 'Freedom to express ideas and opinions. Constructive feedback culture.'
            ],
            'Liderazgo participativo' => [
                'name' => 'Participative Leadership',
                'description' => 'Involvement of employees in decisions. Horizontal leadership and empowerment.'
            ],
            'Excelencia' => [
                'name' => 'Excellence',
                'description' => 'Pursuit of quality and perfection in work. High standards and continuous improvement.'
            ],
            'Confianza' => [
                'name' => 'Trust',
                'description' => 'Mutual trust environment. Credibility and reliability in relationships.'
            ],
            'Pasión' => [
                'name' => 'Passion',
                'description' => 'Enthusiasm and commitment to work. Energy and motivation in daily activities.'
            ],
            'Estabilidad' => [
                'name' => 'Stability',
                'description' => 'Job security and predictable environment. Clear structure and processes.'
            ],
            'Ambiente informal' => [
                'name' => 'Informal Environment',
                'description' => 'Relaxed and friendly work atmosphere. Flexibility in dress code and relationships.'
            ],
            'Orientación al cliente' => [
                'name' => 'Customer Orientation',
                'description' => 'Focus on customer satisfaction. Customer-first culture.'
            ],
            'Trabajo remoto' => [
                'name' => 'Remote Work',
                'description' => 'Flexibility to work from anywhere. Remote work culture and trust.'
            ],
            'Competitividad' => [
                'name' => 'Competitiveness',
                'description' => 'Achievement-oriented environment. Motivation through challenges and goals.'
            ],
            'Bienestar' => [
                'name' => 'Well-being',
                'description' => 'Care for the physical and mental health of employees. Wellness programs and support.'
            ],
            'Tecnología' => [
                'name' => 'Technology',
                'description' => 'Use of advanced tools and cutting-edge technology. Digital environment and innovation.'
            ],
            'Tradición' => [
                'name' => 'Tradition',
                'description' => 'Respect for history and established values. Organizational culture with roots and identity.'
            ],
        ];
    }

    private function getLeadershipPreferencesTranslations(): array
    {
        return [
            'Visionario' => [
                'name' => 'Visionary',
                'description' => 'Leader who inspires with a clear vision of the future. Communicates direction and mobilizes the team towards objectives.'
            ],
            'Coach' => [
                'name' => 'Coach',
                'description' => 'Leader focused on the development of people. Provides feedback, mentors, and fosters team growth.'
            ],
            'Participativo' => [
                'name' => 'Participative',
                'description' => 'Leader who involves the team in decisions. Values opinions and builds consensus.'
            ],
            'Democrático' => [
                'name' => 'Democratic',
                'description' => 'Leader who promotes team participation. Makes decisions based on team input and consensus.'
            ],
            'Ejemplar' => [
                'name' => 'Role Model',
                'description' => 'Leader who leads by example. Sets high standards and demonstrates desired behaviors.'
            ],
            'Directivo' => [
                'name' => 'Directive',
                'description' => 'Leader who provides clear instructions and expectations. Structured and organized style.'
            ],
            'Transformacional' => [
                'name' => 'Transformational',
                'description' => 'Leader who inspires significant changes. Challenges the status quo and motivates innovation.'
            ],
            'Servidor' => [
                'name' => 'Servant',
                'description' => 'Leader who prioritizes the needs of the team. Facilitates success of others.'
            ],
            'Auténtico' => [
                'name' => 'Authentic',
                'description' => 'Leader who is genuine and transparent. Acts with integrity and honesty.'
            ],
            'Carismático' => [
                'name' => 'Charismatic',
                'description' => 'Leader who inspires through personal magnetism. Generates enthusiasm and loyalty.'
            ],
            'Estratégico' => [
                'name' => 'Strategic',
                'description' => 'Leader with long-term vision. Plans and anticipates trends and opportunities.'
            ],
            'Empático' => [
                'name' => 'Empathetic',
                'description' => 'Leader who understands and values team emotions. Shows compassion and sensitivity.'
            ],
            'Innovador' => [
                'name' => 'Innovative',
                'description' => 'Leader who fosters creativity and new ideas. Open to experimentation and calculated risks.'
            ],
            'Resolutivo' => [
                'name' => 'Decisive',
                'description' => 'Leader who makes decisions quickly and with confidence. Acts with determination in difficult situations.'
            ],
            'Comunicador' => [
                'name' => 'Communicator',
                'description' => 'Leader who communicates clearly and effectively. Listens actively and maintains open dialogue.'
            ],
            'Flexible' => [
                'name' => 'Flexible',
                'description' => 'Leader who adapts to different situations. Open to change and new approaches.'
            ],
            'Técnico' => [
                'name' => 'Technical',
                'description' => 'Leader with deep technical knowledge. Guides through expertise and experience.'
            ],
            'Orientado a resultados' => [
                'name' => 'Results-Oriented',
                'description' => 'Leader focused on achieving objectives. Demands excellence and measures performance.'
            ],
            'Motivador' => [
                'name' => 'Motivator',
                'description' => 'Leader who inspires and energizes the team. Generates enthusiasm and positive commitment.'
            ],
            'Delegador' => [
                'name' => 'Delegating',
                'description' => 'Leader who trusts the team and empowers them. Distributes responsibilities and fosters autonomy.'
            ],
            'Analítico' => [
                'name' => 'Analytical',
                'description' => 'Leader who makes decisions based on data and analysis. Rigorous and methodical.'
            ],
            'Cercano' => [
                'name' => 'Approachable',
                'description' => 'Leader who is accessible and builds close relationships. Creates an environment of trust and camaraderie.'
            ],
            'Exigente' => [
                'name' => 'Demanding',
                'description' => 'Leader with high standards. Challenges the team to achieve excellence.'
            ],
            'Integrador' => [
                'name' => 'Integrative',
                'description' => 'Leader who builds cohesion and team spirit. Promotes collaboration and unity.'
            ],
            'Resiliente' => [
                'name' => 'Resilient',
                'description' => 'Leader who maintains calm and optimism in adversity. Source of strength for the team.'
            ],
        ];
    }
}
