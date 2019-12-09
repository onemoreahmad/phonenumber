<?php

namespace Onemoreahmad\Phonenumber;

use Laravel\Nova\Fields\Field;

class Phonenumber extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'phonenumber';

    /**
     * Hydrate the given attribute on the model based on the incoming request.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @param string $requestAttribute
     * @param object $model
     * @param string $attribute
     * @return void
     * @throws \Exception
     */
     protected function fillAttributeFromRequest($request,
      $requestAttribute,
      $model,
      $attribute)
      {
          if(!$request[$requestAttribute]){
            throw new \Exception(__("Phone Number is required."), 1);
          }else{
              $model->$requestAttribute = $request[$requestAttribute];
              $model->{'country'} = data_get($request, 'country');
          }
     }
}
