<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class ListingCoursesFilter extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Listing Courses Filter';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Listing Courses Filter block.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'formatting';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'editor-ul';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = [];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'edit';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align'         => false,
        'align_text'    => false,
        'align_content' => false,
        'full_height'   => false,
        'anchor'        => true,
        'mode'          => true,
        'multiple'      => true,
        'jsx'           => true,
    ];

    /**
     * The block styles.
     *
     * @var array
     */
    public $styles = [
    ];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $example = [
    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'content' => $this->content(),
            'advance' => $this->advance(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $listingCoursesFilter = new FieldsBuilder('listing_courses_filter');

        $listingCoursesFilter
        ->addAccordion('accordion_courses_listing', [
            'label' => 'Conteudo',
            'instructions' => 'Dados do bloco',
            'open' => 0,
            'multi_expand' => 0,
        ])
            ->addWysiwyg('wysiwyg_content', [
                'label' => 'Cabeçalho da Sessão / Conteúdo',
                'media_upload' => 0,
            ])

            ->addRepeater('repeater_posts', [
                'label' => 'Grid de Postagens',
                'instructions' => 'A quantidade ideal de cursos é 6',
                'collapsed' => 'post',
                'min' => 1,
                'max' => 6,
                'layout' => 'block',
                'button_label' => 'Adicionar Post',
            ])

                ->addPostObject('post', [
                    'label' => 'Curso',
                    'instructions' => 'Selecione o curso desejado',
                    'post_type' => ['cursos']
                ])

                ->addImage('icon', [
                    'label' => 'Icone do Card',
                    'instructions' => 'Ideal que seja da cor branca e do formato .svg ou .png (Campo Opcional)',
                    'mime_types' => ['svg', 'png'],
                ])

            ->endRepeater()

            ->addLink('button', [
                'label' => 'Botão',
                'instructions' => '',
                'return_format' => 'array',
            ])

        ->addAccordion('accordion_courses_listing_end')->endpoint()

        ->addAccordion('accordion_field_advanced', [
            'label' => 'Configurações avançadas',
            'open' => 0,
            'multi_expand' => 0,
        ])
            ->addTrueFalse('all_courses', [
                'label' => 'Exibir todos os cursos',
                'ui_on_text' => 'Sim',
                'ui_off_text' => 'Não',
                'default_value' => 0,
            ])
        ->addAccordion('accordion_field_advanced_end')->endpoint();

        return $listingCoursesFilter->build();
    }

    public function content()
    {
        return [
            'wysiwygContent' => get_field('wysiwyg_content') ?: false,
            'repeaterPosts'  => get_field('repeater_posts') ?: false,
            'button'         => get_field('button') ?: false,
            'filters'        => get_terms('format') ?: false,
        ];
    }

    public function advance()
    {
        return [
            'allCourses' => get_field('all_courses'),
        ];
    }

    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue()
    {
        //
    }
}
