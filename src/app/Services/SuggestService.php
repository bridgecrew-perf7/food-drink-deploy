<?php

namespace App\Services;

use App\Enums\Status;
use DB;

class SuggestService {

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
            # Get timestamps now
            $timestamps = \Carbon\Carbon::now();
            # Insert Product to DB
            $productId = DB::table('products')->insertGetId([
                'name'        => $data['name'],
                'slug'        => $data['slug'],
                'price'       => $data['price'],
                'amount_of'   => $data['amount_of'],
                'content'     => $data['content'],
                'category_id' => $data['category_id'],
                'status'      => Status::BLOCK,
                "created_at"  => $timestamps,
                "updated_at"  => $timestamps,
            ]);
            # Insert Images to DB
            $count = 0;
            foreach($data['images'] as $image) {
                $imageName = $image->getClientOriginalName();
                $image->storeAs('products', $imageName, 'public');
                DB::table('images')->insert([
                    'image'      => $imageName,
                    'status'     => Status::ACTIVE,
                    'STT'        => $count,
                    'product_id' => $productId,
                    "created_at" => $timestamps,
                    "updated_at" => $timestamps,
                ]);
                $count++;
            }
            # Commit data success
            DB::commit();
            return $productId;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}
