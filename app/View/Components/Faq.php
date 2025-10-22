<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Faq extends Component
{
    public $faq;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->faq = [
            [
                'question' => 'Posso mudar de plano a qualquer momento?',
                'answer' => 'Sim! Você pode atualizar ou rebaixar seu plano a qualquer momento. As mudanças serão refletidas no próximo ciclo de faturamento.',
            ],
            [
                'question' => 'Vocês oferecem reembolso?',
                'answer' => 'Oferecemos garantia de devolução em 30 dias. Se não estiver satisfeito com sua compra, entre em contato para um reembolso completo.',
            ],
            [
                'question' => 'Os cursos são atualizados regularmente?',
                'answer' => 'Sim! Atualizamos os cursos trimestralmente para garantir que você esteja aprendendo as tecnologias mais recentes e melhores práticas.',
            ],
            [
                'question' => 'Posso acessar os cursos offline?',
                'answer' => 'Os planos Profissional e Enterprise incluem materiais de curso para download e acesso offline.',
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.faq');
    }
}
