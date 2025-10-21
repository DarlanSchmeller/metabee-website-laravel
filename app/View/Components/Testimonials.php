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
                'nome' => 'Eric Martins',
                'cargo' => 'Estudante MakerBee',
                'imagem' => 'eric_martins.webp',
                'conteudo' => 'O curso foi uma verdadeira porta de entrada para o universo Maker, ensinando conceitos básicos e avançados, e me capacitou para a criação dos meus próprios projetos, que antes eu não tinha o conhecimento necessário para realizar. Toda a organização e estrutura da Maker Bee são impecáveis. O acesso a impressoras 3D, corte a laser e a interação com outros estudantes tornam a experiência de frequentar a Maker Bee realmente incrível.',
                'rating' => 5
            ],
            [
                'nome' => 'Henrique Lenzi',
                'cargo' => 'Estudante MakerBee',
                'imagem' => 'henrique_lenzi.webp',
                'conteudo' => 'Olá, sou o Henrique, aluno da MetaBee a apenas 4 meses, e posso confirmar como o curso mudou a minha forma de ver o mundo! Tanto de uma maneira Maker e empreendedora, quanto de uma maneira mais lógica e racional das coisas. As aulas de corte a laser estão me garantindo uma renda extra, e a impressão 3D virou meu principal hobbie. Graças à o que eu aprendi no curso, estou conseguindo botar em pratica meus projetos, tirando do papel protótipos que sempre sonhei, e podendo enfim dar sequência às minhas pesquisas!',
                'rating' => 5
            ],
            [
                'nome' => 'Eric Martins',
                'cargo' => 'Estudante MakerBee',
                'imagem' => 'eric_martins.webp',
                'conteudo' => 'O curso foi uma verdadeira porta de entrada para o universo Maker, ensinando conceitos básicos e avançados, e me capacitou para a criação dos meus próprios projetos, que antes eu não tinha o conhecimento necessário para realizar. Toda a organização e estrutura da Maker Bee são impecáveis. O acesso a impressoras 3D, corte a laser e a interação com outros estudantes tornam a experiência de frequentar a Maker Bee realmente incrível.',
                'rating' => 5
            ],
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
