<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PowerSkillSeeder extends Seeder
{
    /**
     * Power Skills modernas (evolución de las soft skills)
     */
    public function run(): void
    {
        $powerSkills = [
            [
                'name' => 'Comunicación efectiva',
                'name_en' => 'Effective Communication',
                'description' => 'Capacidad de transmitir ideas de manera clara, concisa y persuasiva, adaptándose a diferentes audiencias y contextos.',
                'description_en' => 'Ability to convey ideas clearly, concisely, and persuasively, adapting to different audiences and contexts.',
            ],
            [
                'name' => 'Pensamiento crítico',
                'name_en' => 'Critical Thinking',
                'description' => 'Habilidad para analizar información objetivamente, evaluar diferentes perspectivas y tomar decisiones fundamentadas.',
                'description_en' => 'Ability to analyze information objectively, evaluate different perspectives, and make informed decisions.',
            ],
            [
                'name' => 'Resolución de problemas complejos',
                'name_en' => 'Complex Problem Solving',
                'description' => 'Capacidad de identificar, analizar y resolver problemas complejos utilizando enfoques creativos e innovadores.',
                'description_en' => 'Ability to identify, analyze, and solve complex problems using creative and innovative approaches.',
            ],
            [
                'name' => 'Creatividad e innovación',
                'name_en' => 'Creativity and Innovation',
                'description' => 'Habilidad para generar ideas originales, pensar fuera de lo convencional y aportar soluciones innovadoras.',
                'description_en' => 'Ability to generate original ideas, think outside the box, and provide innovative solutions.',
            ],
            [
                'name' => 'Colaboración',
                'name_en' => 'Collaboration',
                'description' => 'Capacidad de trabajar efectivamente con otros, compartir conocimientos y contribuir al éxito colectivo.',
                'description_en' => 'Ability to work effectively with others, share knowledge, and contribute to collective success.',
            ],
            [
                'name' => 'Inteligencia emocional',
                'name_en' => 'Emotional Intelligence',
                'description' => 'Habilidad para reconocer, entender y gestionar las propias emociones y las de los demás.',
                'description_en' => 'Ability to recognize, understand, and manage one\'s own emotions and those of others.',
            ],
            [
                'name' => 'Adaptabilidad y flexibilidad',
                'name_en' => 'Adaptability and Flexibility',
                'description' => 'Capacidad de ajustarse rápidamente a nuevas situaciones, cambios y desafíos inesperados.',
                'description_en' => 'Ability to quickly adjust to new situations, changes, and unexpected challenges.',
            ],
            [
                'name' => 'Aprendizaje continuo',
                'name_en' => 'Continuous Learning',
                'description' => 'Disposición y capacidad para adquirir nuevos conocimientos y habilidades de forma permanente.',
                'description_en' => 'Willingness and ability to continuously acquire new knowledge and skills.',
            ],
            [
                'name' => 'Gestión del tiempo',
                'name_en' => 'Time Management',
                'description' => 'Habilidad para organizar, priorizar y administrar eficientemente el tiempo y los recursos.',
                'description_en' => 'Ability to organize, prioritize, and efficiently manage time and resources.',
            ],
            [
                'name' => 'Toma de decisiones',
                'name_en' => 'Decision Making',
                'description' => 'Capacidad para evaluar opciones, considerar consecuencias y tomar decisiones acertadas bajo presión.',
                'description_en' => 'Ability to evaluate options, consider consequences, and make sound decisions under pressure.',
            ],
            [
                'name' => 'Negociación',
                'name_en' => 'Negotiation',
                'description' => 'Habilidad para llegar a acuerdos beneficiosos mediante el diálogo, la persuasión y el compromiso mutuo.',
                'description_en' => 'Ability to reach beneficial agreements through dialogue, persuasion, and mutual commitment.',
            ],
            [
                'name' => 'Empatía',
                'name_en' => 'Empathy',
                'description' => 'Capacidad de comprender y compartir los sentimientos de otros, poniéndose en su lugar.',
                'description_en' => 'Ability to understand and share the feelings of others, putting oneself in their place.',
            ],
            [
                'name' => 'Resiliencia',
                'name_en' => 'Resilience',
                'description' => 'Habilidad para recuperarse rápidamente de dificultades, mantener el ánimo y seguir adelante.',
                'description_en' => 'Ability to quickly recover from difficulties, maintain morale, and move forward.',
            ],
            [
                'name' => 'Pensamiento estratégico',
                'name_en' => 'Strategic Thinking',
                'description' => 'Capacidad de visualizar el panorama general, anticipar tendencias y planificar a largo plazo.',
                'description_en' => 'Ability to visualize the big picture, anticipate trends, and plan long-term.',
            ],
            [
                'name' => 'Gestión del cambio',
                'name_en' => 'Change Management',
                'description' => 'Habilidad para liderar, implementar y adaptarse a procesos de transformación organizacional.',
                'description_en' => 'Ability to lead, implement, and adapt to organizational transformation processes.',
            ],
            [
                'name' => 'Mentoría y coaching',
                'name_en' => 'Mentoring and Coaching',
                'description' => 'Capacidad de guiar, desarrollar y potenciar el talento de otros mediante acompañamiento y retroalimentación.',
                'description_en' => 'Ability to guide, develop, and enhance others\' talent through accompaniment and feedback.',
            ],
            [
                'name' => 'Storytelling',
                'name_en' => 'Storytelling',
                'description' => 'Habilidad para comunicar ideas, datos y conceptos a través de narrativas convincentes y memorables.',
                'description_en' => 'Ability to communicate ideas, data, and concepts through compelling and memorable narratives.',
            ],
            [
                'name' => 'Pensamiento de diseño (Design Thinking)',
                'name_en' => 'Design Thinking',
                'description' => 'Capacidad de abordar problemas desde una perspectiva centrada en el usuario, con enfoque iterativo y creativo.',
                'description_en' => 'Ability to approach problems from a user-centered perspective, with an iterative and creative focus.',
            ],
            [
                'name' => 'Alfabetización digital',
                'name_en' => 'Digital Literacy',
                'description' => 'Competencia para utilizar, comprender y evaluar tecnologías digitales de manera efectiva.',
                'description_en' => 'Competence to use, understand, and evaluate digital technologies effectively.',
            ],
            [
                'name' => 'Curiosidad intelectual',
                'name_en' => 'Intellectual Curiosity',
                'description' => 'Disposición natural para explorar, cuestionar y buscar nuevos conocimientos y experiencias.',
                'description_en' => 'Natural disposition to explore, question, and seek new knowledge and experiences.',
            ],
            [
                'name' => 'Networking',
                'name_en' => 'Networking',
                'description' => 'Habilidad para construir y mantener redes de contactos profesionales valiosas.',
                'description_en' => 'Ability to build and maintain valuable professional contact networks.',
            ],
            [
                'name' => 'Gestión de conflictos',
                'name_en' => 'Conflict Management',
                'description' => 'Capacidad de identificar, abordar y resolver desacuerdos de manera constructiva.',
                'description_en' => 'Ability to identify, address, and resolve disagreements constructively.',
            ],
            [
                'name' => 'Persuasión e influencia',
                'name_en' => 'Persuasion and Influence',
                'description' => 'Habilidad para convencer y motivar a otros hacia una idea, acción o cambio específico.',
                'description_en' => 'Ability to convince and motivate others toward a specific idea, action, or change.',
            ],
            [
                'name' => 'Autoconciencia',
                'name_en' => 'Self-Awareness',
                'description' => 'Capacidad de reconocer las propias fortalezas, debilidades, valores y motivaciones.',
                'description_en' => 'Ability to recognize one\'s own strengths, weaknesses, values, and motivations.',
            ],
            [
                'name' => 'Mindfulness',
                'name_en' => 'Mindfulness',
                'description' => 'Habilidad para mantener la atención plena, presente y consciente en el momento actual.',
                'description_en' => 'Ability to maintain full, present, and conscious attention in the current moment.',
            ],
        ];

        foreach ($powerSkills as $skill) {
            DB::table('power_skills')->insert([
                'name' => $skill['name'],
                'name_en' => $skill['name_en'],
                'description' => $skill['description'],
                'description_en' => $skill['description_en'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
