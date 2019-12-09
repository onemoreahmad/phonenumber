<template>
    <default-field :field="field" :errors="errors">
        <template slot="field" style="direction:ltr !important">
            <vue-phone-number-input
                :id="field.name"
                :defaultCountryCode="defaultCountryCode"
                color="#1360a8"
                :class="errorClasses"
                :placeholder="field.name"
                v-model="value"
                v-on:update="update"
                :translations="{
                  countrySelectorLabel: 'رمز الدولة',
                  phoneNumberLabel: 'رقم الجوال',
                  example: 'مثال :'
                }"
                style="direction:ltr !important">
            </vue-phone-number-input>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

import VuePhoneNumberInput from 'vue-phone-number-input';
import 'vue-phone-number-input/dist/vue-phone-number-input.css';

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    data: () => (
        {
            allData: null,
            defaultCountryCode: 'SA',
        }),

    components: {
        'vue-phone-number-input' : VuePhoneNumberInput
    },

    mounted: function () {
        this.defaultCountryCode = this.field.country || 'SA'
        this.update({formattedNumber:this.value, countryCode: this.field.country})
        this.value = this.value.substr(4)
    },

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            if(!this.value){
                return false;
            }
            formData.append(this.field.attribute, this.allData.formattedNumber)
            formData.append('country', this.allData.countryCode)
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
            this.value = value
        },

        /**
         * Update the field's internal value.
         */
        update(data) {
            this.allData = data
        },
    },
}
</script>


<style>
    .select-country-container{
        direction: ltr !important;
        text-align: left !important;
    }
    .input-country-selector, .input-tel__input , .country-selector__input{
        text-align: left !important;
        direction: ltr !important;
    }
</style>
