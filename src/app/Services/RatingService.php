<?php

namespace App\Services;
use DB;
use Carbon\Carbon;
use App\Jobs\RatingMailJob;
use App\Models\Evaluates;

class RatingService {

    /**
     * Insert Product to Database.
     *
     * @param $data
     * @return bool
     */
    public function create($data)
    {
        DB::beginTransaction();
        try {
            $timestamps = Carbon::now();
            DB::table('evaluates')->insert([
                'review' => $data['review'],
                'rating' => $data['rating'],
                'user_id' => $data['user_id'],
                'product_id' => $data['product_id'],
                'created_at'  => $timestamps,
                'updated_at'  => $timestamps,
            ]);
            DB::commit();
            return true;
        } 
        catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function sendMailUser($message,$data)
    {
        try{
            $product_id = $data['product_id'];
            $evaluates = Evaluates::ByProductId($product_id)->ByUserId($data['user_id'])->groupBy('user_id')->get();
            foreach($evaluates as $evaluate){
            $details = ['name_user' => $evaluate->users->name,'message' => $message];
            RatingMailJob::dispatch($evaluate->users->email, $details);
            }
            return true;
        }
        catch(Exception $e)
        {
            return false;
        }
    }
}
