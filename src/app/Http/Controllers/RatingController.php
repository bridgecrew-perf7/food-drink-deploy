<?php

namespace App\Http\Controllers;

use App\Models\Evaluates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\RatingService;
use App\Models\Product;

class RatingController extends Controller
{
    protected $ratingService;

    public function __construct(RatingService $ratingService)
    {
        $this->ratingService = $ratingService;
    }
    
    public function ratingProduct(Request $request)
    {
        if ($request || Auth::check())
        {
            $data = [
              'review'     => $request->get('review'),
              'rating'     => $request->get('rating'),
              'user_id'    => Auth::user()->id,
              'product_id' => $request->get('product_id'),
            ];
            $this->ratingService->create($data);
            $nameUser = Auth::user()->name;
            $rating = $data['rating'];
            $name_product = Product::find($data['product_id'])->name;
            $created_at = Evaluates::orderBy('id','desc')->first()->created_at;
            $message = $this->getMessage($nameUser,$rating,$name_product,$created_at);
            $send_mail_rating = $this->ratingService->sendMailUser($message,$data);

            if($send_mail_rating){
                $mess = __('custom.rating_success');
                $alert = 'alert-success';
            }
            else{
                $mess = __('custom.rating_false');
                $alert = 'alert-danger';
            }
            return back()->with([
              'message' => $mess,
              'alert' => $alert
            ]);
        }
        return abort(404);
    }

    private function getMessage($nameUser,$rating,$name_product,$created_at) {
        $date = checkLanguageWithDay($created_at);
        $message_en = "$nameUser Also commented and rated $rating start for product $name_product. At $date.";
        $message_vi = "$nameUser cũng đã bình luận và đánh giá $rating sao cho sản phẩm $name_product. Lúc $date.";
        return checkLanguage($message_en, $message_vi);
    }

}
