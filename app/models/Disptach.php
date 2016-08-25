<?php

class Dispatch extends Eloquent {
    protected $fillable = [];

    //dispatches forging stock which is currently available
    public static function dispatchForgingStock($stock_id,$quantity)
    {
        return DB::table('forging_stock')
            ->where('stock_id','=',$stock_id)
            ->decrement('available_quantity_forging',$quantity);
    }


    public static function insertForgingDispatch($array)
    {
        return DB::table('dispatch_forging')
            ->insert($array);
    }

    public static function getForgingDispatchDetails($id)
    {
        // join lagao aur combined data return karo
        return DB::table('dispatch_forging')
            ->join('forging_stock','dispatch_forging.forge_id','=','forging_stock.stock_id')
            ->select('forging_stock.*','dispatch_forging.*')
            ->get();
    }




    //updates machining stock table while dispatchinh
    public static function dispatchMachiningStock($mach_id,$quantityDispatched)
    {
        return DB::table('machining_work_order_stock')
            ->where('mach_id','=',$mach_id)
            ->decrement('quantity',$quantityDispatched);

    }

    // insert maching dispatch record in a seperate dispatch table
    public static function insertMachiningDispatch($array)
    {
        return DB::table('dispatch_machining')
            ->insert($array);
    }


    /// get machining dispatch details for dispatch reports

    public static function getDispatchMachiningRecords()
    {
        return DB::table('dispatch_machining')
            ->select()
            ->get();
    }

    //to decrement driiling stock data after materials has been dispatched

    public static function dispatchDrillingStock($drill_id,$quantityDispatched)
    {
        return DB::table('drilling_work_order_stock')
            ->where('drill_id', '=', $drill_id)
            ->decrement('quantity', $quantityDispatched);
    }

    // inserting dispach data in a seperate drilling_dispatch table

    public static function insertDrillingDispatch($array)
    {
        return DB::table('dispatch_drilling')
            ->insert($array);
    }

    //getting all dispatch drilling stocks data for reports

    public static function getDispatchDrillingStocks()
    {
        return DB::table('dispatch_drilling')
            ->select()
            ->get();
    }

    //updating serration stock after material has been dispatched

    public static function dispatchSerrationStock($serr_id,$quantityDispatched)
    {
        return DB::table('serration_work_order_stock')
            ->where('serr_id','=',$serr_id)
            ->decrement('quantity',$quantityDispatched);

    }

   //insering serration entry in serration dispatch table

    public static function insertSerrationDispatch($array)
    {
        return DB::table('dispatch_serration')
            ->insert($array);
    }






}