<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Testimonials extends Component
{
    public $testimonials;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->testimonials = [
            [
                'nome' => 'Sarah Chen',
                'cargo' => 'Engenheira de Robótica na Tesla',
                'imagem' => 'https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=200',
                'conteudo' => 'Os cursos aqui transformaram completamente minha carreira. Passei de não saber nada sobre robótica a conseguir meu emprego dos sonhos em apenas 8 meses.',
                'rating' => 5
            ],
            [
                'nome' => 'Marcus Johnson',
                'cargo' => 'Pesquisador de IA',
                'imagem' => 'https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg?auto=compress&cs=tinysrgb&w=200',
                'conteudo' => 'Os instrutores são de classe mundial e os projetos práticos são exatamente o que você precisa para desenvolver habilidades reais. Altamente recomendado!',
                'rating' => 5
            ],
            [
                'nome' => 'Elena Rodriguez',
                'cargo' => 'Especialista em Automação',
                'imagem' => 'https://images.pexels.com/photos/1239291/pexels-photo-1239291.jpeg?auto=compress&cs=tinysrgb&w=200',
                'conteudo' => 'O melhor investimento que fiz na minha educação. O currículo é de ponta e o suporte da comunidade é incrível.',
                'rating' => 5
            ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.testimonials');
    }
}
