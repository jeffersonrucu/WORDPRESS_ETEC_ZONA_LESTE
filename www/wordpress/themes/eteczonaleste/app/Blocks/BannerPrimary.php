<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class BannerPrimary extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Banner Primary';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Banner Primary block.';

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
        $bannerPrimary = new FieldsBuilder('banner_primary');

        $bannerPrimary
            ->addAccordion('accordion_banner_primary', [
                'label' => 'Conteudo',
                'instructions' => 'Dados do bloco',
                'open' => 0,
                'multi_expand' => 0,
            ])
                ->addText('category', [
                    'label' => 'Categoria / Texto Auxiliar',
                    'instructions' => 'Campo Opcional',
                ])

                ->addWysiwyg('wysiwyg_content', [
                    'label' => 'Título do Banner / Conteúdo',
                    'media_upload' => 0,
                ])

                ->addLink('button', [
                    'label' => 'Botão',
                ])

                ->addImage('image', [
                    'label' => 'Imagem',
                    'instructions' => 'Tamanho Ideal da Imagem: 195px x 195px',
                    'required' => 1,
                ])
            ->addAccordion('accordion_banner_primary_end')->endpoint()

            ->addAccordion('accordion_field_advanced', [
                'label' => 'Configurações avançadas',
                'open' => 0,
                'multi_expand' => 0,
            ])
                ->addTrueFalse('image_right', [
                    'label' => 'Imagem a direita',
                    'instructions' => 'Tamanho Ideal: 528x528 px',
                    'ui_on_text' => 'Sim',
                    'ui_off_text' => 'Não',
                ])
            ->addAccordion('accordion_field_advanced_end')->endpoint();

        return $bannerPrimary->build();
    }

    public function content()
    {
        return [
            'image' => get_field('image') ?: false,
            'button' => get_field('button') ?: false,
            'wysiwygContent' => get_field('wysiwyg_content') ?: false,
            'category' => get_field('category') ?: false
        ];
    }

    public function advance()
    {
        return [
            'imageRight' => get_field('image_right') ?: false
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
