<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class CoursesListing extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Courses Listing';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Courses Listing block.';

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
        $coursesListing = new FieldsBuilder('courses_listing');

        $coursesListing
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
                    'required' => 1,
                    'collapsed' => 'post',
                    'min' => 1,
                    'max' => 6,
                    'layout' => 'block',
                    'button_label' => 'Adicionar Post',
                ])

                    ->addPostObject('post', [
                        'label' => 'Curso',
                        'instructions' => 'Selecione o curso desejado',
                        'required' => 1,
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
            ->addAccordion('accordion_field_advanced_end')->endpoint();

        return $coursesListing->build();
    }

    public function content()
    {
        return [
            'wysiwygContent' => get_field('wysiwyg_content') ?: false,
            'repeaterPosts' => get_field('repeater_posts') ?: false,
            'button' => get_field('button') ?: false,
        ];
    }

    public function advance()
    {
        return [
            'imageSide' => get_field('image_side'),
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
