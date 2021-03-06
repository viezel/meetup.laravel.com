<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class TalkProposal extends Resource
{
    public static $model = \App\Models\TalkProposal::class;

    public static $title = 'id';

    public static $search = [
        'id',
        'first_name',
        'email',
        'title',
        'abstract',
        'additional_info',
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable()->hide(),

            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Length')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Text::make('First name')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Text::make('Last name')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'max:255'),

            Textarea::make('Abstract')
                ->sortable()
                ->hideFromIndex()
                ->rules('required'),

            Textarea::make('Additional info')
                ->sortable()
                ->hideFromIndex(),

            DateTime::make('Created at')->onlyOnIndex(),
        ];
    }

    public function cards(Request $request)
    {
        return [];
    }

    public function filters(Request $request)
    {
        return [];
    }

    public function lenses(Request $request)
    {
        return [];
    }

    public function actions(Request $request)
    {
        return [];
    }
}
