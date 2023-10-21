<?php

namespace App\Options;

use Log1x\AcfComposer\Options as Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class OptionsTheme extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Options Theme';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'ETEC Zona Leste | Options';

    /**
     * The option page field group.
     *
     * @return array
     */
    public function fields()
    {
        $optionsTheme = new FieldsBuilder('options_theme');

        $optionsTheme
            // LOGO CONFIG
            ->addGroup('logo', [
                'label' => 'Logos',
            ])
                ->addAccordion('accordion_data_logo', [
                    'label' => 'Configurações',
                    'instructions' => 'Preencha corretamente todos os dados',
                ])
                    ->addImage('dark', [
                        'label' => 'Logo Dark'
                    ])

                    ->addImage('light', [
                        'label' => 'Logo Light'
                    ])
                ->addAccordion('accordion_data_logo_end')->endpoint()
            ->endGroup()

            // HEADER CONFIG
            ->addGroup('header', [
                'label' => 'Header',
            ])
                ->addAccordion('accordion_data_header', [
                    'label' => 'Configurações',
                    'instructions' => 'Preencha corretamente todos os dados',
                ])
                    ->addSelect('select_nav', [
                        'label' => 'Selecione o menu',
                        'instructions' => 'Crie o menu no menu lateral do painel ( aparência>menus )',
                        'required' => 1,
                        'choices' => $this->getAllMenus(),
                        'ui' => 1,
                        'return_format' => 'value',
                        'wrapper' => [
                            'width' => '50',
                        ],
                    ])
                ->addAccordion('accordion_data_header_end')->endpoint()
            ->endGroup();

        return $optionsTheme->build();
    }

    /**
     * back all registered menus
     *
     * @return array
     */
    public function getAllMenus()
    {
        $menus = wp_get_nav_menus();
        $selectMenus = [];

        foreach ($menus as $menu) {
            $menu = [
                $menu->slug => $menu->name
            ];
            $selectMenus[] = $menu;
        }

        return $selectMenus;
    }
}
