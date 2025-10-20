<?php

namespace App\Helpers;

class CoordinateHelper
{
    public static function getApartmentRenderData($coord, $currentApartmentId)
    {
        $isCurrent = $coord->apartment_id === $currentApartmentId;
        $class = $isCurrent ? 'actual-position' : 'others-position';
        $unitCode = $coord->apartment->unit_code;

        if ($coord->type === 'rect') {
            $centerX = $coord->x_position + $coord->width / 2;
            $centerY = $coord->y_position + $coord->height / 2;
        } elseif ($coord->type === 'polygon') {
            $points = explode(' ', $coord->points);
            $xs = $ys = [];
            foreach ($points as $p) {
                [$x, $y] = explode(',', $p);
                $xs[] = (float) $x;
                $ys[] = (float) $y;
            }
            $centerX = array_sum($xs) / count($xs);
            $centerY = array_sum($ys) / count($ys);
        }

        return [
            'class' => $class,
            'unitCode' => $unitCode,
            'centerX' => $centerX ?? null,
            'centerY' => $centerY ?? null,
        ];
    }
}
