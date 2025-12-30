<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GameTemplate;

class GameTemplatesSeeder extends Seeder
{
    public function run(): void
    {
        $templates = [
            [
                'name' => 'Matching Game',
                'description' => 'Cocokkan pasangan kata (kiri-kanan). Cocok untuk belajar kosakata, terjemahan, dll.',
                'template_file' => 'game.templates.matching',
                'config_schema' => [
                    'fields' => [
                        ['name' => 'question_text', 'label' => 'Kata Kiri', 'type' => 'text', 'required' => true],
                        ['name' => 'answer_text', 'label' => 'Kata Kanan', 'type' => 'text', 'required' => true],
                        ['name' => 'image_path', 'label' => 'Gambar (Optional)', 'type' => 'image', 'required' => false],
                        ['name' => 'points', 'label' => 'Poin', 'type' => 'number', 'required' => true, 'default' => 10]
                    ]
                ],
                'is_active' => true
            ],
            [
                'name' => 'Multiple Choice',
                'description' => 'Pilihan ganda dengan 4 opsi jawaban.',
                'template_file' => 'game.templates.multiple_choice',
                'config_schema' => [
                    'fields' => [
                        ['name' => 'question_text', 'label' => 'Pertanyaan', 'type' => 'text', 'required' => true],
                        ['name' => 'options', 'label' => 'Pilihan Jawaban (4 opsi)', 'type' => 'array', 'required' => true],
                        ['name' => 'answer_text', 'label' => 'Jawaban Benar', 'type' => 'text', 'required' => true],
                        ['name' => 'image_path', 'label' => 'Gambar (Optional)', 'type' => 'image', 'required' => false],
                        ['name' => 'points', 'label' => 'Poin', 'type' => 'number', 'required' => true, 'default' => 10]
                    ]
                ],
                'is_active' => true
            ],
            [
                'name' => 'Fill in the Blank',
                'description' => 'Isi titik-titik dengan jawaban yang benar.',
                'template_file' => 'game.templates.fill_blank',
                'config_schema' => [
                    'fields' => [
                        ['name' => 'question_text', 'label' => 'Kalimat dengan ___', 'type' => 'text', 'required' => true],
                        ['name' => 'answer_text', 'label' => 'Jawaban', 'type' => 'text', 'required' => true],
                        ['name' => 'image_path', 'label' => 'Gambar (Optional)', 'type' => 'image', 'required' => false],
                        ['name' => 'points', 'label' => 'Poin', 'type' => 'number', 'required' => true, 'default' => 10]
                    ]
                ],
                'is_active' => true
            ]
        ];

        foreach ($templates as $template) {
            GameTemplate::create($template);
        }
    }
}
