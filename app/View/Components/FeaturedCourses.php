<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedCourses extends Component
{
    public $courses;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->courses = [
            [
                'id' => 1,
                'title' => 'Fundamentos Completos de Robótica',
                'rating' => 4.9,
                'students' => 2840,
                'duration' => '12 horas',
                'price' => 99,
                'image' => 'https://images.pexels.com/photos/8294585/pexels-photo-8294585.jpeg?auto=compress&cs=tinysrgb&w=800',
                'level' => 'Iniciante',
                'levelColor' => $this->getLevelColor('iniciante'),
                'tags' => ['Arduino', 'Sensores', 'Programação'],
            ],
            [
                'id' => 2,
                'title' => 'IA Avançada para Robótica',
                'rating' => 4.8,
                'students' => 1920,
                'duration' => '18 horas',
                'price' => 149,
                'image' => 'https://images.pexels.com/photos/8294577/pexels-photo-8294577.jpeg?auto=compress&cs=tinysrgb&w=800',
                'level' => 'Avançado',
                'levelColor' => $this->getLevelColor('avancado'),
                'tags' => ['Machine Learning', 'Visão Computacional', 'ROS'],
            ],
            [
                'id' => 3,
                'title' => 'Sistemas de Automação Industrial',
                'rating' => 4.7,
                'students' => 1540,
                'duration' => '15 horas',
                'price' => 129,
                'image' => 'https://images.pexels.com/photos/8294493/pexels-photo-8294493.jpeg?auto=compress&cs=tinysrgb&w=800',
                'level' => 'Intermediário',
                'levelColor' => $this->getLevelColor('intermediario'),
                'tags' => ['PLC', 'SCADA', 'HMI'],
            ],
        ];
    }

    public function getLevelColor($level)
    {
        return match ($level) {
            'iniciante' => 'bg-green-100 text-green-800',
            'intermediario' => 'bg-yellow-100 text-yellow-800',
            'avancado' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.featured_courses');
    }
}
