<?php

namespace DsLuceneBundle\Normalizer\Helper;

use ZendSearch\Lucene\Document\Field;
use ZendSearch\Lucene\Search\QueryHit;
use ZendSearch\Exception\ExceptionInterface;

class LuceneDocumentDataExtractor
{
    public function extract(QueryHit $hit): array
    {
        $document = $hit->getDocument();

        $data = [];
        foreach ($document->getFieldNames() as $fieldName) {
            $field = null;
            $fieldDefinition = null;

            try {
                $field = $document->getField($fieldName);
            } catch (ExceptionInterface $e) {
                // fail silently
            }

            if (!$field instanceof Field) {
                continue;
            }

            $data[$fieldName] = $field->getUtf8Value();
        }

        return $data;
    }
}
