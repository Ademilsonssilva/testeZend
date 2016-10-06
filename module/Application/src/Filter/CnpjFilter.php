<?php

namespace Application\Filter;

use Zend\Filter\AbstractFilter;

// This filter class is designed for transforming an arbitrary phone number to 
// the local or the international format.
class CnpjFilter extends AbstractFilter {

    // Available filter options.
    protected $options = [
            //'format' => self::PHONE_FORMAT_INTL
    ];

    // Constructor.
    public function __construct($options = null) {
        // Set filter options (if provided).
        if (is_array($options)) {

            if (isset($options['format']))
                $this->setFormat($options['format']);
        }
    }

    // Filters a phone number.
    public function filter($value) {
        if (!is_scalar($value)) {
            // Return non-scalar value unfiltered.
            return $value;
        }

        $value = (string) $value;

        if (!(strlen($value) == 14 || strlen($value) == 18)) {
            // Return empty value unfiltered.
            return $value;
        }
        if (strlen($value) == 14) {
            // First, remove any non-digit character.
            $digits = preg_replace('#[^0-9]#', '', $value);

            // Add the braces, the spaces, and the dash.
            $cnpj = substr($digits, 0, 2) . '.' .
                    substr($digits, 2, 3) . '.' .
                    substr($digits, 5, 3) . '/' .
                    substr($digits, 8, 4) . '-' .
                    substr($digits, 12, 2);
        } else {
            $cnpj = str_replace('.', '', $value);
            $cnpj = str_replace('/', '', $cnpj);
            $cnpj = str_replace('-', '', $cnpj);
        }
        return $cnpj;
    }

}
