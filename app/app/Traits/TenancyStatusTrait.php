<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait TenancyStatusTrait
{
    public function formatTenancyStatus($realestates)
    {
        foreach ($realestates as $realestate) {
            switch ($realestate->tenancy_status) {
                case 1:
                    $realestate->tenancy_status = '満室';
                    break;
                case 2:
                    $realestate->tenancy_status = '空室';
                    break;
                case 3:
                    $realestate->tenancy_status = '空き予定';
                    break;
                default:
                    $realestate->tenancy_status = '不明';
                    break;
            }
        }

        return $realestates;
    }
}