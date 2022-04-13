<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
                    self::getSelectOption('MaterialType')

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
                    self::getSelectOption('MaterialType')

                ],
                [
                    'id' => 'country_of_manufacture',
                    'label' => __('country of manufacture'),
                    'name' => 'countryManufacture',
                    'type' => 'text',
                    'layout' => 'col-12 col-md-6'
                ],
                [
                    'id' => 'Required_warranty_period',
                    'label' => __('Required warranty period'),
                    'name' => 'warrantyPeriod',
                    'type' => 'number',
                    'layout' => 'col-12 col-md-6'
                ],
           

            ],
            'equipment' => [

                [
                    'id' => 'Choose_category',
                    'label' => __('Choose Category'),
                    'type' => 'select',
                    'choices' => 'page',
                    'name' => 'CategoryEquipment',
                    'layout' => 'col-12 col-sm-6',
                    'style' => 'wide',
                    'multiple' => 'multiple',
                    'choices' => 
                    self::getSelectOption('MaterialType')

                ],
             

                [
                    'id' => 'status_equipment',
                    'label' => __('status equipment'),
                    'name' => 'equipmentStatus',
                    'type' => 'radio',
                    'choices' => [
                        'new' => __('new'),
                        'old' => __('old')
                    ],
                ],

                [
                    'id' => 'quantity',
                    'label' => __('quantity equipment'),
                    'name' => 'quantityEquipment',
                    'type' => 'number',
                    'layout' => 'col-12 col-md-6'
                ],

                [
                    'id' => 'Receiving_orders',
                    'label' => __('Receiving orders'),
                    'name' => 'ReceivingOrders',
                    'type' => 'radio',
                    'choices' => [
                        'Individuals' => __('Individuals'),
                        'Institutions' => __('Institutions'),
                        'Both' => __('Both')
                    ],
                ],

            ],
            'job' => [
                [
                    'id' => 'Type_Employment',
                    'label' => __('Choose Type Employment'),
                    'type' => 'select',
                    'choices' => 'page',
                    'name' => 'TypeEmployment',
                    'layout' => 'col-12 col-sm-6',
                    'style' => 'wide',
                    'choices' => 
                    self::getSelectOption('TypeEmployment')

                ],

                [
                    'id' => 'salary_on_off',
                    'label' => __('salary on off'),
                    'name' => 'salary_on_off',
                    'type' => 'radio',
                    'choices' => [
                        'yes' => __('yes'),
                        'no' => __('no')
                    ],
                ],

                [
                    'id' => 'salary',
                    'label' => __('salary'),
                    'name' => 'salary',
                    'type' => 'number',
                    'layout' => 'col-12 col-md-6'
                ],

                [
                    'id' => 'Submission_deadline',
                    'label' => __('Submission deadline'),
                    'name' => 'Submission_deadline',
                    'type' => 'date',
                    'layout' => 'col-12 col-md-6'
                ],

            ]

    ];
        return $myvar[$type];

    }

    public function getSelectOption($model)
    {
       
        $modelName = 'App\\Models\\' .$model;
        $item =new $modelName;
        $array;
        foreach ($item->all() as $key => $value) {
            $array []  = [
            'option' =>  $value->name,
            'value' =>  $value->id];
        }
        return  $array;

    }
 
}