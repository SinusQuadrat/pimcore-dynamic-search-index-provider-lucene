<?php

namespace DsLuceneBundle\Index\Field;

use DynamicSearchBundle\Transformer\Container\FieldContainerInterface;

final class UnStoredField extends AbstractType
{
    /**
     * {@inheritDoc}
     */
    public function build(string $name, $data, array $configuration = [])
    {
        $field = \Zend_Search_Lucene_Field::unStored($name, $data, self::UTF8);
        // $field->boost = $type->getBoost() > 1 ? $type->getBoost() : 1.0;

        return $field;
    }
}
