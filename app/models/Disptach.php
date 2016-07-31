<?php

class Dispatch extends Eloquent {
    protected $fillable = [];

    //updates machining stock table while dispatchinh
    public static function dispatchMachiningStock($mach_id,$quantityDispatched)
    {
        return DB::table('machining_work_order_stock')
            ->where('mach_id','=',$mach_id)
            ->decrement('quantity',$quantityDispatched);

    }

    public static function dispatchMachiningRecords($mach_id,$quantityDispatched)
    {
        return DB::table('machining_records')
            ->where('mach_id','=',$mach_id)
            ->decrement('quantity',$quantityDispatched);
    }

    public static function insertMachiningDispatch($array)
    {
        return DB::table('dispatch_machining')
            ->insert($array);
    }

    public static function dispatchDrillingStock($drill_id,$quantityDispatched)
{
    return DB::table('drilling_work_order_stock')
        ->where('drill_id','=',$drill_id)
        ->decrement('quantity',$quantityDispatched);

}

    public static function dispatchDrillingRecords($drill_id,$quantityDispatched)
    {
        return DB::table('drilling_records')
            ->where('drill_id','=',$drill_id)
            ->decrement('quantity',$quantityDispatched);
    }

    public static function insertDrillingDispatch($array)
    {
        return DB::table('dispatch_drilling')
            ->insert($array);
    }


    public static function dispatchSerrationStock($serr_id,$quantityDispatched)
    {
        return DB::table('serration_work_order_stock')
            ->where('serr_id','=',$serr_id)
            ->decrement('quantity',$quantityDispatched);

    }

    public static function dispatchSerrationRecords($serr_id,$quantityDispatched)
    {
        return DB::table('serration_records')
            ->where('serr_id','=',$serr_id)
            ->decrement('quantity',$quantityDispatched);
    }

    public static function insertSerrationDispatch($array)
    {
        return DB::table('dispatch_serration')
            ->insert($array);
    }






}