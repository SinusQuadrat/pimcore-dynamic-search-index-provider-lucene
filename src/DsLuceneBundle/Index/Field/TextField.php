<?php

namespace DsLuceneBundle\Index\Field;

use ZendSearch\Lucene;

final class TextField extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function build(string $name, $data, array $configuration = [])
    {
        $field = Lucene\Document\Field::text($name, $data, self::UTF8);
        // $field->boost = $type->getBoost() > 1 ? $type->getBoost() : 1.0;

        return $field;
    }
}
