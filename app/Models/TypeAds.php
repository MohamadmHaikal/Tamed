<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MaterialType;

class TypeAds extends Model
{
    use HasFactory;
    public function getTypeName($type)
    {

        $myvar =  [
            'Project' => [
                    [
                        'id' => 'Pricing_with_materials',
                        'label' => __('Pricing with materials'),
                        'name' => 'PricingWithMaterials',
                        'type' => 'radio',
                        'choices' => [
                            'yes' => __('yes'),
                            'no' => __('no')
                        ],
                    ],
                    [
                        'id' => 'Choose_the_type_of_project',
                        'label' => __('Choose the type of project'),
                        'type' => 'select',
                        'choices' => 'page',
                        'name' => 'projectType',
                        'layout' => 'col-12 col-sm-6',
                        'style' => 'wide',
                        'choices' => [
                            ['option' =>   __('Turnkey'),
                            'value' => 'Turnkey'],
                            ['option' => __('no'),
                            'value' =>  'no'],

                         
                        ],
                    ],

                    [
                        'id' => 'Classification_is_required',
                        'label' => __('Classification is required'),
                        'name' => 'Classification',
                        'type' => 'radio',
                        'choices' => [
                            'yes' => __('yes'),
                            'no' => __('no')
                        ],
                    ],
                
                    [
                        'id' => 'Category_Category',
                        'label' => __('Category Category'),
                        'name' => 'CategoryCategory',
                        'type' => 'text',
                        'layout' => 'col-12 col-md-6'
                    ],
                    [
                        'h3' => __('Do you provide this on the site?'),
                        'id' => 'accommodation_available',
                        'label' => __('Is there accommodation?'),
                        'name' => 'accommodation',
                        'type' => 'radio',
                        'choices' => [
                            'yes' => __('yes'),
                            'no' => __('no')
                        ],
                        'id' => 'electricity_available',
                        'label' => __('Is there electricity?'),
                        'type' => 'radio',
                        'name' => 'electricity',
                        'choices' => [
                            'yes' => __('yes'),
                            'no' => __('no')
                        ],
                        'id' => 'transportation_available',
                        'label' => __('Is transportation available?'),
                        'type' => 'radio',
                        'name' => 'transportation',
                        'choices' => [
                            'yes' => __('yes'),
                            'no' => __('no')
                        ],
                    ],

            ],
            'deals' => [
              
                [
                    'id' => 'Choose_material',
                    'label' => __('Choose material'),
                    'type' => 'select',
                    'choices' => 'page',
                    'name' => 'materialType',
                    'layout' => 'col-12 col-sm-6',
                    'style' => 'wide',
                    'choices' => 
                    self::getSelectOption()

                ],
                [
                    'id' => 'status_materials',
                    'label' => __('status materials'),
                    'name' => 'materialStatus',
                    'type' => 'radio',
                    'choices' => [
                        'new' => __('new'),
                        'old' => __('old')
                    ],
                ],

              
                [
                    'id' => 'Count',
                    'label' => __('Count'),
                    'name' => 'Count',
                    'type' => 'text',
                    'layout' => 'col-12 col-md-6'
                ],

            ],
            'Auctions' => [
                [
                    'id' => 'Pricing_with_materials',
                    'label' => __('Pricing with materials'),
                    'name' => 'PricingWithMaterials',
                    'type' => 'radio',
                    'choices' => [
                        'yes' => __('yes'),
                        'no' => __('no')
                    ],
                ],
                [
                    'id' => 'Choose_the_type_of_project',
                    'label' => __('Choose the type of project'),
                    'type' => 'select',
                    'choices' => 'page',
                    'name' => 'projectType',
                    'layout' => 'col-12 col-sm-6',
                    'style' => 'wide',
                    'choices' => [
                        ['option' =>   __('Turnkey'),
                            'value' => 'Turnkey'],
                            ['option' => __('no'),
                            'value' =>  'no'],
                    ],
                ],

                [
                    'id' => 'Classification_is_required',
                    'label' => __('Classification is required'),
                    'type' => 'radio',
                    'name' => 'Classification',
                    'choices' => [
                        'yes' => __('yes'),
                        'no' => __('no')
                    ],
                ],

                [
                    'id' => 'Category_Category',
                    'label' => __('Category Category'),
                    'name' => 'CategoryCategory',
                    'type' => 'text',
                    'layout' => 'col-12 col-md-6'
                ],
                [
                    'h3' => __('Do you provide this on the site?'),
                    'id' => 'accommodation_available',
                    'label' => __('Is there accommodation?'),
                    'type' => 'radio',
                    'choices' => [
                        'yes' => __('yes'),
                        'no' => __('no')
                    ],
                    'id' => 'electricity_available',
                    'label' => __('Is there electricity?'),
                    'type' => 'radio',
                    'choices' => [
                        'yes' => __('yes'),
                        'no' => __('no')
                    ],
                    'id' => 'transportation_available',
                    'label' => __('Is transportation available?'),
                    'type' => 'radio',
                    'choices' => [
                        'yes' => __('yes'),
                        'no' => __('no')
                    ],
                ],

                [
                    'id' => 'project_value',
                    'label' => __('project value'),
                    'type' => 'text',
                    'layout' => 'col-12 col-md-6'
                ],

            ],
            'Material' => [
                 
                [
                    'id' => 'Choose_material',
                    'label' => __('Choose material'),
                    'type' => 'select',
                    'choices' => 'page',
                    'name' => 'materialType',
                    'layout' => 'col-12 col-sm-6',
                    'style' => 'wide',
                    'choices' => 
                    self::getSelectOption()

                ],
               

                [
                    'id' => 'Category_Category',
                    'label' => __('Category Category'),
                    'type' => 'text',
                    'layout' => 'col-12 col-md-6'
                ],

                [
                    'id' => 'project_value',
                    'label' => __('project value'),
                    'type' => 'text',
                    'layout' => 'col-12 col-md-6'
                ],

            ],
            'equipment' => [
                [
                    'id' => 'Pricing_with_materials',
                    'label' => __('Pricing with materials'),
                    'type' => 'radio',
                    'choices' => [
                        'yes' => __('yes'),
                        'no' => __('no')
                    ],
                ],
                [
                    'id' => 'Choose_the_type_of_project',
                    'label' => __('Choose the type of project'),
                    'type' => 'select',
                    'choices' => 'page',
                    'layout' => 'col-12 col-sm-6',
                    'style' => 'wide',
                    'choices' => [
                        'Turnkey' => __('Turnkey'),
                        'no' => __('no')
                    ],
                ],

                [
                    'id' => 'Classification_is_required',
                    'label' => __('Classification is required'),
                    'type' => 'radio',
                    'choices' => [
                        'yes' => __('yes'),
                        'no' => __('no')
                    ],
                ],

                [
                    'id' => 'Category_Category',
                    'label' => __('Category Category'),
                    'type' => 'text',
                    'layout' => 'col-12 col-md-6'
                ],
                [
                    'h3' => __('Do you provide this on the site?'),
                    'id' => 'accommodation_available',
                    'label' => __('Is there accommodation?'),
                    'type' => 'radio',
                    'choices' => [
                        'yes' => __('yes'),
                        'no' => __('no')
                    ],
                    'id' => 'electricity_available',
                    'label' => __('Is there electricity?'),
                    'type' => 'radio',
                    'choices' => [
                        'yes' => __('yes'),
                        'no' => __('no')
                    ],
                    'id' => 'transportation_available',
                    'label' => __('Is transportation available?'),
                    'type' => 'radio',
                    'choices' => [
                        'yes' => __('yes'),
                        'no' => __('no')
                    ],
                ],

                [
                    'id' => 'project_value',
                    'label' => __('project value'),
                    'type' => 'text',
                    'layout' => 'col-12 col-md-6'
                ],

            ],
            'job' => [
                [
                    'id' => 'Pricing_with_materials',
                    'label' => __('Pricing with materials'),
                    'type' => 'radio',
                    'choices' => [
                        'yes' => __('yes'),
                        'no' => __('no')
                    ],
                ],
                [
                    'id' => 'Choose_the_type_of_project',
                    'label' => __('Choose the type of project'),
                    'type' => 'select',
                    'choices' => 'page',
                    'layout' => 'col-12 col-sm-6',
                    'style' => 'wide',
                    'choices' => [
                        'Turnkey' => __('Turnkey'),
                        'no' => __('no')
                    ],
                ],

                [
                    'id' => 'Classification_is_required',
                    'label' => __('Classification is required'),
                    'type' => 'radio',
                    'choices' => [
                        'yes' => __('yes'),
                        'no' => __('no')
                    ],
                ],

                [
                    'id' => 'Category_Category',
                    'label' => __('Category Category'),
                    'type' => 'text',
                    'layout' => 'col-12 col-md-6'
                ],
                [
                    'h3' => __('Do you provide this on the site?'),
                    'id' => 'accommodation_available',
                    'label' => __('Is there accommodation?'),
                    'type' => 'radio',
                    'choices' => [
                        'yes' => __('yes'),
                        'no' => __('no')
                    ],
                    'id' => 'electricity_available',
                    'label' => __('Is there electricity?'),
                    'type' => 'radio',
                    'choices' => [
                        'yes' => __('yes'),
                        'no' => __('no')
                    ],
                    'id' => 'transportation_available',
                    'label' => __('Is transportation available?'),
                    'type' => 'radio',
                    'choices' => [
                        'yes' => __('yes'),
                        'no' => __('no')
                    ],
                ],

                [
                    'id' => 'project_value',
                    'label' => __('project value'),
                    'type' => 'text',
                    'layout' => 'col-12 col-md-6'
                ],

            ]

    ];
        return $myvar[$type];

    }

    public function getSelectOption()
    {
        $MaterialType=MaterialType::all();
        $array;
        foreach ($MaterialType as $key => $value) {
            $array []  = [
            'option' =>  $value->name,
            'value' =>  $value->id];
        }
        return  $array;

    }
 
}