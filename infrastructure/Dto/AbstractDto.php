<?php

namespace Infrastructure\Dto;

/**
 * Class AbstractDto
 */
abstract class AbstractDto
{
    /**
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];
        foreach ($this as $key => $value) {
            if ($value instanceof AbstractDto) {
                $data[$key] = $value->toArray();
            } else {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}
